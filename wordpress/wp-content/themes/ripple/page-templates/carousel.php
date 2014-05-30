<?php
/**
 * Template Name: Home Page Carousel
 */

get_header(); ?>
<div id="primary" class="content-area secondary-font-family">
	
	
	<div id="carousel" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">
			<!-- <div class="item">
				<article id="text-area" class="text-area wrapper">
					<div class="entry-content callout text">
						<h1>Computing for Good</h1>
						<p>Donate spare computing time for reasearch. Receive XRP from Ripple Labs.</p>
						<div class="join">
							<a target="blank" href="http://computingforgood.com/">
								Join
							</a>
						</div>
					</div>
				</article> 
			</div> -->
			<div class="item active">
				<article id="video-area" class="video-area wrapper">
					<div class="entry-content callout video">
						<h1>The Future of Payments</h1>
						<a id="start-video" href="#">
							<div class="play-button-circle">
								<i class="fa fa-play">

								</i>
							</div>
						</a>
					</div><!-- .entry-content -->
				</article>
			</div>
		</div>

		<!-- <ol class="carousel-indicators">
			<li data-target="#carousel" data-slide-to="0" class="active"></i></li>
			<li data-target="#carousel" data-slide-to="1"></i></li>
		</ol> -->
	</div>
</div><!-- #primary -->

<?php get_sidebar('news-post'); ?>
<?php get_sidebar('featured-quotes'); ?>
<?php get_footer('links'); ?>

<?php get_sidebar('news-post'); ?>
<?php get_sidebar('featured-quotes'); ?>
<?php get_footer('links'); ?>

