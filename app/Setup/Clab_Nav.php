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

use WP_Post;

class Clab_Nav {
	public function __construct() {
		add_action( 'init', array( $this, 'clab_register_nav' ) );
		add_filter( 'nav_menu_css_class', array( $this, 'add_additional_class_on_li' ), 1, 3 );
	}

	public function clab_register_nav(): void {
		register_nav_menu( 'clab-nav-top', 'منوی اصلی قالب Clab' );
		register_nav_menu( 'clab-footer-nav-one', 'بخش اول منوی فوتر' );
		register_nav_menu( 'clab-footer-nav-two', 'بخش دوم منوی فوتر' );
		register_nav_menu( 'clab-footer-nav-three', 'بخش سوم منوی فوتر' );
		register_nav_menu( 'clab-footer-nav-four', 'بخش چهارم منوی فوتر' );
	}

	/**
	 * It adds a class to the <li> element of a menu item
	 *
	 * @param array   $classes   (array) CSS classes applied to the menu item's `<li>` element.
	 * @param WP_Post $menu_item The menu item object.
	 * @param object  $args      The arguments passed to the wp_nav_menu() function.
	 *
	 * @return array An array of classes.
	 */
	public function add_additional_class_on_li( array $classes, WP_Post $menu_item, object $args ): array {
		if ( isset( $args->li_class ) ) {
			$classes[] = $args->li_class;
		}

		return $classes;
	}
}