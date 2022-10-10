<section class="section-gap section-top pb-0 bg-white text-center">
    <!--<div class="hero-img bg-overlay" data-overlay="1" style="background-image: url(assets/img/price-banner.jpg);"></div>-->
    <div class="container">
        <div class="row justify-content-md-center align-items-center">
            <div class="col-md-7">
                <!-- heading -->
                <h2 class=""><?php echo get_option( 'clab_home_title', '' ); ?></h2>
                <p class="lead text-muted"><?php echo wp_trim_words( get_option( 'clab_home_description', '' ), 45 , '' ); ?></p>
            </div>
            <div class="col-md-8">
                <img src="<?= CLAB__URL ?>assets/img/blog/blog-banner.jpg" alt="">
            </div>
        </div>
    </div>
</section>