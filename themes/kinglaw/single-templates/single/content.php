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
		<div class="entry-meta entry-meta-style1">
			<?php kinglaw_post_meta1(); ?>
		</div>
		<header class="entry-header">
			<?php kinglaw_post_thumbnail_single(); ?>
		</header>
		<div class="entry-body">
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
		</div>
		<div class="post-like">
			<?php post_favorite(); ?>
		</div>
		<ul class="entry-social-shared clearfix">
			<li class="social-label"><?php esc_html_e('Share :', 'kinglaw'); ?></li>
			<?php kinglaw_get_socials_share(); ?>
		</ul>
	</div>
	<?php if(isset($opt_theme_options['post_author']) && $opt_theme_options['post_author'] == 'show') { ?>
		<div class="entry-author box-blog"> 
			<div class="blog-admin-post clearfix">
				<div class="admin-avt">
					<?php echo get_avatar( get_the_author_meta( 'ID' ), 'full' ); ?>
				</div>
				<div class="admin-info">
					<h3 class="wg-title">
						<?php esc_html_e('About Author', 'kinglaw'); ?>
					</h3>
					<div class="admin-des">
						<?php the_author_meta( 'description' ); ?>
						<?php kinglaw_get_user_social(); ?>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>
	<div class="hidden">
		<?php echo get_the_tag_list();?>
	</div>
	<?php kinglaw_post_comment();;?>
</article><!-- #post-## -->
