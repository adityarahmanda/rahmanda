<?php
/**
 * Sidebar - The Single Footer Widget Area
 *
 * @package Rahmanda
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! is_active_sidebar( 'single-footer' ) ) {
	return;
}

?>

<footer class="entry-footer py-3" id="single-footer">

    <?php dynamic_sidebar( 'single-footer' ); ?>

</footer><!-- .entry-footer -->
