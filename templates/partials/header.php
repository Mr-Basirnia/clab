<header class="<?= apply_filters( 'clab_header_tag_class', 'app-header transparent-header transparent-header-dark-nav' ); ?>">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!--<div class="branding-wrap">-->
                <!--brand start-->
                <div class="navbar-brand float-left">
                    <a class="" href="index-2.html">
						<?php if ( has_custom_logo() ) {
							the_custom_logo();
						} ?>
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
	            <?php if ( has_nav_menu( 'clab-nav-top' ) ) :
		            wp_nav_menu( array(
			            'theme_location' => 'clab-nav-top',
			            'menu_class'     => 'vlmenu light-sub-menu slide-effect float-right fade-effect',
			            'container'      => 'nav',
			            'container_id'   => 'vl-menu',
		            ) );
	            endif; ?>
                <!--top mega menu end-->
            </div>
        </div>
    </div>
</header>