<?php

namespace MrBasirnia\App\Widgets;

use WP_Widget;

class Category_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	public function __construct(
		$id_base = 'clab_category_widget',
		$name = 'دسته بندی کلاب',
		$widget_options = array(),
		$control_options = array()
	) {
		parent::__construct( $id_base, $name, $widget_options, $control_options );
	}

	/**
	 * Front-end display of widget.
	 *
	 * @param array $args     Widget arguments.
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
		?>

        <h6 class="mb-4"><?= $instance['title'] ?></h6>
        <div class="list-group list-group-right-arrow">
			<?php foreach ( $categories as $key => $category ) : ?>

				<?php if ( $category->term_id == 1 ) {
					continue;
				} ?>
				<?php if ( $key == 5 ) {
					break;
				} ?>

                <a href="<?= get_category_link( $category->term_id ); ?>" class="list-group-item">
					<?= $category->cat_name; ?> (<?= $category->count; ?>)
                </a>
			<?php endforeach; ?>
        </div>

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

		$title = $instance['title'] ?? '';
		?>
        <p>
            <label for="<?php echo $this->get_field_name( 'title' ); ?>">
                عنوان :
            </label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>"
                   name="<?php echo $this->get_field_name( 'title' ); ?>" type="text"
                   value="<?php echo esc_attr( $title ); ?>"/>
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
		$instance          = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		return $instance;
	}
}