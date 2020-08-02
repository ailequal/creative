<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package creative
 */

// Variabili per la visualizzazione
$args_first_section = array(
	'post_type'      => 'section',
	'order'          => 'ASC',
	'orderby'        => 'menu_order',
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

			the_post_navigation(
				array(
					'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'creative' ) . '</span> <span class="nav-title">%title</span>',
					'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'creative' ) . '</span> <span class="nav-title">%title</span>',
				)
			);

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

    </main><!-- #main -->

<?php
get_footer();
