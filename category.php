<?php

use MrBasirnia\App\Helpers\Clab_Helper as Render;


/*----------------
 *  Get Header
 * -------------*/
get_header();


/**
 * Renders Nav and Header Tag
 *
 * @see templates/partials/header.php
 */
Render::template( 'partials/header' );


/**
 * Renders Page Title
 *
 * @see templates/category/cat-title.php
 */
Render::template( 'category/cat-title' );


/**
 * Renders Category Content
 *
 * @see templates/category/cat-content.php
 */
Render::template( 'category/cat-content' );


/*----------------
 *  Get Footer
 * -------------*/
get_footer();