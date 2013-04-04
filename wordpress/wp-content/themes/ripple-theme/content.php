<?php
/**
 * for all content pages
 */
?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-header">
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
	</div>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
		<a href="<?php the_permalink(); ?>">read more</a>
	</div><!-- .entry-summary -->
</article><!-- #post-<?php the_ID(); ?> -->