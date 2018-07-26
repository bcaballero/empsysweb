<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>
		
		<div class="comment-list-wrap box-blog">
			<h3 class="wg-title">
		    	<?php comments_number(__('Comments', "kinglaw"),__('1 Comment', "kinglaw"),__('Comments <span>%</span>', 'kinglaw')); ?>
		   </h3>

			<?php kinglaw_comment_nav(); ?>

			<ol class="comment-list">
				<?php
					wp_list_comments( array(
						'avatar_size' => 100,
						'style'       => 'ol',
						'short_ping'  => true,
						'callback'   => 'kinglaw_custom_list_comment'
					) );
				?>
			</ol><!-- .comment-list -->

			<?php kinglaw_comment_nav(); ?>
		</div>

	<?php endif; // have_comments() ?>

	<?php if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'kinglaw' ); ?></p>
	<?php endif; ?>

	<?php 
		$args = array(
				'id_form'           => 'commentform',
				'id_submit'         => 'submit',
				'title_reply'       => esc_html__( 'Leave a Comment!*', 'kinglaw'),
				'title_reply_to'    => esc_html__( 'Your comment To ', 'kinglaw') . '%s',
				'cancel_reply_link' => esc_html__( 'Cancel Comment', 'kinglaw'),
				'label_submit'      => esc_html__( 'Post Comment', 'kinglaw'),
				'comment_notes_before' => '',
				'fields' => apply_filters( 'comment_form_default_fields', array(

						'author' =>
						'<div class="comment-form-author row-inputs-comment">'.'<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
						'" size="30" placeholder="'.esc_html__('Name*', 'kinglaw').'"/>
						</div>',

						'email' =>
						'<div class="comment-form-email row-inputs-comment">'.'<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
						'" size="30" placeholder="'.esc_html__('Email*', 'kinglaw').'"/></div>',
				)
				),
				'comment_field' =>  '<div class="comment-form-comment"><textarea id="comment" name="comment" cols="45" rows="8" placeholder="'.esc_html__('Comment', 'kinglaw').'" aria-required="true">' .
				'</textarea></div>',
		);
		comment_form($args); 
	?>

</div><!-- .comments-area -->
