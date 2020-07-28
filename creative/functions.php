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

/**
 * Registrazione dei menu disponibili per il tema.
 */
function creative_theme_setup() {
	register_nav_menus( array(
		'header' => 'Header',
		'footer' => 'Footer',
	) );
}

add_action( 'after_setup_theme', 'creative_theme_setup' );

/**
 * Aggiungi una classe personalizzata ai <li> del menu.
 *
 * @param array $classes Array delle classi CSS applicate al tag <li>.
 * @param object $item L'attuale menu item.
 * @param object $args L'oggetto degli argomenti della funzione wp_nav_menu().
 *
 * @return mixed Array di classi personalizzate per <li>.
 */
function add_li_class( $classes, $item, $args ) {
	if ( isset( $args->add_li_class ) ) {
		$classes[] = $args->add_li_class;
	}

	return $classes;
}

add_filter( 'nav_menu_css_class', 'add_li_class', 1, 3 );

/**
 * Aggiungi una classe personalizzata agli <a> del menu.
 *
 * @param array $atts Attributi HTML applicati al tag <a>.
 * @param object $item L'attuale menu item.
 * @param object $args L'oggetto degli argomenti della funzione wp_nav_menu().
 *
 * @return mixed Attributi personalizzati per <a>.
 */
function add_a_attribute( $atts, $item, $args ) {
	if ( $args->theme_location === 'header' ) {
		$atts['class'] = 'nav-link';
	}

	return $atts;
}

add_filter( 'nav_menu_link_attributes', 'add_a_attribute', 10, 3 );
