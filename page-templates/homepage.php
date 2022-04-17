<?php
/**
 * Template Name: Homepage Template
 *
 * Template for homepage.
 *
 * @package Rahmanda
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

if( is_front_page() ) {
	get_template_part( 'sidebar-templates/sidebar', 'herocanvas' );
	get_template_part( 'sidebar-templates/sidebar', 'aboutcanvas' );

	get_template_part( 'global-templates/featured-work' );
	get_template_part( 'global-templates/homepage-index' );
}

if ( have_posts() ) {
	// Start the Loop.
	while ( have_posts() ) {
		the_post();

		/*
		* Include the Post-Format-specific template for the content.
		* If you want to override this in a child theme, then include a file
		* called content-___.php (where ___ is the Post Format name) and that will be used instead.
		*/
		
		get_template_part( 'loop-templates/content', 'homepage' );
	}
} else {
	get_template_part( 'loop-templates/content', 'none' );
}

get_footer();