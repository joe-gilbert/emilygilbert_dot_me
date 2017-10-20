<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage EmilyGilbert.me 2017
 * Template Name: Search Page
 */
?>

<?php get_header(); ?>

	<main class="error-404-lp">

		<section class="search-query-container center-copy">
			<h2 class="title">Search for a specific shoot</h2>
			<p class="subtitle">You can also <a href="/">browse all shoots here</a> or see some of my recent ones below.</p>

			<?php get_search_form(); ?>
		</section> <?php /* END .inner-container .search-container */ ?>

		<?php query_posts( 'posts_per_page=9' ); ?>

		<?php if ( have_posts() ): ?>

			<section class="recent-post clear-fix">

				<h2 class="section-title">Recent Shoots</h2>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php  /* Imports standard loop post format */
						include 'assets/includes/loop-post-format.php'; ?>

				<?php endwhile; ?>

			</section>

		<?php endif; ?>

	</main>

<?php get_footer(); ?>