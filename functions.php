<?php
/*
|------------------------------------------------------------------
| Bootstraping a Theme
|------------------------------------------------------------------
|
| This file is responsible for bootstrapping your theme. Autoloads
| composer packages, checks compatibility and loads theme files.
|
*/

/*------------------------------------
 *  Composer Include
 * ---------------------------------*/
if ( file_exists( $composer = __DIR__ . '/vendor/autoload.php' ) ) {
	require $composer;
}


use MrBasirnia\App\Classes\Clab_Setup;
use MrBasirnia\App\Helpers\Clab_Helper;


/*------------------------------------
 *  Set Theme Constant
 * ---------------------------------*/
Clab_Helper::define( 'CLAB__PATH', get_template_directory() . DIRECTORY_SEPARATOR );
Clab_Helper::define( 'CLAB__URL', get_template_directory_uri() . DIRECTORY_SEPARATOR );


/*------------------------------------
 *  Init Theme Setup
 * ---------------------------------*/
Clab_Setup::getInstance();