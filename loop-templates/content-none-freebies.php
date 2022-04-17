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

        <p>
            <?php echo esc_html__( 'Maaf, sepertinya kerjaan lagi kosong nih.', 'understrap' ); ?>
        </p>

	</div><!-- .page-content -->

</section><!-- .no-results -->
