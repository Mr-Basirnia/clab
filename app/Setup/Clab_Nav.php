<?php

namespace MrBasirnia\App\Setup;

/*
|------------------------------------------------------------------
| Clab Nav
|------------------------------------------------------------------
|
| Register a theme nav item to the WP dashboard.
|
*/

class Clab_Nav {
	public function __construct() {
		add_action( 'init', array( $this, 'clab_register_nav' ) );
	}

	public function clab_register_nav(): void {
		register_nav_menu( 'clab-nav-top', 'منوی اصلی قالب Clab' );
	}
}