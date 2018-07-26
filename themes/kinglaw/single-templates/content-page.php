<?php
/**
 * The template used for displaying page content in page.php
 *
*
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
			<?php the_content(); ?>
	</div><!-- .entry-content -->
	<footer class="entry-meta">
			<?php edit_post_link( esc_html__( 'Edit', 'kinglaw' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->
</article><!-- #post -->
