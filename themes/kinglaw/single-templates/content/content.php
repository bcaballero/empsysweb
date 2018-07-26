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
	<div class="entry-blog entry-blog-style1">
		<header class="entry-header">
			<h2 class="entry-title">
				<a href="<?php the_permalink(); ?>">
					<?php the_title(); ?>
				</a>
			</h2>
			<div class="entry-meta entry-meta-style1">
				<?php kinglaw_post_meta1(); ?>
			</div>
		</header>
		<div class="entry-body">
			<div class="entry-thumbnail">
				<?php kinglaw_post_thumbnail(); ?>
			</div>
			<div class="entry-content">
				<?php echo wp_trim_words(strip_tags(strip_shortcodes(get_the_content())),50); ?>
			</div>
		</div>
        <footer class="entry-footer">
            <a class="read-more read-more-style1" href="<?php the_permalink(); ?>">
            	<?php esc_html_e('Read more', 'kinglaw') ?>
            </a>
        </footer>
	</div>
</article>
