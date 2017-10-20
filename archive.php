<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage EmilyGilbert.me 2017
 */
?>
<?php get_header(); ?>

	<main>

		<?php if ( have_posts() ) : ?>

			<h2 class="title center-copy"><?php echo single_cat_title() ?></h2>

			<section class="found-post-container">

				<section class="recent-post clear-fix">

					<?php while ( have_posts() ) : the_post(); ?>

						<?php  /* Imports standard loop post format */
							include 'assets/includes/loop-post-format.php'; ?>

					<?php endwhile; ?>

				</section>

			<?php /* Imports all pagination controls */
				include 'assets/includes/pagination-controls.php'; ?>

			</section> <?php /* END .found-post-container */ ?>

		<?php else : ?>

			<section class="search-query-container center-copy">
				<h2 class="title">Nothing was found</h2>
				<p class="subtitle">Sorry, but there aren't any post in this category. Perhaps try searching?</p>

				<?php get_search_form(); ?>
			</section>

		<?php endif; ?>

	</main> <?php /* END .archive-lp */ ?>

<?php get_footer(); ?>