<?php

use MrBasirnia\App\Helpers\Clab_Helper as Render;


/*-------------------
 *  Get Header
 * ----------------*/
get_header();


if ( have_posts() ):

	while ( have_posts() ): the_post();

		/**
		 * Renders about page content.
		 *
		 * @see templates/pages/about/content.php
		 */
		Render::template( 'pages/about/content' );

	endwhile;

endif;


/*-------------------
 *  Get Footer
 * ----------------*/
get_footer();
