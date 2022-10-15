<?php
/*
|------------------------------------------------------------------
| Bootstraping a Theme
|------------------------------------------------------------------
|
| This file is responsible for bootstrapping your theme. Autoloads
| composer packages, checks compatibility and loads theme files.
|
*/

/*------------------------------------
 *  Composer Include
 * ---------------------------------*/
if ( file_exists( $composer = __DIR__ . '/vendor/autoload.php' ) ) {
	require $composer;
}


use MrBasirnia\App\Setup\Clab_Setup;
use MrBasirnia\App\Helpers\Clab_Helper;


/*------------------------------------
 *  Set Theme Constant
 * ---------------------------------*/
Clab_Helper::define( 'CLAB__PATH', get_template_directory() . DIRECTORY_SEPARATOR );
Clab_Helper::define( 'CLAB__URL', get_template_directory_uri() . DIRECTORY_SEPARATOR );


/*------------------------------------
 *  Init Theme Setup
 * ---------------------------------*/
Clab_Setup::getInstance();


/*------------------------------------
 *  Add Class To pagination
 * ---------------------------------*/
add_filter( 'next_posts_link_attributes', 'posts_link_attributes' );
add_filter( 'previous_posts_link_attributes', 'posts_link_attributes' );

function posts_link_attributes(): string {
	return 'class="btn btn-dark" style=" align-items: center; display: flex;"';
}


/*--------------------------------------------------
 * Adding a class to the category description tag.
 * -----------------------------------------------*/
add_filter( 'category_description', function ( $description, $category ) {

	/* Trimming the description to 40 words and adding ... to the end of it. */
	$des = wp_trim_words(
		$description,
		40,
		'...'
	);

	/**
	 * Checking if the description is empty or not.
	 * If it is not empty, it will return the description with the class lead text-muted.
	 */
	if ( '' !== $description ) {
		return "<p class='lead text-muted'>{$des}</p>";
	}

	return ''; //If description is empty, it will return an empty string.

}, 10, 2 );


/*--------------------------------------------------
 * Add separator to category list.
 * -----------------------------------------------*/
add_filter( 'clab_category_separator', function ( array $categories, string $separator = '/' ) {
	$last_key = end( array_keys( $categories ) );
	foreach ( $categories as $key => $category ) {
		if ( $key === $last_key ) {
			continue;
		}
		$category->name .= " {$separator}";
	}

	return $categories;
} );