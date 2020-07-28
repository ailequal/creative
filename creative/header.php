<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package creative
 */

// Variabili per la visualizzazione
$args = array(
	'menu'            => '',
	'container'       => 'div',
	'container_class' => 'collapse navbar-collapse',
	'container_id'    => 'navbarResponsive',
	'menu_class'      => 'navbar-nav ml-auto my-2 my-lg-0',
	'menu_id'         => '',
	'echo'            => true,
	'fallback_cb'     => 'wp_page_menu',
	'before'          => '',
	'after'           => '',
	'link_before'     => '',
	'link_after'      => '',
	'items_wrap'      => '
<ul id="%1$s" class="%2$s">
	<li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">About</a></li>
	<li class="nav-item"><a class="nav-link js-scroll-trigger" href="#services">Services</a></li>
	<li class="nav-item"><a class="nav-link js-scroll-trigger" href="#portfolio">Portfolio</a></li>
	<li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact">Contact</a></li>
%3$s</ul>',
	'item_spacing'    => 'preserve',
	'depth'           => 0,
	'walker'          => '',
	'theme_location'  => 'header',
	'add_li_class'    => 'nav-item',
);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
	<meta name="description" content=""/>
	<meta name="author" content=""/>
	<title>Creative - Start Bootstrap Theme</title>
	<!-- Favicon-->
	<link rel="icon" type="image/x-icon" href="<?php echo get_template_directory_uri() . '/assets/img/favicon.ico' ?>"/>
	<!-- Font Awesome icons (free version)-->
	<script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
	<!-- Google fonts-->
	<link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet"/>
	<link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic"
		  rel="stylesheet" type="text/css"/>
	<!-- Third party plugin CSS-->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css"
		  rel="stylesheet"/>
	<!-- Core theme CSS (includes Bootstrap)-->
	<?php wp_head() ?>
</head>
<body id="page-top">
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
	<div class="container">
		<a class="navbar-brand js-scroll-trigger" href="#page-top"><?php echo get_bloginfo( 'name' ) ?></a>
		<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
				data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
				aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
		<?php wp_nav_menu( $args ); ?>
	</div>
</nav>
<!-- Masthead-->
<header class="masthead">
	<div class="container h-100">
		<div class="row h-100 align-items-center justify-content-center text-center">
			<div class="col-lg-10 align-self-end">
				<h1 class="text-uppercase text-white font-weight-bold">Your Super Favorite Source of Free Bootstrap
					Themes</h1>
				<hr class="divider my-4"/>
			</div>
			<div class="col-lg-8 align-self-baseline">
				<p class="text-white-75 font-weight-light mb-5">Start Bootstrap can help you build better websites using
					the Bootstrap framework! Just download a theme and start customizing, no strings attached!</p>
				<a class="btn btn-primary btn-xl js-scroll-trigger" href="#about">Find Out More</a>
			</div>
		</div>
	</div>
</header>
