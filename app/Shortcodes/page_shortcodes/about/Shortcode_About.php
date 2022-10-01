<?php

namespace MrBasirnia\App\Shortcodes\page_shortcodes\about;

use MrBasirnia\App\Helpers\Clab_Helper;

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
		add_shortcode( 'clab_goal', array ( $this, 'goal_callback' ) );
		add_shortcode( 'clab_team', array ( $this, 'team_callback' ) );
		add_shortcode( 'clab_recommendation', array ( $this, 'recommendation_callback' ) );
	}

	/**
	 * It returns a string of about us HTML code
	 *
	 * @return string A string.
	 */
	public function about_us_callback(): string {

		/**
		 * Render about-us content.
		 *
		 * @see templates/partials/about-us.php
		 */
		return Clab_Helper::render( 'partials/about-us' ); // TODO:: This ShortCode needs dynamization.
	}

	/**
	 * It returns a string of point HTML code.
	 *
	 * @return string
	 */
	public function goal_callback(): string {

		/**
		 * Render goal content.
		 *
		 * @see templates/partials/goal.php
		 */
		return Clab_Helper::render( 'partials/goal' ); // TODO:: This ShortCode needs dynamization.
	}

	/**
	 * It returns a string of point HTML code.
	 *
	 * @return string
	 */
	public function team_callback(): string {
		$data = array (
			'title' => 'ما یک تیم پویا و نابغه برای خدمتت به شما داریم'
		);

		/**
		 * Render team content.
		 *
		 * @see templates/partials/team.php
		 */
		return Clab_Helper::render( 'partials/team', $data ); // TODO:: This ShortCode needs dynamization.
	}

	/**
	 * It returns a string of point HTML code.
	 *
	 * @return string
	 */
	public function recommendation_callback(): string {
		$data = array (
			'title' => 'این قالب توصیه می شود'
		);

		/**
		 * Render recommendation content.
		 *
		 * @see templates/partials/recommendation.php
		 */
		return Clab_Helper::render( 'partials/recommendation', $data ); // TODO:: This ShortCode needs dynamization.
	}
}