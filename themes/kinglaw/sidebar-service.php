<?php
/**
 * The sidebar containing the main widget area
 *
 * If no active widgets are in the sidebar, hide it completely.
 *
*
 */
?>
        
<?php if ( is_active_sidebar( 'main-sidebar' ) ) : ?>
	<div id="sidebar" class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
		<div id="widget-area" class="widget-area" role="complementary">
			<?php dynamic_sidebar( 'service-sidebar' ); ?>
		</div><!-- .widget-area -->
	</div><!-- #sidebar -->
<?php endif; ?>