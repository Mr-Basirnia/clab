<?php
/*----------------
 *  Get Header
 * -------------*/
get_header();
?>

    <section class="section-gap section-top">
        <div class="container">
            <div class="row justify-content-md-center align-items-center text-lg-left text-center">
                <div class="col-md-4">
                    <img class="mb-lg-0 mb-5" src="<?= CLAB__URL; ?>/assets/img/error-icon.png" alt="">
                </div>
                <div class="col-md-5 pl-lg-5">
                    <h1 class="font-size-60 text-primary">خطای 404</h1>
                    <p>با عرض پوزش صفحه پیدا نشد</p>
                    <a href="<?= wp_get_referer(); ?>" class="btn btn-pill btn-theme">
                        بازگشت به صفحه قبلی
                    </a>
                </div>
            </div>
        </div>
    </section>

<?php
/*----------------
 *  Get Header
 * -------------*/
get_header();
?>