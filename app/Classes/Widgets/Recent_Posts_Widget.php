<?php

namespace MrBasirnia\App\Classes\Widgets;

use WP_Widget;

class Recent_Posts_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	public function __construct(
		$id_base = 'clab_recent_posts_widget',
		$name = 'پست های اخیر کلاب',
		$widget_options = array (),
		$control_options = array ()
	) {
		parent::__construct( $id_base, $name, $widget_options, $control_options );
	}

	/**
	 * Front-end display of widget.
	 *
	 * @param array $args Widget arguments.
	 * @param array $instance Saved values from database.
	 *
	 * @see WP_Widget::widget()
	 *
	 */
	public function widget( $args, $instance ) {

		printf( $args['before_widget'] );

		/*------------------------------------
		*  Get All Categories
		* ---------------------------------*/
		$categories = get_categories();

		/*------------------------------------
		*  Get Recent Posts
		* ---------------------------------*/
		$recent_posts = wp_get_recent_posts( array (
			'numberposts' => $instance['number_posts'] ?? 3,
			'post_status' => 'publish'
		) );
		?>


        <h6 class="mb-4"><?= $instance['title']; ?></h6>

		<?php foreach ( $recent_posts as $recent_post ): ?>
			<?php $thumbnail_url = get_the_post_thumbnail_url( $recent_post['ID'] ) ?>

            <div class="card border-0 mb-1">
                <div class="card-body row align-items-center">
                    <div class="col-4">
                        <a href="<?php the_permalink( $recent_post['ID'] ) ?>">
                            <img class="card-img" src="<?= $thumbnail_url ?>" alt="">
                        </a>
                    </div>
                    <div class="col-8">
                        <h6 class="my-2 font-size-14">
                            <a href="<?php the_permalink( $recent_post['ID'] ) ?>">
								<?= $recent_post['post_title'] ?>
                            </a>
                        </h6>
                        <span class="font-size-14 text-muted">
                            <?= verta( $recent_post['post_date'] )->format( '%B %Y' ) ?>
                        </span>
                    </div>
                </div>
            </div>

		<?php endforeach; ?>

		<?php
		printf( $args['after_widget'] );

	}

	/**
	 * Back-end widget form.
	 *
	 * @param array $instance Previously saved values from database.
	 *
	 * @see WP_Widget::form()
	 *
	 */
	public function form( $instance ) {

		$title        = $instance['title'] ?? '';
		$number_posts = $instance['number_posts'] ?? '';
		?>
        <p>
            <label for="<?php echo $this->get_field_name( 'title' ); ?>">
                عنوان :
            </label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>"
                   name="<?php echo $this->get_field_name( 'title' ); ?>" type="text"
                   value="<?php echo esc_attr( $title ); ?>"
            />


            <label for="<?php echo $this->get_field_name( 'number_posts' ); ?>">
                تعداد نمایش پست های اخیر :
            </label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'number_posts' ); ?>"
                   name="<?php echo $this->get_field_name( 'number_posts' ); ?>" type="number"
                   value="<?php echo esc_attr( $number_posts ); ?>"
            />
        </p>
		<?php
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 * @see WP_Widget::update()
	 *
	 */
	public function update( $new_instance, $old_instance ): array {
		$instance                 = array ();
		$instance['title']        = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['number_posts'] = ( ! empty( $new_instance['number_posts'] ) ) ? strip_tags( $new_instance['number_posts'] ) : '';

		return $instance;
	}
}