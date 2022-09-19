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

use MrBasirnia\App\Helpers\Singleton;

class Clab_Setup extends Singleton {

	public function __construct() {
		add_action( 'after_setup_theme', array ( $this, 'init' ) );
	}

	public function init() {

		$this->add_clab_theme_support();
		$this->add_clab_theme_image_size();
	}


	/**
	 * @return void
	 */
	private function add_clab_theme_image_size(): void {

		//TODO:: Set Theme Images Size Here
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
}