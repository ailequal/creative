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
function creative_enqueue_scripts()
{
    // CSS
    wp_enqueue_style('merriweather-sans', 'https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700', array(), '1.0', 'all');
    wp_enqueue_style('merriweather', 'https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic', array(), '1.0', 'all');
    wp_enqueue_style('creative-css', get_template_directory_uri() . '/css/creative.css', array(), '1.0', 'all');
    wp_enqueue_style('magnific-popup', 'https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css', array(), '1.0', 'all');

    // JS in <header>
    wp_enqueue_script('fontawesome', 'https://use.fontawesome.com/releases/v5.13.0/js/all.js', array(), '1.0', false);

    // JS in <footer>
    wp_enqueue_script('jquery-3.5.1', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js', array(), '1.0', true);
    wp_enqueue_script('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js', array(), '1.0', true);
    wp_enqueue_script('jquery-easing', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js', array(), '1.0', true);
    wp_enqueue_script('jquery-magnific-popup', 'https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js', array(), '1.0', true);
    wp_enqueue_script('creative-js', get_template_directory_uri() . '/js/creative.js', array(), '1.0', true);
}

add_action('wp_enqueue_scripts', 'creative_enqueue_scripts');

/**
 * Registrazione dei menu disponibili per il tema.
 */
function creative_theme_setup()
{
    register_nav_menus(array(
        'header' => 'Header',
        'footer' => 'Footer',
    ));
}

add_action('after_setup_theme', 'creative_theme_setup');

/**
 * Aggiungi una classe personalizzata ai <li> del menu.
 *
 * @param array $classes Array delle classi CSS applicate al tag <li>.
 * @param object $item L'attuale menu item.
 * @param object $args L'oggetto degli argomenti della funzione wp_nav_menu().
 *
 * @return mixed Array di classi personalizzate per <li>.
 */
function add_li_class($classes, $item, $args)
{
    if (isset($args->add_li_class)) {
        $classes[] = $args->add_li_class;
    }

    return $classes;
}

add_filter('nav_menu_css_class', 'add_li_class', 1, 3);

/**
 * Aggiungi una classe personalizzata agli <a> del menu.
 *
 * @param array $atts Attributi HTML applicati al tag <a>.
 * @param object $item L'attuale menu item.
 * @param object $args L'oggetto degli argomenti della funzione wp_nav_menu().
 *
 * @return mixed Attributi personalizzati per <a>.
 */
function add_a_attribute($atts, $item, $args)
{
    if ($args->theme_location === 'header') {
        $atts['class'] = 'nav-link';
    }

    return $atts;
}

add_filter('nav_menu_link_attributes', 'add_a_attribute', 10, 3);
