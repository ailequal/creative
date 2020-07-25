<?php
/**
 * creative functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package creative
 */

/**
 * Scripts per il funzionamento del tema.
 */
function creative_enqueue_scripts() {
	wp_enqueue_style( 'creative.css', get_template_directory_uri() . '/css/creative.css', array(), '1.0', 'all' );
	wp_enqueue_script( 'creative.js', get_template_directory_uri() . '/js/creative.js', array(), '1.0', true );
}

add_action( 'wp_enqueue_scripts', 'creative_enqueue_scripts' );
