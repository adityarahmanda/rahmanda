<?php
/**
 * Rahmanda Theme Customizer
 *
 * @package Rahmanda
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
if ( ! function_exists( 'rahmanda_customize_register' ) ) {
	/**
	 * Register basic customizer support.
	 *
	 * @param object $wp_customize Customizer reference.
	 */
	function rahmanda_customize_register( $wp_customize ) {
		$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
		$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	}
}
add_action( 'customize_register', 'rahmanda_customize_register' );

if ( ! function_exists( 'rahmanda_theme_customize_register' ) ) {
	/**
	 * Register individual settings through customizer's API.
	 *
	 * @param WP_Customize_Manager $wp_customize Customizer reference.
	 */
	function rahmanda_theme_customize_register( $wp_customize ) {

		// Theme layout settings.
		$wp_customize->add_section(
			'rahmanda_theme_layout_options',
			array(
				'title'       => __( 'Pengaturan Tema', 'rahmanda' ),
				'capability'  => 'edit_theme_options',
				'description' => __( 'Ubah pengaturan baku tema', 'rahmanda' ),
				'priority'    => apply_filters( 'rahmanda_theme_layout_options_priority', 160 ),
			)
		);

		/**
		 * Select sanitization function
		 *
		 * @param string               $input   Slug to sanitize.
		 * @param WP_Customize_Setting $setting Setting instance.
		 * @return string Sanitized slug if it is a valid choice; otherwise, the setting default.
		 */
		function rahmanda_theme_slug_sanitize_select( $input, $setting ) {

			// Ensure input is a slug (lowercase alphanumeric characters, dashes and underscores are allowed only).
			$input = sanitize_key( $input );

			// Get the list of possible select options.
			$choices = $setting->manager->get_control( $setting->id )->choices;

			// If the input is a valid key, return it; otherwise, return the default.
			return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

		}

		$wp_customize->add_setting(
			'rahmanda_front_page_hide_navbar_brand',
			array(
				'default'           => true,
				'type'              => 'theme_mod',
				'sanitize_callback' => 'rahmanda_sanitize_checkbox',
				'capability'        => 'edit_theme_options',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'rahmanda_front_page_hide_navbar_brand',
				array(
					'label'       => __( 'Sembunyikan Navbar Brand - Front Page', 'rahmanda' ),
					'description' => __( 'Menyembunyikan navbar brand di halaman depan', 'rahmanda' ),
					'section'     => 'rahmanda_theme_layout_options',
					'settings'    => 'rahmanda_front_page_hide_navbar_brand',
					'type'        => 'checkbox',
					'priority'    => 20,
				)
			)
		);

		$wp_customize->add_setting(
			'rahmanda_front_page_enable_featured_work',
			array(
				'default'           => true,
				'type'              => 'theme_mod',
				'sanitize_callback' => 'rahmanda_sanitize_checkbox',
				'capability'        => 'edit_theme_options',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'rahmanda_front_page_enable_featured_work',
				array(
					'label'       => __( 'Kerjaan Unggulan - Front Page', 'rahmanda' ),
					'description' => __( 'Menampilkan kerjaan unggulan di atas postingan di halaman depan', 'rahmanda' ),
					'section'     => 'rahmanda_theme_layout_options',
					'settings'    => 'rahmanda_front_page_enable_featured_work',
					'type'        => 'checkbox',
					'priority'    => 20,
				)
			)
		);

		$wp_customize->add_setting(
			'rahmanda_front_page_enable_posts',
			array(
				'default'           => true,
				'type'              => 'theme_mod',
				'sanitize_callback' => 'rahmanda_sanitize_checkbox',
				'capability'        => 'edit_theme_options',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'rahmanda_front_page_enable_posts',
				array(
					'label'       => __( 'Postingan - Front Page', 'rahmanda' ),
					'description' => __( 'Menampilkan postingan di halaman depan', 'rahmanda' ),
					'section'     => 'rahmanda_theme_layout_options',
					'settings'    => 'rahmanda_front_page_enable_posts',
					'type'        => 'checkbox',
					'priority'    => 20,
				)
			)
		);

		$wp_customize->add_setting(
			'rahmanda_site_info_override',
			array(
				'default'           => '',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'wp_kses_post',
				'capability'        => 'edit_theme_options',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'rahmanda_site_info_override',
				array(
					'label'       => __( 'Info Website - Footer', 'rahmanda' ),
					'description' => __( 'Mengganti tulisan informasi website di bagian footer website ini', 'rahmanda' ),
					'section'     => 'rahmanda_theme_layout_options',
					'settings'    => 'rahmanda_site_info_override',
					'type'        => 'textarea',
					'priority'    => 20,
				)
			)
		);

	}
} // End of if function_exists( 'rahmanda_theme_customize_register' ).
add_action( 'customize_register', 'rahmanda_theme_customize_register' );

function rahmanda_sanitize_checkbox( $checked ) {
	// Boolean check.
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
if ( ! function_exists( 'rahmanda_customize_preview_js' ) ) {
	/**
	 * Setup JS integration for live previewing.
	 */
	function rahmanda_customize_preview_js() {
		wp_enqueue_script(
			'rahmanda_customizer',
			get_template_directory_uri() . '/js/customizer.js',
			array( 'customize-preview' ),
			'20130508',
			true
		);
	}
}
add_action( 'customize_preview_init', 'rahmanda_customize_preview_js' );

/**
 * Loads javascript for conditionally showing customizer controls.
 */
if ( ! function_exists( 'rahmanda_customize_controls_js' ) ) {
	/**
	 * Setup JS integration for live previewing.
	 */
	function rahmanda_customize_controls_js() {
		wp_enqueue_script(
			'rahmanda_customizer',
			get_template_directory_uri() . '/js/customizer-controls.js',
			array( 'customize-preview' ),
			'20130508',
			true
		);
	}
}
add_action( 'customize_controls_enqueue_scripts', 'rahmanda_customize_controls_js' );