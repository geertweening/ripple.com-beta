<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @packageRipple
 */

get_header('targets'); ?>
	
	<?php include (TEMPLATEPATH . '/inc/404-header.php' ); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main wrapper four-o-four" role="main">

				<div class="entry-content">

					<div class="col-sm-12">
						<p><?php _e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'ripple' ); ?></p>
						<?php get_search_form(); ?>
					</div>

					

					<div class="col-sm-4">
						<div class="thumbnail boxed">
						 	<?php the_widget( 'WP_Widget_Recent_Posts' ); ?>
						 </div>
					</div>
					

					<?php if ( ripple_categorized_blog() ) : // Only show the widget if site has multiple categories. ?>
					
					<div class="col-sm-4">
						<div class="thumbnail boxed">
							<h2 class="widgettitle"><?php _e( 'Most Used Categories', 'ripple' ); ?></h2>
							<ul>
							<?php
								wp_list_categories( array(
									'orderby'    => 'count',
									'order'      => 'DESC',
									'show_count' => 1,
									'title_li'   => '',
									'number'     => 10,
								) );
							?>
							</ul>
						</div>
					</div><!-- .thumbnail boxed -->

					<?php endif; ?>

					<div class="col-sm-4">
						<div class="thumbnail boxed">
							<?php
							/* translators: %1$s: smiley */
							$archive_content = '<p>' . sprintf( __( 'Try looking in the monthly archives. %1$s', 'ripple' ), convert_smilies( ':)' ) ) . '</p>';
							the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );
							?>
						</div>
					</div>

					<div class="col-sm-4">
						<div class="thumbnail boxed">
							<?php the_widget( 'WP_Widget_Tag_Cloud' ); ?>
						</div>
					</div>

				</div><!-- .entry-content -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer('links'); ?>