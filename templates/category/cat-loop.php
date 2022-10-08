<?php use MrBasirnia\App\Helpers\Clab_Helper as Render;

if ( have_posts() ) : ?>

	<?php while ( have_posts() ) : the_post(); ?>

        <div class="col-md-4">

			<?php
			/**
			 * Renders category post loop.
			 *
			 * @see templates/partials/blog-card.php
			 */
			Render::template( 'partials/blog-card' ) ?>

        </div>

	<?php endwhile; ?>

<?php endif; ?>
