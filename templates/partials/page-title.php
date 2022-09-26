<?php
$page_thumbnail = CLAB__URL . '/assets/img/about-banner.jpg';
if ( has_post_thumbnail() )
	$page_thumbnail = get_the_post_thumbnail_url();
?>
<section class="section-gap section-top bg-gray text-center">
    <div class="hero-img bg-overlay" data-overlay="2"
         style="background-image: url(<?= $page_thumbnail; ?>);"></div>
    <div class="container">
        <div class="row justify-content-md-center align-items-center text-white py-lg-5">
            <div class="col-md-7">
                <!-- heading -->
                <h2 class=""><?= wp_title( '' ); ?></h2>
            </div>
        </div>
    </div>
</section>