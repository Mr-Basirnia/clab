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

/*------------------------------------
 *  Get Page Content
 * ---------------------------------*/
get_the_content();

/*------------------------------------
 *  Get Footer
 * ---------------------------------*/
get_footer();
