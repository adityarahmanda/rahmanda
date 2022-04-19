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

		<h1 class="page-title"><?php esc_html_e( 'Nihil', 'rahmanda' ); ?></h1>

	</header><!-- .page-header -->

	<div class="page-content">

		<?php
        if ( is_home() && current_user_can( 'publish_posts' ) ) :

			$kses = array( 'a' => array( 'href' => array() ) );
			printf(
				/* translators: 1: Link to WP admin new post page. */
				'<p>' . wp_kses( __( 'Sepertinya postingan lagi kosong nih? <a href="%1$s">Mulai pos di sini</a>.', 'rahmanda' ), $kses ) . '</p>',
				esc_url( admin_url( 'post-new.php' ) )
			);

		elseif ( is_search() ) :

			printf(
				'<p>%s<p>',
				esc_html__( 'Maaf, tak ada yang cocok sama kata kunci tersebut. Coba cari lagi dengan kata kunci lain.', 'rahmanda' )
			);

        else :

			printf(
				'<p>%s<p>',
				esc_html__( 'Maaf, sepertinya postingan lagi kosong nih.', 'rahmanda' )
			);

		endif;
		?>
	</div><!-- .page-content -->

</section><!-- .no-results -->
