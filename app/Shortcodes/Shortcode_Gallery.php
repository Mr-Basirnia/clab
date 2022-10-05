<?php

namespace MrBasirnia\App\Shortcodes;

class Shortcode_Gallery {

	/**
	 * The function `__construct()` is a special function that is called when an object is created.
	 *
	 * The function `add_shortcode()` is a WordPress function that adds a shortcode to WordPress.
	 *
	 * The function `clab_gallery_callback()` is a function that is called when the shortcode is used.
	 */
	public function __construct() {
		add_shortcode( 'clab_gallery_carousel', array ( $this, 'clab_gallery_carousel_callback' ) );
	}


	/**
	 * It gets the attachment IDs of the images that are uploaded to the gallery, and then it loops through them and displays
	 * them in a carousel
	 * @return string
	 */
	public function clab_gallery_carousel_callback(): string {

		/*---------------------------------------------------------------------------
		* Getting the attachment IDs of the images that are uploaded to the gallery.
		*--------------------------------------------------------------------------*/
		$images = get_post_meta( get_the_ID(), 'vdw_gallery_id', true );
		$result = '';

		if ( is_array( $images ) and ! empty( $images ) ):

			$result .= '
				<div class="owl-carousel owl-theme dot-style-1 nav-circle-solid-light nav-inside mb-lg-5 mb-4"
	                 data-items="[1,1]" data-margin="30" data-autoplay="true" data-loop="true" data-nav="true"
	                 data-dots="true">
			';

			foreach ( $images as $image ) {
				$result .= '<div class="item">';
				$result .= wp_get_attachment_link( $image, 'clab_gallery_shortcode', attr: array ( 'class' => 'card-img rounded' ) );
				$result .= '</div>';
			}

			$result .= '</div>';

		endif;

		return $result;
	}
}