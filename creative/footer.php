<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package creative
 */

// Variabili per la visualizzazione
$args = array(
    'menu' => '',
    'container' => 'div',
    'container_class' => '',
    'container_id' => '',
    'menu_class' => 'menu',
    'menu_id' => '',
    'echo' => true,
    'fallback_cb' => 'wp_page_menu',
    'before' => '',
    'after' => '',
    'link_before' => '',
    'link_after' => '',
    'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
    'item_spacing' => 'preserve',
    'depth' => 0,
    'walker' => '',
    'theme_location' => 'footer',
);
?>

<!-- Footer-->
<footer class="bg-light py-5">
    <?php wp_nav_menu($args); ?>
    <div class="container">
        <div class="small text-center text-muted">Copyright © 2020 - Start Bootstrap</div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
