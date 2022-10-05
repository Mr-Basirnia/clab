<?php

namespace MrBasirnia\App\Setup;

/*
|------------------------------------------------------------------
| Theme Setup
| It's a singleton class that will be instantiated when the plugin is loaded
|------------------------------------------------------------------
|
| This Class is responsible for set up theme.
|
*/

use MrBasirnia\App\Helpers\Singleton;
use MrBasirnia\App\Shortcodes\page_shortcodes\about\Shortcode_About;
use MrBasirnia\App\Shortcodes\Shortcode_Gallery;
use MrBasirnia\App\Shortcodes\Shortcode_Quote;
use MrBasirnia\App\Widgets\Category_Widget;
use MrBasirnia\App\Widgets\Common_Widget;
use MrBasirnia\App\Widgets\Instagram_Posts_Widget;
use MrBasirnia\App\Widgets\Recent_Posts_Widget;
use MrBasirnia\App\Widgets\Search_Widget;

class Clab_Setup extends Singleton {

	public function __construct() {
		add_action( 'after_setup_theme', array ( $this, 'init' ) );

		/* It's a WordPress hook that will be called when the theme is loaded. */
		add_action( 'widgets_init', array ( $this, 'clab_register_sidebars' ) );
		add_action( 'widgets_init', array ( $this, 'clab_register_widgets' ) );

		/* It adds a filter to the body tag classes. */
		add_filter( 'body_class', array ( $this, 'clab_body_tag_classes' ) );

		/*--------------------------------------
		* Enqueue assets for gallery meta box
		*-------------------------------------*/
		add_action( 'admin_enqueue_scripts', array ( $this, 'gallery_metabox_enqueue' ) );

		/*--------------------------------------
		* Add Gallery Meta Box
		*-------------------------------------*/
		add_action( 'add_meta_boxes', array ( $this, 'add_gallery_metabox' ) );

		/*--------------------------------------
		* Save Gallery Meta Box
		*-------------------------------------*/
		add_action( 'save_post', array ( $this, 'gallery_meta_save' ) );

		/*--------------------------------------
		* Add Clab Shortcodes
		*-------------------------------------*/
		$this->add_clab_theme_shortcodes();

		/*--------------------------------------
		* Filter header tag classes
		*-------------------------------------*/
		add_filter( 'clab_header_tag_class', array ( $this, 'clab_header_tag_class_callback' ) );
	}

	public function init() {

		$this->add_clab_theme_support();
		$this->add_clab_theme_image_size();
		( new Clab_Menu() );
	}


	/**
	 * @return void
	 */
	private function add_clab_theme_image_size(): void {

		/*------------------------------
		* Blog Posts Thumbnail
		*----------------------------*/
		add_image_size( 'clab_blog_post_thumbnail', 730, 432, true );

		/*------------------------------
		* Blog Single Page Post Thumbnail
		*----------------------------*/
		add_image_size( 'clab_blog_post_single_thumbnail', 1110, 387, true );

		/*------------------------------
		* Related Posts Thumbnail
		*----------------------------*/
		add_image_size( 'clab_related_posts_thumbnail', 350, 233, true );

		/*------------------------------
		* Recent Posts Widget Thumbnail
		*----------------------------*/
		add_image_size( 'clab_widget_recent_posts_thumbnail', 84, 69, true );

		/*------------------------------
        * Gallery ShortCode
        *----------------------------*/
		add_image_size( 'clab_gallery_shortcode', 730, 486, true );
	}


