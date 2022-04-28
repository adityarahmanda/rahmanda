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

dynamic_sidebar( 'footer-social-icons' );