<section class="section-gap pb-0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <section class="section-gap px-lg-5">
                    <div class="hero-img bg-overlay rounded overflow-hidden" data-overlay="2"
                         style="background-image: url(<?= get_the_post_thumbnail_url( get_the_ID(), 'clab_blog_post_single_thumbnail' ) ?>);"></div>
                    <div class="container">
                        <div class="row align-items-center text-white">
                            <div class="col-md-8">
                                <h3 class=""><?= the_title(); ?></h3>
                                <div class="meta font-lora my-4 text-white">
	                                <?php the_category( ' - ' ); ?>
                                    <span class="meta-separator"></span>
                                    <a href="#"><?= verta( get_post_timestamp( get_the_ID() ) )->format( '%d %B، %Y' ) ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</section>