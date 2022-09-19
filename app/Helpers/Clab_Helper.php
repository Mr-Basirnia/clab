<?php

namespace MrBasirnia\App\Helpers;

class Clab_Helper {


	/**
	 * It defines a constant if it is not already defined.
	 *
	 * @param string $cont_name cont_name The name of the constant.
	 * @param mixed $value The value of the constant.
	 *
	 * @return void The value of the constant.
	 */
	public static function define( string $cont_name, mixed $value ): void {

		if ( defined( $cont_name ) ) {
			return;
		}
		define( $cont_name, $value );
	}


	/**
	 * A function that allows you to call a template file from within a template file.
	 *
	 * @param string $slug The slug name for the generic template.
	 * @param string $name The name of the specialised template.
	 * @param array $args Optional. Additional arguments passed to the template.
	 *                     Default empty array.
	 *
	 * @return void|false Void on success, false if the template does not exist.
	 */
	public static function template( $slug, $name = null, $args = array () ) {

		$template_slug = 'templates/' . $slug;
		get_template_part( $template_slug, $name, $args );

	}

	/**
	 * It returns the current page number
	 *
	 * @param bool $echo
	 *
	 * @return mixed|void
	 */
	public static function get_current_page( bool $echo = false ) {

		$page = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;;
		if ( $echo ) {
			echo $page;

			return;
		}

		return $page;
	}


	/**
	 * It returns the number of pages that are needed to display all the posts.
	 *
	 * @param bool $echo
	 * @param float|int|null $posts_per_page
	 *
	 * @return float|void
	 */
	public static function get_count_page( bool $echo = false, float|int $posts_per_page = null ) {

		$total_post_count     = wp_count_posts();
		$published_post_count = $total_post_count->publish;

		if ( null === $posts_per_page ) {
			$posts_per_page = get_option( 'posts_per_page' );
		}

		if ( $echo ) {
			echo ceil( $published_post_count / $posts_per_page );

			return;
		}

		return ceil( $published_post_count / $posts_per_page );
	}
}