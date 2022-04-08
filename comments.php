<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package hair-price
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
		<?php the_comments_navigation(); ?>
		<div class="comments-block">
			<?php wp_list_comments('type=comment&callback=mytheme_comment'); ?>
		</div>
	<?php endif; ?>

	<div class="block-form">
	<?php if (comments_open()) {
			$fields =  array(
				'author' => '
				<div class="row">
					<div class="col-md-6">
						<div class="item-form">
							<input id="author" class="form-comment__input" name="author" type="text" placeholder="Your Name*:" value="'.esc_attr($commenter['comment_author']).'" size="30" required>
						</div>
					</div>',
				'email'  => '
					<div class="col-md-6">
						<div class="item-form">
						<input id="email" name="email" type="email"  placeholder="Your E-mail*:" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" aria-describedby="email-notes" />
						</div>
					</div>
				</div>',
				);
			$args = array(
				'fields' => apply_filters('comment_form_default_fields', $fields),
				'comment_field' => '<div class="item-form">
									<textarea id="comment" class="form-comment__textarea" name="comment" placeholder="Comment*:" cols="45" rows="8"></textarea>
									</div>',
				'must_log_in' => '',
				'logged_in_as' => '',
				'title_reply'          => '',
				'title_reply_to'       => __( 'Leave a Reply to %s' ),
				'title_reply_before'   => '',
				'title_reply_after'    => '',
				'comment_notes_before' => '',
				'comment_notes_after' => '',
				'id_form' => 'commentform',
				'id_submit' => 'submit',
				'class_form' => 'comments__form form-comment',
				'class_submit' => 'form-comment__submit btn-default',
				'title_reply' => '',
				'title_reply_to' => 'Ответить %s',
				'submit_button' => '<button class="btn-main btn-default" type="submit">Post a comment</button>',
					
				'cancel_reply_link' => 'CANCEL',
				'label_submit' => 'POST COMMENT'
			);
			ob_start();
		    comment_form($args);

		} ?>
	</div>

</div><!-- #comments -->
