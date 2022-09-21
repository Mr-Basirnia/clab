<section class="section-gap pb-0">
    <div class="container">
        <div class="row justify-content-center ">
            <div class="col-lg-8">
                <div class="blog-post border-0 blog-single">
					<?php the_content(); ?>

					<?php
					/*-------------------------------------
					* Get Post Tags
					*-----------------------------------*/
					$post_tags = get_the_tags( get_the_ID() ); ?>
                    <h6 class="mb-0">برچسب ها:
						<?php
						// Checking if there is any error in the post tags and if there is no error it will loop through
						// the tags and display them.
						if ( ! is_wp_error( $post_tags ) ): ?>
							<?php foreach ( $post_tags as $key => $tag ): ?>
                                <a href="<?= $tag->slug; ?>" class="badge badge-pill badge-dark">
									<?= $tag->name; ?>
                                </a>
							<?php endforeach; ?>
						<?php endif; ?>
                    </h6>

                </div>
            </div>
        </div>
    </div>
</section>
<hr>