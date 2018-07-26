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
	<div class="entry-blog">
		<header class="entry-header">
			<div class="entry-video">
				<?php kinglaw_post_video(); ?>
			</div>
		</header>
		<div class="entry-body">
			<div class="entry-meta">
				<?php kinglaw_post_detail(); ?>
			</div>
			<h1 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
			<div class="entry-content">
				<?php echo wp_trim_words(strip_tags(strip_shortcodes(get_the_content())),50); ?>...

				<?php
				wp_link_pages( array(
					'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'kinglaw' ) . '</span>',
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
				) );
				?>

			</div>
		</div>
		<footer class="entry-footer">
			<a class="read-more" href="<?php the_permalink(); ?>"><?php esc_html_e('Read More', 'kinglaw') ?></a>
		</footer>
	</div>
</article>

