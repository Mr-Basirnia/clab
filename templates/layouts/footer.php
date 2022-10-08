<?php if ( ! is_404() ) : ?>
    <!--footer start-->
    <footer class="app-footer bg-dark pb-0 border-0 text-md-left text-center">
        <div class="container">
            <div class="row align-items-center mb-md-5 mb-3">
                <div class="col-md-4">
                    <img class="pr-3 mb-md-0 mb-4" src="<?= CLAB__URL ?>assets/img/logo-color.png"
                         srcset="<?= CLAB__URL ?>assets/img/logo-color@2x.png 2x"
                         alt="">
                </div>
                <div class="col-md-8">
                    <span class="font-lora h5 font-weight-normal">- یک بسته ساز قدرتمند خلاق برای بوت استرپ 4</span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-md-0 mb-4">
                    <p class="text-muted">
                        یک مجموعه بزرگ و قدرتمند از بسته بندی جزء مدرن برای ساختن وب سایت بهتر برای
                        پروژه
                        بعدی شما
                    </p>
                </div>
                <div class="col-md-2 mb-md-0 mb-4">
                    <h6 class="mb-4">حرکت کن</h6>
					<?php if ( has_nav_menu( 'clab-footer-nav-one' ) ) :
						wp_nav_menu( array(
							'theme_location'  => 'clab-footer-nav-one',
							'container'       => 'ul',
							'container_class' => 'footer-link',
							'menu_class'      => 'footer-link',
							'li_class'        => 'd-block',
						) );
					endif; ?>
                </div>
                <div class="col-md-2 mb-md-0 mb-4">
                    <h6 class="mb-4">پلتفرم</h6>
					<?php if ( has_nav_menu( 'clab-footer-nav-two' ) ) :
						wp_nav_menu( array(
							'theme_location'  => 'clab-footer-nav-two',
							'container'       => 'ul',
							'container_class' => 'footer-link',
							'menu_class'      => 'footer-link',
							'li_class'        => 'd-block',
						) );
					endif; ?>
                </div>
                <div class="col-md-2 mb-md-0 mb-4">
                    <h6 class="mb-4">جامعه</h6>
					<?php if ( has_nav_menu( 'clab-footer-nav-three' ) ) :
						wp_nav_menu( array(
							'theme_location'  => 'clab-footer-nav-three',
							'container'       => 'ul',
							'container_class' => 'footer-link',
							'menu_class'      => 'footer-link',
							'li_class'        => 'd-block',
						) );
					endif; ?>
                </div>
                <div class="col-md-2 mb-md-0 mb-4">
                    <h6 class="mb-4">شرکت</h6>
					<?php if ( has_nav_menu( 'clab-footer-nav-four' ) ) :
						wp_nav_menu( array(
							'theme_location'  => 'clab-footer-nav-four',
							'container'       => 'ul',
							'container_class' => 'footer-link',
							'menu_class'      => 'footer-link',
							'li_class'        => 'd-block',
						) );
					endif; ?>
                </div>
            </div>
        </div>
        <div class="app-secondary-footer mt-md-5 mt-3">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <span class="copyright">© 2019 کلاب. تمام حقوق محفوظ است.</span>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--footer end-->
<?php endif; ?>

<?php wp_footer(); ?>

<!--basic scripts-->
<script src="<?= CLAB__URL ?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?= CLAB__URL ?>assets/vendor/popper.min.js"></script>
<script src="<?= CLAB__URL ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?= CLAB__URL ?>assets/vendor/vl-nav/js/vl-menu.js"></script>
<script src="<?= CLAB__URL ?>assets/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
<script src="<?= CLAB__URL ?>assets/vendor/owl/owl.carousel.min.js"></script>
<script src="<?= CLAB__URL ?>assets/vendor/jquery.animateNumber.min.js"></script>
<script src="<?= CLAB__URL ?>assets/vendor/jquery.countdown.min.js"></script>
<script src="<?= CLAB__URL ?>assets/vendor/typist.js"></script>
<script src="<?= CLAB__URL ?>assets/vendor/jquery.isotope.js"></script>
<script src="<?= CLAB__URL ?>assets/vendor/imagesloaded.js"></script>
<script src="<?= CLAB__URL ?>assets/vendor/visible.js"></script>
<script src="<?= CLAB__URL ?>assets/vendor/wow.min.js"></script>

<!--basic scripts initialization-->
<script src="<?= CLAB__URL ?>assets/js/scripts.js"></script>
<script>
    jQuery(function ($) {
        $(document).ready(function () {
            $('li.menu-item-object-custom.menu-item-has-children > a:first-child').append('<i class="fa fa-angle-down ml-2"></i>');
        });
    });
</script>

</body>

</html>