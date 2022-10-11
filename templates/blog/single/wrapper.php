<?php

use MrBasirnia\App\Helpers\Clab_Helper as Render;


if ( have_posts() ) :
	while ( have_posts() ) :
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

		if ( get_option( 'clab_dp_comments_is_active', 1 ) ) :
			/**
			 * Renders single blog page comments.
			 *
			 * @see clab-develop/comments.php
			 */
			comments_template();
		endif;

		if ( get_option( 'clab_related_posts_is_active', 1 ) ) :
			/**
			 * Renders related blogs.
			 *
			 * @see templates/blog/single/related_blogs.php
			 */
			Render::template( 'blog/single/related_blogs' );
		endif;

	endwhile;
endif;
