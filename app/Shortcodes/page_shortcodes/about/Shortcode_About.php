<?php

namespace MrBasirnia\App\Shortcodes\page_shortcodes\about;

class Shortcode_About {

	/**
	 * The function `__construct()` is a PHP magic method that is called when the class is instantiated.
	 *
	 * The function `add_shortcode()` is a WordPress function that adds a shortcode to the WordPress system.
	 *
	 * The first parameter of `add_shortcode()` is the name of the shortcode. The second parameter is an array that contains
	 * the name of the function that will be called when the shortcode is used.
	 */
	public function __construct() {
		add_shortcode( 'clab_about_us', array ( $this, 'about_us_callback' ) );
	}

	/**
	 * It returns a string of about us HTML code
	 *
	 * @return string A string.
	 */
	public function about_us_callback(): string {
		$o = '<div class="section-gap"><div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-md-4">
                        <h6>';

		$o .= 'درباره ما';

		$o .= '</h6><h2 class="mb-4">';

		$o .= get_option(
			'clab_about_page_shortcode_about_us_title',
			' ما یک آژانس دیجیتال مستقر در ایران هستیم'
		);

		$o .= '</h2><p class="text-muted">';

		$o .= get_option(
			'clab_about_page_shortcode_about_us_des',
			'لورم ایپسوم'
		);

		$o .= '</p></div> <div class="col-md-6">';
		$o .= '<img src="' . CLAB__URL . '/assets/img/cards/29c.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>';

		return $o;
	}
}