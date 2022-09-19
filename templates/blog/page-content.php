<section class="section-gap">
    <div class="container">
        <div class="row justify-content-between">

            <div class="col-lg-8">

				<?php get_template_part( 'templates/blog/page-loop' ); ?>

            </div>

			<?php
			/**
			 * Renders Sidebar.
			 *
			 * @see them-dir/sidebar.php
			 */
			?>
			<?php get_sidebar(); ?>

        </div>
    </div>
</section>