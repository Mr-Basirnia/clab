<?php

use MrBasirnia\App\Helpers\Clab_Helper as Render;


if ( have_posts() ):
	while ( have_posts() ):
		the_post();

		/**
		 * Renders single blog page title.
		 *
		 * @see templates/blog/single/title.php
		 */
		Render::template( 'blog/single/title' );


		/**
		 * Renders single blog page main content.
		 *
		 * @see templates/blog/single/content.php
		 */
		Render::template( 'blog/single/content' );


		/**
		 * Renders single blog page comments.
		 *
		 * @see clab-develop/comments.php
		 */
		comments_template();

	endwhile;
endif;
