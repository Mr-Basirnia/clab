<?php

namespace MrBasirnia\App\Shortcodes;

class Shortcode_Quote {

	/**
	 * `add_shortcode( 'clab_quote', array ( $this, 'clab_quote_callback' ) );`
	 *
	 * This function is a WordPress function that adds a shortcode to the WordPress system. The first parameter is the name of
	 * the shortcode. The second parameter is the function that will be called when the shortcode is used
	 */
	public function __construct() {
		add_shortcode( 'clab_quote', array ( $this, 'clab_quote_callback' ) );
	}


	/**
	 * It creates a shortcode that can be used in the editor.
	 *
	 * @param array $atts
	 * @param $content
	 * @param string $tag
	 *
	 * @return string The output of the shortcode.
	 */
	public function clab_quote_callback( array $atts = array (), $content = null, string $tag = '' ): string {

		/*---------------------------------------
		*  normalize attribute keys, lowercase.
		* -------------------------------------*/
		$atts = array_change_key_case( (array) $atts, CASE_LOWER );

		/*----------------------------------------------------
		*  override default attributes with user attributes.
		* --------------------------------------------------*/
		$quote_atts = shortcode_atts(
			array (
				'author' => get_the_author(),
			), $atts, $tag
		);

		// start box
		$o = '<div class="card p-5 bg-dark text-white border-0 mb-lg-5 mb-4"><blockquote class="text-center">';

		/*----------------
		*  Quote content
		* --------------*/
		if ( null !== $content ):
			// Remove all instances of "<p>&nbsp;</p>" to avoid extra lines.
			$content = preg_replace( '%<p>&nbsp;\s*</p>%', '', $content );
			$old     = array ( '<br />', '<br>' );
			$new     = array ( '', '' );
			$content = str_replace( $old, $new, $content );

			$o .= '<p class="h5 d-block mb-4">';
			$o .= "“{$content}”";
			$o .= '</p>';
		endif;

		/*----------------
		*  Quote author
		* --------------*/
		$o .= '<span>— ';
		$o .= $quote_atts['author'];
		$o .= '</span>';

		// end box
		$o .= ' </blockquote></div>';

		return $o; // return output
	}
}