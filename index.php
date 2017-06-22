<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage EmilyGilbert.me 2017
 */
?>
<?php get_header(); ?>

	<main>

		<?php if( is_home() ): ?>

			<?php
				$custom_option = get_option('custom_option_name');

				if($custom_option !== FALSE):
			?>

				<header class="engaging-recent-photo-gallery-slider">
					<?php echo do_shortcode('[gallery size="full" ids="'. $custom_option['gallery_image_ids'] .'"]'); ?>
				</header>

			<?php	endif; ?>

		<?php endif; ?>

		<?php if ( have_posts() ): ?>

			<section class="recent-post clear-fix">

				<h2 class="section-title">Recent Shoots</h2>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php  /* Imports all pagination controls */
						include 'assets/includes/loop-post-format.php'; ?>

				<?php endwhile; ?>

			</section>

			<?php  /* Imports all pagination controls */
				include 'assets/includes/pagination-controls.php'; ?>

		<?php else: ?>

			<h2 class="section-title">No posts were found</h2>

			<p class="center-copy">Sorry, there aren't any recent posts. Perhaps searching will help find what you're looking for.</p>

			<?php get_search_form(); ?>

		<?php endif; ?>

	</main>

<?php get_footer(); ?>