<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package creative
 */

// Variabili per la visualizzazione
$args_query = array(
	'post_type' => 'section',
	'order'     => 'ASC',
	'orderby'   => 'menu_order',
);

$counter = 1;

get_header();
?>

    <!-- CPT "section" loop-->
<?php $query = new WP_Query( $args_query ); ?>
<?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
	<?php /* @var WP_Post $post */ ?>
	<?php global $post; ?>
	<?php if ( $counter === 1 ) : ?>
        <!-- Masthead-->

        <header class="masthead d-flex align-items-center"
                style="background-image: url(<?php echo get_the_post_thumbnail_url() ?>)">
            <div id="<?php echo $post->post_name ?>" class="vertical-center">
				<?php the_content() ?>
            </div>
        </header>
	<?php else: ?>
        <!-- Sections-->
        <div id="<?php echo $post->post_name ?>">
			<?php if ( has_post_thumbnail() ) : ?>
                <div class="mv-100 text-center">
					<?php the_post_thumbnail( 'post-thumbnail', array( 'class' => 'w-75 h-75' ) ); ?>
                </div>
			<?php endif; ?>
			<?php the_content() ?>
        </div>
	<?php endif; ?>
	<?php $counter = $counter + 1; ?>
<?php endwhile; ?>
<?php endif; ?>
<?php wp_reset_postdata() ?>

<?php
get_footer();
