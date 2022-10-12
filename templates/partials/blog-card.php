<?php
/*---------------------------------------------
*  Get Posts Categories
*  @number Maximum number of terms to return.
* -------------------------------------------*/
$categories = wp_get_object_terms( get_the_ID(), 'category', array(
	'number' => 3,
) );
$categories = apply_filters( 'clab_category_separator', $categories );
?>

<div class="card border-0 mb-4 box-hover">
    <a href="<?php the_permalink(); ?>">
        <img class="card-img-top"
             src="<?= get_the_post_thumbnail_url( get_the_ID(), 'clab_related_posts_thumbnail' ) ?>"
             alt="card image">
    </a>
    <div class="card-body py-4">

		<?php foreach ( $categories as $category ) : ?>
            <a href="<?= get_category_link( $category->term_id ); ?>" class="mb-2 d-inline-block">
				<?= $category->name; ?>
            </a>
		<?php endforeach; ?>

        <h6 class="mb-4"><a href="<?php the_permalink(); ?>"><?= the_title(); ?></a></h6>
        <div class="mb-4">
            <p><?php the_excerpt(); ?></p>
        </div>
        <a href="<?php the_permalink(); ?>" class="btn-read-more">ادامه مطلب</a>
    </div>
</div>