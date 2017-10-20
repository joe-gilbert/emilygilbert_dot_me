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

		<?php
			$search_query = trim(get_search_query());
		?>

		<?php if ( !empty($search_query) && have_posts() ) : ?>

			<section class="search-query-container center-copy">
				<h2 class="title">Search Results</h2>
				<p class="subtitle"><strong>You searched for:</strong> <?php echo $search_query; ?></p>

				<?php get_search_form(); ?>
			</section>

			<section class="found-post-container">

				<section class="recent-post clear-fix">

					<?php while ( have_posts() ) : the_post(); ?>

						<?php  /* Imports standard loop post format */
							include 'assets/includes/loop-post-format.php'; ?>

					<?php endwhile; ?>

				</section>

				<?php  /* Imports post formatting */
					include 'assets/includes/pagination-controls.php'; ?>

			</section> <?php /* END .found-post-container */ ?>

		<?php else : ?>

			<section class="search-query-container center-copy">
				<h2 class="title">Nothing was found</h2>
				<p class="subtitle">Sorry, but nothing was found from your search. Perhaps try searching again?</p>

				<?php get_search_form(); ?>
			</section>

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


		<?php endif; ?>

	</main> <?php /* END .search-results-lp */ ?>

<?php get_footer(); ?>