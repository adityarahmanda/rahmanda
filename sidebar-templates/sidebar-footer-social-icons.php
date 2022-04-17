<?php
/**
 * Sidebar - The Footer Social Icons Widget Area
 *
 * @package Rahmanda
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! is_active_sidebar( 'footer-social-icons' ) ) {
	return;
}

?>

    <div class="social-icons">

        <?php dynamic_sidebar( 'footer-social-icons' ); ?>

    </div>
