<?php use MrBasirnia\App\Helpers\Clab_Helper;

if ( have_posts() ) : ?>

	<?php while ( have_posts() ): ?>
		<?php the_post(); ?>

        <div class="blog-post">

            <a href="<?php the_permalink(); ?>">
				<?php if ( has_post_thumbnail( get_the_ID() ) ): ?>
					<?php the_post_thumbnail( 'clab_blog_post_thumbnail', [ 'class' => 'rounded mb-lg-5 mb-4' ] ); ?>
				<?php endif; ?>
            </a>

            <h3 class="">
                <a href="<?php the_permalink(); ?>">
					<?php the_title() ?>
                </a>
            </h3>
            <div class="meta font-lora my-4">
				<?php the_category( ' - ' ); ?>
                <span class="meta-separator"></span>
                <a href="#"><?= verta( get_post_timestamp( get_the_ID() ) )->format( '%d %B، %Y' ) ?></a>
            </div>

			<?php the_excerpt(); ?>

        </div>

	<?php endwhile; ?>

	<?php if ( get_previous_posts_link() || get_next_posts_link() ): ?>
        <!--pagination-->
        <div class="pagination justify-content-center mb-4">
			<?php previous_posts_link( '<i class="fa fa-angle-left"></i>' ); ?>
            <div class="h6 mt-2 mx-4">
				<?php Clab_Helper::get_current_page( true ) ?> از <?= Clab_Helper::get_count_page() ?>
            </div>
			<?php next_posts_link( '<i class="fa fa-angle-right"></i>' ); ?>
        </div>
	<?php endif; ?>


<?php endif; ?>
