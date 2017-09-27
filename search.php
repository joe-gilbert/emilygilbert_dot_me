<?php
/**
 * The template for displaying search results pages.
 *
 * @package WordPress
 * @subpackage EmilyGilbert.me 2017
 */
?>
<?php get_header(); ?>

	<main class="search-results-lp">

		<?php if ( have_posts() ) : ?>

			<section class="search-query-container center-copy">
				<h2 class="title">Search Results</h2>
				<p class="subtitle"><strong>You searched for:</strong> <?php echo get_search_query(); ?></p>
			</section>

			<section class="found-post-container">

				<section class="recent-post clear-fix">

					<?php while ( have_posts() ) : the_post(); ?>

						<?php  /* Imports all pagination controls */
							include 'assets/includes/loop-post-format.php'; ?>

					<?php endwhile; ?>

				</section>

				<?php  /* Imports post formatting */
					include 'assets/includes/pagination-controls.php'; ?>

			</section> <?php /* END .found-post-container */ ?>

		<?php else : ?>

			<section class="search-query-container center-copy">
				<h2 class="title">Nothing was found</h2>
				<p class="subtitle">Sorry, but no results were found from your search. Perhaps try searching again?</p>

				<?php get_search_form(); ?>
			</section>

		<?php endif; ?>

	</main> <?php /* END .search-results-lp */ ?>

<?php get_footer(); ?>