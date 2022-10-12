<?php use MrBasirnia\App\Helpers\Clab_Helper as Render;

$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$args  = array(
	'cat'            => get_query_var( 'cat' ),
	'posts_per_page' => get_option( 'clab_cat_post_per_page', 6 ),
	'paged'          => $paged,
	'post_status'    => 'publish'
);

$post_query = new WP_Query( $args );

if ( $post_query->have_posts() ) : ?>

	<?php while ( $post_query->have_posts() ) : $post_query->the_post(); ?>

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
