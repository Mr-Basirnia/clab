<header class="<?= apply_filters( 'clab_header_tag_class', 'app-header transparent-header transparent-header-dark-nav' ); ?>">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!--<div class="branding-wrap">-->
                <!--brand start-->
                <div class="navbar-brand float-left">
                    <a class="" href="index-2.html">
                        <img class="logo-light" src="<?= CLAB__URL ?>assets/img/logo.png" srcset="<?= CLAB__URL ?>assets/img/logo@2x.png 2x" alt="CLab">
                        <img class="logo-dark" src="<?= CLAB__URL ?>assets/img/logo-dark.png" srcset="<?= CLAB__URL ?>assets/img/logo-dark@2x.png 2x" alt="CLab">
                    </a>
                </div>
                <!--brand end-->
                <!--start responsive nav toggle button-->
                <div class="nav-btn hamburger hamburger--slider js-hamburger ">
                    <div class="hamburger-box">
                        <div class="hamburger-inner"></div>
                    </div>
                </div>
                <!--end responsive nav toggle button-->
                <!--</div>-->
                <!--top mega menu start-->
				<?php wp_nav_menu( array(
					'theme_location' => 'clab-nav-top',
					'menu_class'     => 'vlmenu light-sub-menu slide-effect float-right fade-effect',
					'container'      => 'nav',
					'container_id'   => 'vl-menu',
				) ); ?>
                <!--top mega menu end-->
            </div>
        </div>
    </div>
</header>