<section class="section-gap">
    <div class="container">
        <div class="row justify-content-center">

			<?php use MrBasirnia\App\Helpers\Clab_Helper;

			get_template_part( 'templates/category/cat-loop' ); ?>

        </div>

		<?php if ( get_previous_posts_link() || get_next_posts_link() ) : ?>
            <!--pagination-->
            <div class="pagination justify-content-center mb-4">
				<?php previous_posts_link( '<i class="fa fa-angle-left"></i>' ); ?>
                <div class="h6 mt-2 mx-4">
					<?php Clab_Helper::get_current_page( true ) ?> از <?= Clab_Helper::get_count_page() ?>
                </div>
				<?php next_posts_link( '<i class="fa fa-angle-right"></i>' ); ?>
            </div>
		<?php endif; ?>

    </div>
</section>