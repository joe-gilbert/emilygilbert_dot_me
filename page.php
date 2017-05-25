<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage EmilyGilbert.me 2017
 */
?>

<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

	<main itemscope itemtype="http://schema.org/Article">

			<article itemprop="articleBody">

					<?php the_content(); ?>

			</article>

	</main>

<?php endwhile; ?>

<?php get_footer(); ?>