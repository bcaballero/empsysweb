<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * 
 */
global $opt_meta_options;
$svmeta = kinglaw_get_post_meta();
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="single-service sg-service-layout1">
		<div class="single-service-main">
			<div id="single-service-image-one" class="single-service-image">
				<?php kinglaw_post_thumbnail_single(); ?>
                <span class="maskoverlay"></span>
                <div class="cms-svg">
		            <?php if($svmeta['service_icon_post_hover']) {?>
		    		  <img src="<?php echo esc_url($svmeta['service_icon_post_hover']['url']); ?>" alt="<?php echo esc_attr($title); ?>" />
		            <?php } ?>
                </div>
			</div>
			<div class="single-service-holder">
				<div class="single-service-content ">
					<?php the_content(); ?>
				</div>
			</div>
		</div>
	</div>
</article><!-- #post-## -->