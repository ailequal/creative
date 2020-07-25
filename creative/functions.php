<?php
/**
 * creative functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package creative
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Scripts per il funzionamento del tema.
 */
function creative_enqueue_scripts() {
	wp_enqueue_style( 'creative.css', get_template_directory_uri() . '/css/creative.css', array(), '1.0', 'all' );
	wp_enqueue_script( 'creative.js', get_template_directory_uri() . '/js/creative.js', array(), '1.0', true );
}

add_action( 'wp_enqueue_scripts', 'creative_enqueue_scripts' );
