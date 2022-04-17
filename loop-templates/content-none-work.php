<?php
/**
 * The template part for displaying a message that posts cannot be found
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Rahmanda
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<section class="no-results not-found">

	<header class="page-header">

		<h1 class="page-title"><?php esc_html_e( 'Nihil', 'understrap' ); ?></h1>

	</header><!-- .page-header -->

	<div class="page-content">

		<?php

        if ( is_home() && current_user_can( 'publish_posts' ) ) :

            $kses = array( 'a' => array( 'href' => array() ) );
            printf(
                /* translators: 1: Link to WP admin new post page. */
                '<p>' . wp_kses( __( 'Sepertinya kerjaan lagi kosong nih? <a href="%1$s">Mulai pos kerjaan di sini</a>.', 'understrap' ), $kses ) . '</p>',
                esc_url( admin_url( 'post-new.php?post_type=works' ) )
            );

        else :

			printf(
				'<p>%s<p>',
				esc_html__( 'Maaf, sepertinya kerjaan lagi kosong nih.', 'understrap' )
			);

        endif;

		?>
	</div><!-- .page-content -->

</section><!-- .no-results -->