	/**
	 * It adds support for post thumbnails and title tags.
	 *
	 * @return void
	 */
	private function add_clab_theme_support(): void {

		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'title-tag' );
	}

	/**
	 * It registers a sidebar for the theme.
	 * You can add new sidebar in here
	 *
	 * @return void
	 */
	public function clab_register_sidebars(): void {

		/*------------------------------
		 * Add Blog Sidebar
		 *----------------------------*/
		register_sidebar( array (
			'name'           => 'بلاگ سایدبار',
			'id'             => 'clab_blog_sidebar',
			'description'    => __( 'Widgets in this area will be shown on all posts and pages.', 'textdomain' ),
			'before_sidebar' => '<div class="col-lg-4">',
			'after_sidebar'  => '</div>',
			'before_widget'  => '<div class="blog-widget mb-4">',
			'after_widget'   => '</div>',
			'before_title'   => '',
			'after_title'    => '',
		) );
	}


	public function clab_register_widgets() {

		/*------------------------------
		 * Add Clab Search Widgets
		 *----------------------------*/
		register_widget( Search_Widget::class );

		/*------------------------------
		 * Add Clab Category Widgets
		 *----------------------------*/
		register_widget( Category_Widget::class );

		/*------------------------------
		 * Add Clab Recent Posts Widgets
		 *----------------------------*/
		register_widget( Recent_Posts_Widget::class );

		/*------------------------------
		 * Add Clab Newsletter Widgets
		 *----------------------------*/
		register_widget( Common_Widget::class );

		/*-------------------------------------
		 * Add Clab Instagram Posts Widgets
		 *-----------------------------------*/
		register_widget( Instagram_Posts_Widget::class );
	}


	/**
	 * Add or delete some tag body classes.
	 *
	 * @param $classes (array) An array of body classes.
	 *
	 * @return array An array of classes.
	 */
	public function clab_body_tag_classes( array $classes ): array {

		if ( is_single() || is_404() || is_page() ) {
			/*-------------------------------------------------
			* If the current page is a single post,
			* remove the class `bg-gray` from the body tag.
			*------------------------------------------------*/
			foreach ( $classes as $key => $value ) {
				if ( $value == 'bg-gray' ) {
					unset( $classes[ $key ] ); //class "bg-gray" removes it
				}
			}
		}

		return $classes;
	}


	/**
	 * If the current page is a post edit page,
	 * enqueue the gallery metabox stylesheet and JavaScript
	 *
	 * @param $hook
	 */
	public function gallery_metabox_enqueue( $hook ) {

		if ( 'post.php' == $hook or 'post-new.php' == $hook ) {

			wp_enqueue_style( 'gallery_metabox', CLAB__URL . '/assets/css/gallery-metabox.css' );
			wp_enqueue_script( 'gallery_metabox', CLAB__URL . '/assets/js/gallery-metabox.js', array (
				'jquery',
				'jquery-ui-sortable'
			) );

		}
	}


	/**
	 * We're adding a metabox to the post, page, and custom-post-type post types
	 *
	 * @param $post_type
	 */
	public function add_gallery_metabox( $post_type ) {

		$types = array ( 'post', 'page', 'custom-post-type' );

		if ( in_array( $post_type, $types ) ) {

			add_meta_box(
				'gallery-metabox',
				'گالری',
				array ( $this, 'gallery_meta_callback' ),
				$post_type,
				'normal',
				'high'
			);
		}
	}


	/**
	 * It creates a metabox with a button that opens the media uploader,
	 * and displays the images that have been selected
	 *
	 * @param $post
	 */
	public function gallery_meta_callback( $post ) {

		wp_nonce_field( basename( __FILE__ ), 'gallery_meta_nonce' );
		$ids = get_post_meta( $post->ID, 'vdw_gallery_id', true );

		?>
        <table class="form-table">
            <tr>
                <td>
                    <a class="gallery-add button" href="#" data-uploader-title="اضافه کردن تصویر به گالری"
                       data-uploader-button-text="افزودن">اضافه کردن تصویر</a>

                    <ul id="gallery-metabox-list">
						<?php if ( $ids ) : foreach ( $ids as $key => $value ) : $image = wp_get_attachment_image_src( $value ); ?>

                            <li>
                                <input type="hidden" name="vdw_gallery_id[<?php echo $key; ?>]"
                                       value="<?php echo $value; ?>">
                                <img class="image-preview" src="<?php echo $image[0]; ?>" alt="">

                                <small style="display: inline-block">
                                    <a class="remove-image" style="text-decoration: none" href="#">
                                        <span class="dashicons dashicons-trash"></span>
                                    </a>
                                </small>

                                <a class="change-image button button-small" href="#" data-uploader-title="Change image"
                                   data-uploader-button-text="Change image">تغییر تصویر</a>
                            </li>

						<?php endforeach; endif; ?>
                    </ul>

                </td>
            </tr>
        </table>
		<?php

	}


	/**
	 * If the post is saved, then save the data
	 *
	 * @param $post_id
	 *
	 * @return void post id.
	 */
	public function gallery_meta_save( $post_id ): void {
		if ( ! isset( $_POST['gallery_meta_nonce'] ) || ! wp_verify_nonce( $_POST['gallery_meta_nonce'], basename( __FILE__ ) ) ) {
			return;
		}

		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}

		if ( isset( $_POST['vdw_gallery_id'] ) ) {
			update_post_meta( $post_id, 'vdw_gallery_id', $_POST['vdw_gallery_id'] );
		} else {
			delete_post_meta( $post_id, 'vdw_gallery_id' );
		}
	}


	/**
	 * Add Clab Theme Shortcodes
	 *
	 * @return void
	 */
	private function add_clab_theme_shortcodes(): void {

		/*------------------------------------------------------
        * It's a shortcode that will be used in the post editor.
        *-----------------------------------------------------*/
		$gallery_shortcode = new Shortcode_Gallery();

		/*------------------------------------------------------
		* It's a shortcode that will be used in the post editor.
		*-----------------------------------------------------*/
		$quote_shortcode = new Shortcode_Quote();

		( new Shortcode_About() );

	}


	/**
	 * Filtering the header tag class on some pages
	 *
	 * @param string $classes header tag classes
	 *
	 * @return string
	 */
	public function clab_header_tag_class_callback( string $classes ): string {

		$classes_available = explode( ' ', $classes );

		/**
		 * If the current page is a page,
		 * then return the intersection of the classes available and the classes I want to use
		 */
		if ( is_page() ) {
			$access_class = array ( 'app-header', 'transparent-header-dark-nav' );

			return implode(
				' ',
				array_intersect( $classes_available, $access_class )
			);
		}

		return $classes;
	}
}