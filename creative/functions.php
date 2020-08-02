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
	// CSS
	wp_enqueue_style( 'merriweather-sans', 'https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700', array(), '1.0', 'all' );
	wp_enqueue_style( 'merriweather', 'https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic', array(), '1.0', 'all' );
	wp_enqueue_style( 'creative-css', get_template_directory_uri() . '/css/creative.css', array(), '1.0', 'all' );
	wp_enqueue_style( 'magnific-popup', 'https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css', array(), '1.0', 'all' );

	// JS in <header>
	wp_enqueue_script( 'fontawesome', 'https://use.fontawesome.com/releases/v5.13.0/js/all.js', array(), '1.0', false );

	// JS in <footer>
	wp_enqueue_script( 'jquery-3.5.1', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js', array(), '1.0', true );
	wp_enqueue_script( 'bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js', array(), '1.0', true );
	wp_enqueue_script( 'jquery-easing', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js', array(), '1.0', true );
	wp_enqueue_script( 'jquery-magnific-popup', 'https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js', array(), '1.0', true );
	wp_enqueue_script( 'creative-js', get_template_directory_uri() . '/js/creative.js', array(), '1.0', true );
}

add_action( 'wp_enqueue_scripts', 'creative_enqueue_scripts' );

/**
 * Setup del tema "creative".
 */
function creative_theme_setup() {
	// Registrazione dei menu disponibili per il tema.
	register_nav_menus( array(
		'header' => 'Header',
		'footer' => 'Footer',
	) );

	// Aggiunto supporto per le thumbnails.
	add_theme_support( 'post-thumbnails' );

	// Aggounto supporto per la stampa del tag <title> dentro la <head>.
	add_theme_support( 'title-tag' );
}

add_action( 'after_setup_theme', 'creative_theme_setup' );

/**
 * Register Custom Navigation Walker
 */
function register_navwalker() {
	require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}

add_action( 'after_setup_theme', 'register_navwalker' );

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
	if ( $args->theme_location === 'header' && $item->object === 'section' ) {
		$atts['class'] = 'nav-link js-scroll-trigger';
	}

	return $atts;
}

add_filter( 'nav_menu_link_attributes', 'add_a_attribute', 10, 3 );

/**
 * Creazione del CPT "section".
 */
function creative_create_post_type_section() {
	$labels = array(
		'name'                  => _x( 'Sezioni', 'Post type general name', 'creative' ),
		'singular_name'         => _x( 'Sezione', 'Post type singular name', 'creative' ),
		'menu_name'             => _x( 'Sezioni', 'Admin Menu text', 'creative' ),
		'name_admin_bar'        => _x( 'Sezione', 'Add New on Toolbar', 'creative' ),
		'add_new'               => __( 'Nuova sezione', 'creative' ),
		'add_new_item'          => __( 'Aggiungi nuova sezione', 'creative' ),
		'new_item'              => __( 'Nuova sezione', 'creative' ),
		'edit_item'             => __( 'Modifica sezione', 'creative' ),
		'view_item'             => __( 'Visualizza sezione', 'creative' ),
		'all_items'             => __( 'Tutte le sezioni', 'creative' ),
		'search_items'          => __( 'Cerca le sezioni', 'creative' ),
		'parent_item_colon'     => __( 'Sezione genitore:', 'creative' ),
		'not_found'             => __( 'Nessuna sezione trovata.', 'creative' ),
		'not_found_in_trash'    => __( 'Nessuna sezione trovata nel cestino.', 'creative' ),
		'featured_image'        => _x( 'Immagine in evidenza della sezione', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'creative' ),
		'set_featured_image'    => _x( 'Imposta immagine in evidenza della sezione', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'creative' ),
		'remove_featured_image' => _x( 'Rimuovi immagine in evidenza della sezione', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'creative' ),
		'use_featured_image'    => _x( 'Usa come immagine in evidenza', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'creative' ),
		'archives'              => _x( 'Archivio sezioni', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'creative' ),
		'insert_into_item'      => _x( 'Inserisci nella sezione', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'creative' ),
		'uploaded_to_this_item' => _x( 'Caricato con questa sezione', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'creative' ),
		'filter_items_list'     => _x( 'Filtra lista di sezioni', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'creative' ),
		'items_list_navigation' => _x( 'Lista di navigazione delle sezioni', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'creative' ),
		'items_list'            => _x( 'Lista delle sezioni', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'creative' ),
	);
	$args   = array(
		'labels'              => $labels,
		'public'              => false,
		'publicly_queryable'  => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_rest'        => true,
		'query_var'           => true,
		'exclude_from_search' => true,
		'capability_type'     => 'post',
		'has_archive'         => false,
		'hierarchical'        => true,
		'menu_position'       => null,
		'supports'            => array(
			'title',
			'editor',
			'author',
			'thumbnail',
			'revisions',
			'page-attributes',
		),
	);
	register_post_type( 'section', $args );
}

add_action( 'init', 'creative_create_post_type_section' );

/**
 * Creazione di voci personalizzate nel customizer.
 *
 * @param object $wp_customize L'istanza del customizer.
 */
function creative_customize_register( $wp_customize ) {

	$wp_customize->add_section( 'creative_primary_color', array(
		'title'       => __( 'Colore primario del tema', 'creative' ),
		'description' => 'Impostare il colore primario del tema.',
		'priority'    => 120,
	) );

	$wp_customize->add_setting( 'primary_color', array(
		'default'   => '#2570e8',
		'transport' => 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_color', array(
		'label'    => __( 'Colore primario del tema', 'creative' ),
		'section'  => 'creative_primary_color',
		'settings' => 'primary_color',
	) ) );
}

add_action( 'customize_register', 'creative_customize_register' );

/**
 * Filtra e modifica i permalink delle sezioni.
 *
 * @param string $post_link The post's permalink.
 * @param WP_Post $post The post in question.
 * @param bool $leavename Whether to keep the post name.
 * @param bool $sample Is it a sample permalink.
 */
function creative_filter_section_extra( $post_link, $post, $leavename, $sample ) {
	if ( $post->post_type === 'section' ) {
		$post_link = get_home_url() . '#' . $post->post_name;
	}

	return $post_link;
}

add_filter( 'post_type_link', 'creative_filter_section_extra', 10, 4 );
