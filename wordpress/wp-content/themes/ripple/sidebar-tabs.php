<?php
/**
 * The Front Page Sidebar.
 *
 * @package Space-Rocket
 */
?>
	<div id="secondary" class="user-tabs widget-area" role="complementary">
		<div class="tabs-navigation">
			<div class="wrapper">
				<ul id="tab" class="list-unstyled">
					<li class="active"><a href="#gateways" data-toggle="tab">Gateways<span class="caret"></span></a></li>
					<li class=""><a href="#merchants" data-toggle="tab">Merchants<span class="caret"></span></a></li>
					<li class=""><a href="#marketmakers" data-toggle="tab">Traders<span class="caret"></span></a></li>
				</ul>
			</div><!-- .wrapper -->
		</div><!-- .nav-tabs -->

		<div id="tabContent" class="tab-content">
			<?php include (TEMPLATEPATH . '/inc/tabs/gateways.php' ); ?>
			<?php include (TEMPLATEPATH . '/inc/tabs/merchants.php' ); ?>
			<?php include (TEMPLATEPATH . '/inc/tabs/marketmakers.php' ); ?>
	  	</div><!-- .tab-content -->	
	</div><!-- #secondary -->


