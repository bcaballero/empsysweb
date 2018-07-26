<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
*
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-blog entry-blog-style2">
		<div class="row">
			<div class="col-xs-12 col-sm-5 col-md-5">
				<div class="entry-thumbnail">
					<?php kinglaw_blog3_thumbnail(); ?>
				</div>	
			</div>
			<div class="col-xs-12 col-sm-7 col-md-7">
				<div class="entry-body">
					<div class="entry-meta entry-meta-style2">
						<?php kinglaw_post_meta2(); ?>
					</div>
					<h2 class="entry-title">
						<a href="<?php the_permalink(); ?>">
							<?php the_title(); ?>
						</a>
					</h2>
					<div class="entry-content">
						<?php echo wp_trim_words(strip_tags(strip_shortcodes(get_the_content())),50); ?>
					</div>
			        <a class="read-more read-more-style2" href="<?php the_permalink(); ?>">
			        	<?php esc_html_e('Read more', 'kinglaw') ?>
			        </a>
				</div>	
			</div>
		</div>
	</div>
</article>

