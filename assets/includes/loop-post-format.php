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