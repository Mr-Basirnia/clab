<?php

namespace MrBasirnia\App\Classes;

/*
|------------------------------------------------------------------
| Theme Setup
| It's a singleton class that will be instantiated when the plugin is loaded
|------------------------------------------------------------------
|
| This Class is responsible for set up theme.
|
*/

use MrBasirnia\App\Classes\Widgets\Category_Widget;
use MrBasirnia\App\Classes\Widgets\Common_Widget;
use MrBasirnia\App\Classes\Widgets\Instagram_Posts_Widget;
use MrBasirnia\App\Classes\Widgets\Recent_Posts_Widget;
use MrBasirnia\App\Classes\Widgets\Search_Widget;
use MrBasirnia\App\Helpers\Singleton;

class Clab_Setup extends Singleton {

	public function __construct() {
		add_action( 'after_setup_theme', array ( $this, 'init' ) );

		/* It's a WordPress hook that will be called when the theme is loaded. */
		add_action( 'widgets_init', array ( $this, 'clab_register_sidebars' ) );
		add_action( 'widgets_init', array ( $this, 'clab_register_widgets' ) );

		/* It adds a filter to the body tag classes. */
		add_filter( 'body_class', array ( $this, 'clab_body_tag_classes' ) );
	}

	public function init() {

		$this->add_clab_theme_support();
		$this->add_clab_theme_image_size();
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

		if ( is_single() ) {
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
}