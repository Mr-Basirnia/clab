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
						if ( ! is_wp_error( $post_tags ) && $post_tags ) : ?>
							<?php foreach ( $post_tags as $key => $tag ) : ?>
                                <a href="<?= get_tag_link( $tag->term_id ); ?>" class="badge badge-pill badge-dark">
									<?= $tag->name; ?>
                                </a>
							<?php endforeach; ?>

						<?php else : ?>
                            <p class="badge badge-pill badge-dark">بدون برچسب</p>
						<?php endif; ?>
                    </h6>

                </div>
            </div>
        </div>
    </div>
</section>
<hr>

<?php
/*-------------------------------------
* Get Post Author
*-----------------------------------*/
?>
<div class="component-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-md-3 text-md-center">
                        <img class="avatar-lg rounded-circle mb-3 d-inline-block"
                             src="<?= get_avatar_url( get_the_author_meta( 'ID' ), array( 'size' => 240 ) ) ?>"
                             alt="<?= get_the_author_meta( 'display_name' ) ?>">
                    </div>
                    <div class="col-md-9">
                        <h5 class="font-lora font-weight-normal mb-4">
							<?= ! empty( get_the_author_meta( 'description' ) ) ? get_the_author_meta( 'description' ) : 'بدون توضیحات'; ?>
                        </h5>
                        <div class="border-left mb-3"> &nbsp;</div>
                        <strong class="text-primary"><?= get_the_author_meta( 'display_name' ) ?></strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<hr>