<?php
/**
 * for all content pages
 */
?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-header">
		<span class="entry-date"><?php the_time('F j, Y'); ?></span>
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
	</div>
	<div class="entry-summary">
		<?php if (is_single()): ?>
			<?php the_content(); ?>
		<?php else: ?>
			<?php the_excerpt(); ?>
		<?php endif ?>
		<a href="<?php the_permalink(); ?>">read more</a>
	</div><!-- .entry-summary -->
</article><!-- #post-<?php the_ID(); ?> -->