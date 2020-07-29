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
$args_menu = array(
    'menu' => '',
    'container' => 'div',
    'container_class' => 'collapse navbar-collapse',
    'container_id' => 'navbarResponsive',
    'menu_class' => 'navbar-nav ml-auto my-2 my-lg-0',
    'menu_id' => '',
    'echo' => true,
    'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
    'before' => '',
    'after' => '',
    'link_before' => '',
    'link_after' => '',
    'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
    'item_spacing' => 'preserve',
    'depth' => 2,
    'walker' => new WP_Bootstrap_Navwalker(),
    'theme_location' => 'header',
);

$args_section = array(
    'post_type' => 'section',
    'order' => 'ASC',
    'posts_per_page' => 1,
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
    <link rel="icon" type="image/x-icon" href="<?php echo get_template_directory_uri() . '/assets/img/favicon.ico' ?>"/>
    <?php wp_head() ?>
    <style>
        .bkg {
            background-color: <?php echo $color; ?>
        }

        .bkg-alt {
            background-color: <?php echo $color_alt; ?>
        }
    </style>


</head>
<body id="page-top" <?php body_class(); ?>>
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top"><?php echo get_bloginfo('name') ?></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <?php wp_nav_menu($args_menu); ?>
    </div>
</nav>
<!-- Masthead-->
<!-- CPT "section" loop (solo la prima sezione)-->
<?php $query = new WP_Query($args_section); ?>
<?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
    <header class="masthead d-flex align-items-center" style="background-image: url(<?php echo get_the_post_thumbnail_url() ?>)">
                <div id="section-<?php echo get_the_id() ?>" class="vertical-center">
                    <?php the_content() ?>
                </div>
    </header>
<?php endwhile; ?>
<?php endif; ?>
<?php wp_reset_postdata() ?>
