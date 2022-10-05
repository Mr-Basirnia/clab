<?php

use MrBasirnia\App\Helpers\Clab_Helper as Render;


/*------------------------------------
 *  Get Header
 * ---------------------------------*/
get_header();


/**
 * Renders single blog page.
 *
 * @see templates/blog/single/wrapper.php
 */
Render::template( 'blog/single/wrapper' );


/*------------------------------------
 *  Get Footer
 * ---------------------------------*/
get_footer();
