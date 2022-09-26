<?php

use MrBasirnia\App\Helpers\Clab_Helper as Render;


/**
 * Renders page title.
 *
 * @see templates/partials/page-title.php
 */
Render::template( 'partials/page-title' );


/*-----------------------------------------
 *  Get page content( shortcodes )
 * --------------------------------------*/
the_content();