<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package creative
 */

// Variabili per la visualizzazione
$args_first_section = array(
	'post_type'      => 'section',
	'order'          => 'ASC',
	'posts_per_page' => 1,
);

get_header();
?>

    <main id="primary" class="site-main">
        <!-- Masthead-->
        <!-- CPT "section" loop (solo la prima sezione)-->
		<?php $query_first_section = new WP_Query( $args_first_section ); ?>
		<?php if ( $query_first_section->have_posts() ) : while ( $query_first_section->have_posts() ) : $query_first_section->the_post(); ?>
            <header class="masthead d-flex align-items-center"
                    style="background-image: url(<?php echo get_the_post_thumbnail_url() ?>);">
            </header>
		<?php endwhile; ?>
		<?php endif; ?>
		<?php wp_reset_postdata() ?>

		<?php
		while ( have_posts() ) :
			the_post();
			the_content();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

    </main><!-- #main -->

<?php
get_footer();
