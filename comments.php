<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package Rahmanda
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<?php if ( have_comments() ) : ?>

<div class="wrapper" id="wrapper-comments">

		<h2 class="comments-title mb-3">

			<?php echo esc_html__('Komentar', 'understrap') ?>

		</h2><!-- .comments-title -->

        <div class="comments" id="comments">
            <ul class="comments-inner list-unstyled">
            
            <?php
            wp_list_comments(
                array(
                    'walker' => new Understrap_Comment_Walker,
                    'avatar-size' => 50,
                    'callback' => 'understrap_list_comments_callback',
                    'short_ping' => true,
                )
            );
            ?>

            </ul>
        </div>

		<?php understrap_comment_navigation(); ?>

	<?php endif; // End of if have_comments(). ?>
</div> <!-- #wrapper-comments -->

<div class="wrapper" id="wrapper-comment-form">

    <h2 class="comment-form-title mb-3">
        <?php echo esc_html__('Tinggalkan Komentar', 'understrap'); ?>
    </h2>

    <?php comment_form(); ?>

</div> <!-- #wrapper-comment-form -->