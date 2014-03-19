<?php
/**
 * The template for displaying search forms inRipple
 *
 * @packageRipple
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="input-group">
		<span class="screen-reader-text"><?php _ex( 'Search for:', 'label', 'ripple' ); ?></span>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'ripple' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" title="<?php _ex( 'Search for:', 'label', 'ripple' ); ?>">
		<button type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'ripple' ); ?>">
			<i class="fa fa-search fa-lg"></i>
		</button>
	</div>
</form>