<?php

namespace MrBasirnia\App\Shortcodes\page_shortcodes\about;

class Shortcode_About {

	/**
	 * The function `__construct()` is a PHP magic method that is called when the class is instantiated.
	 *
	 * The function `add_shortcode()` is a WordPress function that adds a shortcode to the WordPress system.
	 *
	 * The first parameter of `add_shortcode()` is the name of the shortcode. The second parameter is an array that contains
	 * the name of the function that will be called when the shortcode is used.
	 */
	public function __construct() {
		add_shortcode( 'clab_about_us', array ( $this, 'about_us_callback' ) );
		add_shortcode( 'clab_point', array ( $this, 'point_callback' ) );
		add_shortcode( 'clab_team', array ( $this, 'team_callback' ) );
	}

	/**
	 * It returns a string of about us HTML code
	 *
	 * @return string A string.
	 */
	public function about_us_callback(): string {
		$o = '<div class="section-gap"><div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-md-4">
                        <h6>';

		$o .= 'درباره ما';

		$o .= '</h6><h2 class="mb-4">';

		$o .= get_option(
			'clab_about_page_shortcode_about_us_title',
			' ما یک آژانس دیجیتال مستقر در ایران هستیم'
		);

		$o .= '</h2><p class="text-muted">';

		$o .= get_option(
			'clab_about_page_shortcode_about_us_des',
			'لورم ایپسوم'
		);

		$o .= '</p></div> <div class="col-md-6">';
		$o .= '<img src="' . CLAB__URL . '/assets/img/cards/29c.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>';

		return $o;
	}

	/**
	 * It returns a string of point HTML code.
	 *
	 * @return string
	 */
	public function point_callback(): string {
		$o = '
		<div class="section-gap bg-gray">
			<div class="container">
				<div class="row justify-content-between align-items-center">
					<div class="col-md-8 mb-lg-5 mb-4">
						<h6>هدف ما</h6>
						<h2 class="mb-4">ما در اینجا برای حل مشکل شما و تحویل نیازهای شما هستیم</h2>
					</div>
					<div class="col-md-6">
						<h4>ماموریت</h4>
						<p class="text-muted">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.</p>
						<ul class="list-unstyled text-muted">
							<li><i class="vl-minus font-size-12 pr-3 pb-0"></i>یکی از بهترین سایت های چند منظوره</li>
							<li><i class="vl-minus font-size-12 pr-3 pb-0"></i>پشتیبانی حرفه ای و سریع </li>
							<li><i class="vl-minus font-size-12 pr-3 pb-0"></i>کد های مرتب و تمیز</li>
						</ul>
					</div>
					<div class="col-md-6">
						<h4>ویژن</h4>
						<p class="text-muted">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.</p>
						<ul class="list-unstyled text-muted">
							<li><i class="vl-minus font-size-12 pr-3 pb-0"></i>یکی از بهترین سایت های چند منظوره</li>
							<li><i class="vl-minus font-size-12 pr-3 pb-0"></i>پشتیبانی حرفه ای و سریع </li>
							<li><i class="vl-minus font-size-12 pr-3 pb-0"></i>کد های مرتب و تمیز</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		';

		return $o;    // TODO:: This ShortCode needs dynamization.
	}

	/**
	 * It returns a string of point HTML code.
	 *
	 * @return string
	 */
	public function team_callback(): string {

		$data = array (
			'title' => 'ما یک تیم پویا و نابغه برای خدمتت به شما داریم'
		);

		ob_start();
		@include CLAB__PATH . "templates/partials/team.php";
		$o = ob_get_contents();
		ob_end_clean();

		return $o;
	}
}