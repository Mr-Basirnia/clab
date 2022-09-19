<?php

use MrBasirnia\App\Helpers\Clab_Helper as Render;


/*------------------------------------
 *  Get Header
 * ---------------------------------*/
get_header();

/**
 * Renders blog page title.
 *
 * @see templates/blog/page-title.php
 */
Render::template( 'blog/page-title' );


/**
 * Renders blog page content.
 *
 * @see templates/blog/page-content.php
 */
Render::template( 'blog/page-content' );


/*------------------------------------
 *  Get Footer
 * ---------------------------------*/
get_footer();
