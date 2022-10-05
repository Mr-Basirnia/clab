<?php

namespace MrBasirnia\App\Widgets;

use WP_Widget;

class Search_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	public function __construct(
		$id_base = 'clab_search_widget',
		$name = 'سرچ باکس کلاب',
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
		?>

        <form abineguid="5B2D0D9BAA4442BF963588B03352ED36">
            <div class="form-group">
                <div class="icon-field">
                    <i class="vl-search"></i>
                    <input type="text" name="s" class="form-control" placeholder="<?= $instance['placeholder'] ?>">
                </div>
            </div>
        </form>

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

		$title = $instance['placeholder'] ?? '';
		?>
        <p>
            <label for="<?php echo $this->get_field_name( 'placeholder' ); ?>">
                عنوان placeholder :
            </label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'placeholder' ); ?>"
                   name="<?php echo $this->get_field_name( 'placeholder' ); ?>" type="text"
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
		$instance                = array ();
		$instance['placeholder'] = ( ! empty( $new_instance['placeholder'] ) ) ? strip_tags( $new_instance['placeholder'] ) : '';

		return $instance;
	}
}