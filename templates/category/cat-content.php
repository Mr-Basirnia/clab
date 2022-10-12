<section class="section-gap">
    <div class="container">
        <div class="row justify-content-center">

			<?php get_template_part( 'templates/category/cat-loop' ); ?>

        </div>

		<?php if ( get_previous_posts_link() || get_next_posts_link() ) : ?>
            <!--pagination-->
            <div class="pagination justify-content-center mb-4">
				<?php previous_posts_link(); ?>
                <div class="mx-2"></div>
				<?php next_posts_link(); ?>
            </div>
		<?php endif; ?>

    </div>
</section>