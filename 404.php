<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage EmilyGilbert.me 2017
 */
?>

<?php get_header(); ?>

	<main class="error-404-lp">

		<section class="search-query-container center-copy">
			<h2 class="title">Sorry, that page wasn't found.</h2>
			<p class="subtitle"><a href="/">Browse all shoots here</a> or search for a specific shoot below.</p>

			<?php get_search_form(); ?>
		</section> <?php /* END .inner-container .search-container */ ?>

		<?php query_posts( 'posts_per_page=9' ); ?>

		<?php if ( have_posts() ): ?>

			<section class="recent-post clear-fix">

				<h2 class="section-title">Recent Shoots</h2>

				<?php while ( have_posts() ) : the_post(); ?>

					<article class="single-post" itemprop="blogPost" itemscope itemtype="http://schema.org/BlogPosting">
						<a href="<?php echo get_permalink(); ?>" class="post-info" itemprop="url">
							<?php if ( '' !== get_the_post_thumbnail() ): ?>
								<figure class="post-image" itemprop="image">
									<?php the_post_thumbnail(); ?>
								</figure>
							<?php endif; ?>
							<h4 class="post-title" itemprop="headline"><?php the_title(); ?></h4>
							<p class="posted-date"><time datetime="<?php echo get_the_date('c'); ?>" itemprop="datePublished"><?php echo get_the_date('F jS, Y'); ?></time></p>
						</a>
					</article>

				<?php endwhile; ?>

			</section>

		<?php endif; ?>

	</main>

<?php get_footer(); ?>