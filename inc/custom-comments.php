<?php
/**
 * Comment layout
 *
 * @package Rahmanda
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'understrap_list_comments_callback' ) ) {
    function understrap_list_comments_callback($comment, $args, $depth) { 
    ?>
        <li <?php comment_class('mb-3'); ?> id="li-comment-<?php comment_ID() ?>">
            <div class="wrapper-comment-inner">
                <div class="comment-avatar">
                    <?php echo get_avatar($comment, $args['avatar-size'], $default='https://secure.gravatar.com/avatar/210f03eb7e0d6e9a2ad257db01e79be2?s=50&d=mm&r=g' ); ?>
                </div>
                
                <div class="comment-content">
                    <?php if ($comment->comment_approved == '0') : ?>
                        <em>
                            <?php esc_html__('Komentar akan muncul setelah disetujui.', 'understrap') ?>
                        </em>
                        <br />
                    <?php endif; ?>

                    <div class="comment-name">
                        <strong><?php echo get_comment_author() ?></strong>
                    </div>

                    <div class="comment-text"> 
                        <?php echo get_comment_text() ?>
                    </div>

                    <div class="comment-metas">
                        <span class="comment-date me-1">
                            <?php echo get_comment_date('F Y'); ?>
                        </span>
                        
                        <span class="comment-reply">
                            <?php 
                                comment_reply_link(
                                    array_merge( 
                                        $args, 
                                        array(
                                            'reply_text'    => esc_html__( 'Balas', 'understrap' ),
                                            /* translators: Comment reply button text. %s: Comment author name. */
                                            'reply_to_text' => esc_html__( 'Balas ke %s', 'understrap'  ),
                                            'login_text'    => esc_html__( 'Balas', 'understrap'  ),
                                            'depth'         => $depth, 
                                            'max_depth'     => $args['max_depth']
                                        )
                                    )
                                ) 
                            ?>
                        </span>
                    </div>
                </div>
            </div>
        </li>
    <?php 
    }
} // End of if function_exists( 'understrap_list_comments_callback' ).

// filter default comment form fields.
add_filter('comment_form_default_fields', 'understrap_filter_default_comment_field');

if ( ! function_exists( 'understrap_filter_default_comment_field' ) ) {
	/**
	 * Filter WP's comment form default fields.
	 *
	 * @param array $fields {
	 *     Default comment fields.
	 *
	 *     @type string $author  Comment author field HTML.
	 *     @type string $email   Comment author email field HTML.
	 *     @type string $url     Comment author URL field HTML.
	 *     @type string $cookies Comment cookie opt-in field HTML.
	 * }
	 *
	 * @return array
	 */
    function understrap_filter_default_comment_field( $fields ) {
        $fields = wp_parse_args( $fields );
        
        unset( $fields['url'] );

        $req = get_option( 'require_name_email' ) ? 'aria-required="true" required' : '';

        $author = '<div class="comment-form-author col-md-6 form-name mb-3">'
            . '<input id="author" name="author" type="text" placeholder="' . sprintf( '%1$s', esc_html__('Nama', 'understrap') ) .'" maxlength="245" class="form-control" ' . $req . '>'
            . '</div>';

        $email = '<div class="comment-form-email col-md-6 mb-3">'
            . '<input id="email" name="email" type="text" placeholder="' . sprintf( '%1$s', esc_html__('Email', 'understrap') ) .'" maxlength="100" class="form-control" ' . $req . '>'
            . '</div>';

        $cookies = '<div class="comment-form-check form-check mb-3">'
            . '<input id="wp-comment-cookies" name="wp-comment-cookies-consent" type="checkbox" class="form-check-input">'
            . '<label for="wp-comment-cookies">' . sprintf( '%1$s', esc_html__('Simpan nama dan email saya pada peramban ini untuk komentar saya berikutnya.', 'understrap') ) . '</label>'
            . '</div>';

        $fields = array_merge(
            $fields,
            array(
                'author' => $author,
                'email' => $email,
                'cookies' => $cookies,
            )
        );

        return $fields;
    }
} // End of if function_exists( 'understrap_filter_default_comment_field' ).

// Edit default WP's comment form.
add_filter('comment_form_defaults', 'understrap_comment_form_defaults');

if ( ! function_exists( 'understrap_comment_form_defaults' ) ) {
	/**
	 * Outputs a complete commenting form for use within a template.* 
	 *
	 *
     * @param array       $args
     * @param int|WP_Post $post_id Post ID or WP_Post object to generate the form for. Default current post.
     * 
	 *
	 * @return array
	 */
    function understrap_comment_form_defaults( $args, $post_id = null ) {
        if ( null === $post_id )
            $post_id = get_the_ID();
        else
            $id = $post_id;

        $commenter = wp_get_current_commenter();
        $user = wp_get_current_user();
        $user_identity = $user->exists() ? $user->display_name : '';

        $comment_field = '<div class="comment-form-textarea mb-3">'
            . '<textarea id="comment" name="comment" placeholder="' . sprintf( '%1$s', esc_html__('Tuliskan komentarmu di sini', 'understrap') ) . '" maxlength="65525" class="form-control" aria-required="true" required></textarea>'
            . '</div>';

        $must_log_in = '<div class="must-log-in mb-3">' . 
            sprintf( 
                __( 'Kamu harus <a href="%1$s">masuk</a> terlebih dahulu untuk berkomentar.', 'understrap' ), 
                esc_url( wp_login_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) )
            ) 
            . '</div>';
            
        $comments_notes_after = '<div class="logged-as-in mb-3">' .
            sprintf(
                '%1$s <a href="%2$s">%3$s</a>',
                sprintf( esc_html__('Bukan %1$s?', 'understrap'), $user_identity ),
                esc_url( wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ),
                esc_html__( 'Keluar', 'understrap' )
            )
            . '</div>';

        $display_reply_to = isset($_GET['replytocom']) ? '' : 'style="display: none"'; 

        $defaults = array(
            'must_log_in'          => $must_log_in,
            'logged_in_as'         => '',
            'comment_field'        => $comment_field,
            'comment_notes_before' => '',
            'comment_notes_after'  => is_user_logged_in() ? $comments_notes_after : '',
            'title_reply_before'   => '<div class="comment-form-reply mb-3" ' . $display_reply_to . '>',
            'title_reply_after'    => '</div>',
            'title_reply'          => '',
            'title_reply_to'       => esc_html__('Balas %s', 'understrap') . ' - ',
            'cancel_reply_before'  => '<span class="comment-cancel-reply">',
            'cancel_reply_link'    => esc_html__('Batal', 'understrap'),
            'cancel_reply_after'   => '</span>',
            'submit_field'         => '<div class="comment-form-submit">%1$s %2$s</div>',
            'submit_button'        => '<input name="%1$s" type="submit" id="%2$s" class="btn btn-primary text-white %3$s" value="%4$s" />',
        );

        $defaults = wp_parse_args( $defaults, $args );

        return $defaults;
    } 
} // End of if function_exists( 'understrap_comment_form_defaults' ).

// Add note if comments are closed.
add_action( 'comment_form_comments_closed', 'understrap_comment_form_comments_closed' );

if ( ! function_exists( 'understrap_comment_form_comments_closed' ) ) {
	/**
	 * Displays a note that comments are closed if comments are closed and there are comments.
	 */
	function understrap_comment_form_comments_closed() {
		if ( get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) {
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'understrap' ); ?></p>
			<?php
		}
	}
} // End of if function_exists( 'understrap_comment_form_comments_closed' ).