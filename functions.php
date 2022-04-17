<?php
/**
 * Rahmanda functions and definitions
 *
 * @package Rahmanda
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Rahmanda's includes directory.
$rahmanda_inc_dir = 'inc';

// Array of files to include.
$rahmanda_includes = array(
	'/theme-settings.php',                  	// Initialize theme default settings.
	'/setup.php',                           	// Theme setup and custom theme supports.
	'/widgets.php',                         	// Register widget area.
	'/enqueue.php',                         	// Enqueue scripts and styles.
	'/template-tags.php',                   	// Custom template tags for this theme.
	'/pagination.php',                      	// Custom pagination for this theme.
	'/hooks.php',                           	// Custom hooks.
	'/extras.php',                          	// Custom functions that act independently of the theme templates.
	'/customizer.php',                      	// Customizer additions.
	'/custom-comments.php',                 	// Custom Comments file.
	'/custom-post-type.php',                  	// Custom post type for this theme.
	'/custom-meta-box.php',                		// Custom meta box for this theme.
	'/custom-taxonomies.php',              		// Custom taxonomies for this theme.
	'/gutenberg.php',                  			// Custom Gutenberg block.
	'/class-rahmanda-comment-walker.php',    	// Load custom WordPress comment walker.
	'/class-wp-bootstrap-navwalker.php',    	// Load custom WordPress nav walker. Trying to get deeper navigation? Check out: https://github.com/rahmanda/rahmanda/issues/567.
	'/editor.php',                          	// Load Editor functions.
	'/block-editor.php',                    	// Load Block Editor functions.
	'/deprecated.php',                      	// Load deprecated functions.
);

// Load Jetpack compatibility file if Jetpack is activiated.
if ( class_exists( 'Jetpack' ) ) {
	$rahmanda_includes[] = '/jetpack.php';
}

// Include files.
foreach ( $rahmanda_includes as $file ) {
	require_once get_theme_file_path( $rahmanda_inc_dir . $file );
}