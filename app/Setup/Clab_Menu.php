<?php

namespace MrBasirnia\App\Setup;

/*
|------------------------------------------------------------------
| Clab Menu
|------------------------------------------------------------------
|
| Add a new menu item to the WP dashboard.
| Remove the default submenu item
|
*/

class Clab_Menu {

	public function __construct() {
		/*--------------------------------------
        * Add Theme Menu in WP dashboard
        *-------------------------------------*/
		add_action( 'admin_menu', array( $this, 'add_clab_admin_menu' ) );
		// Remove the default one, so we can add our customized version.
		add_action( 'admin_menu', array( $this, 'remove_clab_admin_sub_menu' ) );
	}

	/**
	 * It adds a clab theme menu item to the admin menu, and then adds submenu items to it
	 *
	 * @return void
	 */
	public function add_clab_admin_menu(): void {
		$parent_slug = 'clab_manage_theme';

		add_menu_page(
			'تنظیمات Clab',
			'تنظیمات Clab',
			'manage_options',
			$parent_slug,
			'',
			'dashicons-admin-appearance',
			35
		);

		add_submenu_page(
			$parent_slug,
			'ابزار ها',
			'ابزار ها',
			'manage_options',
			'clab_manage_tools',
			function () {
				echo 'Clab tools';
			}
		);

		add_submenu_page(
			$parent_slug,
			'برگه‌ها',
			'برگه‌ها',
			'manage_options',
			'clab_manage_pages',
			function () {
				echo 'Clab page';
			}
		);

		add_submenu_page(
			$parent_slug,
			'راهنما',
			'راهنما',
			'manage_options',
			'clab_theme_support',
			function () {
				echo 'Clab support';
			}
		);

		add_submenu_page(
			$parent_slug,
			'درباره Clab',
			'درباره Clab',
			'manage_options',
			$parent_slug,
			array( $this, 'about' )
		);
	}

	/**
	 * It removes the submenu page from the admin menu.
	 *
	 * @return void
	 */
	public function remove_clab_admin_sub_menu(): void {
		remove_submenu_page( 'clab_manage_theme', 'clab_manage_theme' );
	}

	/**
	 * @return void
	 */
	public function about(): void {
		?>
        <div class="wrapper">

            <h1>قالب سفارشی بلاگ Clab</h1>

            <h3>
                از انتخاب قالب Clab متشکریم !
            </h3>

        </div>
		<?php
	}
}