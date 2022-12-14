<section class="section-gap bg-gray">
    <div class="container">
        <div class="row mb-lg-5 mb-4">
            <div class="col-md-8">
                <h5>پست های مشابه</h5>
            </div>
        </div>
        <div class="row justify-content-center">

			<?php use MrBasirnia\App\Helpers\Clab_Helper;

			$current_post_categories    = get_categories();
			$current_post_categories_id = array();

			foreach ( $current_post_categories as $category ) {
				$current_post_categories_id[] = $category->term_id;
			}

			$related_posts = Clab_Helper::related_posts( $current_post_categories_id );
			if ( $related_posts->have_posts() ) : ?>

				<?php while ( $related_posts->have_posts() ) : $related_posts->the_post();
					/*------------------------------------
					*  Get Related Posts Categories
					*  @number Maximum number of terms to return.
					* ---------------------------------*/
					$related_post_categories = wp_get_object_terms( get_the_ID(), 'category', array(
						'number' => 3,
					) );
					$related_post_categories = apply_filters( 'clab_category_separator', $related_post_categories );
					?>

                    <div class="col-md-4">
                        <div class="card border-0 mb-md-0 mb-3 box-hover">
                            <a href="<?php the_permalink() ?>">
                                <img class="card-img-top" src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'clab_related_posts_thumbnail' ) ?>" alt="<?php echo the_title(); ?>">
                            </a>
                            <div class="card-body py-4">

								<?php foreach ( $related_post_categories as $category ) : ?>
                                    <a href="<?php echo get_category_link( $category->term_id ) ?>" class="mb-2 d-inline-block">
										<?php echo $category->name ?>
                                    </a>
								<?php endforeach; ?>

                                <h5 class="mb-4"><a href="<?php the_permalink() ?>"><?php echo the_title(); ?></a></h5>
                                <div class="mb-4">
                                    <p><?php the_excerpt(); ?></p>
                                </div>

                            </div>
                            <div class="card-footer">
                                <div class="d-flex align-items-center">
                                    <img class="avatar-sm rounded-circle mr-3" src="<?php echo get_avatar_url( get_the_author_meta( 'ID' ), array( 'size' => 240 ) ) ?>" alt="<?php the_author(); ?>">
                                    <span><?php the_author(); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>

				<?php endwhile; ?>

			<?php endif; ?>

        </div>
    </div>
</section>