<?php
/*
|------------------------------------------------------------------
| Header Controller
|------------------------------------------------------------------
|
| Controller for outputting layout's.
|
*/

use MrBasirnia\App\Helpers\Clab_Helper as Render;


/**
 * Renders layout's header.
 *
 * @see templates/layouts/header.php
 */
Render::template( 'layouts/header' );


/**
 * Renders partials header.
 *
 * @see templates/partials/header.php
 */
Render::template( 'partials/header' );