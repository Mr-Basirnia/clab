<?php

namespace MrBasirnia\App\Widgets;

use WP_Widget;

class Common_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	public function __construct(
		$id_base = 'clab_common_widget',
		$name = 'عضویت در خبرنامه کلاب',
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

        <div class="card card-body border-0">
            <h6 class="mb-2"><?= $instance['title'] ?></h6>
            <p class="text-muted font-size-14"><?= $instance['description'] ?></p>
            <form method="post" action="">
                <div class="form-group mb-0 mt-3">
                    <div class="icon-field-right">
                        <i class="fa fa-paper-plane text-primary"></i>
                        <input type="email" name="clab_newsletter" class="form-control" placeholder="آدرس ایمیل خود را وارد نمایید">
                    </div>
                </div>
            </form>
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

		$title       = $instance['title'] ?? 'مشترک';
		$description = $instance['description'] ?? 'ثبت نام کنید و خبرنامه ما را دریافت کنید';
		?>
        <p>

            <label for="<?php echo $this->get_field_name( 'title' ); ?>">
                عنوان :
            </label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>"
                   name="<?php echo $this->get_field_name( 'title' ); ?>" type="text"
                   value="<?php echo esc_attr( $title ); ?>"/>

            <label for="<?php echo $this->get_field_name( 'description' ); ?>">
                توضیحات :
            </label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'description' ); ?>"
                   name="<?php echo $this->get_field_name( 'description' ); ?>" type="text"
                   value="<?php echo esc_attr( $description ); ?>"/>
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
		$instance['title']       = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['description'] = ( ! empty( $new_instance['description'] ) ) ? strip_tags( $new_instance['description'] ) : '';

		return $instance;
	}
}