<?php
/**
 * rahmanda enqueue scripts
 *
 * @package Rahmanda
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'rahmanda_scripts' ) ) {
	/**
	 * Load theme's JavaScript and CSS sources.
	 */
	function rahmanda_scripts() {
		// Get the theme data.
		$the_theme         = wp_get_theme();
		$theme_version     = $the_theme->get( 'Version' );
		$suffix            = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

		// Grab asset urls.
		$theme_styles  = "/css/theme{$suffix}.css";
		$theme_scripts = "/js/theme{$suffix}.js";

		$css_version = $theme_version . '.' . filemtime( get_template_directory() . $theme_styles );
		wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;700;900&display=swap', false );
		wp_enqueue_style( 'fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css', false );
		wp_enqueue_style( 'rahmanda-styles', get_template_directory_uri() . $theme_styles, array(), $css_version );
		
		wp_enqueue_script( 'jquery' );

		$js_version = $theme_version . '.' . filemtime( get_template_directory() . $theme_scripts );
		wp_enqueue_script( 'rahmanda-scripts', get_template_directory_uri() . $theme_scripts, array(), $js_version, true );
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
} // End of if function_exists( 'rahmanda_scripts' ).

add_action( 'wp_enqueue_scripts', 'rahmanda_scripts' );
