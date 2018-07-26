<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * 
 */
global $opt_theme_options;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-blog">
		<header class="entry-header">
			<?php kinglaw_post_audio(); ?>
		</header>
		<div class="entry-body">
			<div class="entry-meta">
				<?php kinglaw_post_detail(); ?>
			</div>
			
			<div class="entry-content">
				<?php the_content(); ?>

				<?php
				wp_link_pages( array(
					'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'kinglaw' ) . '</span>',
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
				) );
				?>
				
				<ul class="entry-social-shared clearfix">
        			<li class="social-label"><?php esc_html_e('Share This Article : ', 'kinglaw'); ?></li>
        			<?php kinglaw_get_socials_share(); ?>
				</ul>
				
			</div>
		</div>
	</div>
	
	<?php if(isset($opt_theme_options['post_nav']) && $opt_theme_options['post_nav'] == 'show') { ?>
		<div class="post-previous-next box-blog">
			<?php kinglaw_post_nav(); ?>
		</div>
	<?php } ?>
	
	<?php if(isset($opt_theme_options['post_author']) && $opt_theme_options['post_author'] == 'show') { ?>
		<div class="entry-author box-blog">
			<h3 class="wg-title">
				<?php esc_html_e('About Author', 'kinglaw'); ?>
				<span class="line1"></span>
                <span class="line2"></span>
                <span class="line3"></span>
			</h3> 
			<div class="blog-admin-post clearfix">
				<div class="admin-avt">
						<?php echo get_avatar( get_the_author_meta( 'ID' ), 'full' ); ?>
					</div>
				<div class="admin-info">
					<div class="admin-des">
						<?php the_author_meta( 'description' ); ?>
						<?php kinglaw_get_user_social(); ?>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>
	
	<div class="related-post box-blog">
		<?php kinglaw_related_post(); ?>
	</div>

</article><!-- #post-## -->
