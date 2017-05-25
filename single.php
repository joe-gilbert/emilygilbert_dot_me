<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage EmilyGilbert.me 2017
 */
?>
<?php get_header(); ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<main itemscope itemtype="http://schema.org/Article">

			<article itemprop="articleBody"  class="post-content">

				<?php if ( '' !== get_the_post_thumbnail() ): ?>
					<header class="post-header">
						<?php the_post_thumbnail(null, ['class' => 'engaging-header-image']); ?>
					</header>
				<?php endif; ?>

				<h1 class="post-title section-title" itemprop="name"><?php the_title(); ?></h1>

				<?php the_content(); ?>

			</article>

		</main>

	<?php endwhile; ?>

<?php get_footer(); ?>