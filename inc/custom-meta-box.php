<?php
/**
 * Custom meta box setup
 *
 * @package Rahmanda
 */

add_action( 'enqueue_block_editor_assets', 'rahmanda_enqueue_custom_metabox_script' );

if ( ! function_exists( 'rahmanda_enqueue_custom_metabox_script' ) ) {
	/**
	 * Enqueue custom metabox script
	 */
	function rahmanda_enqueue_custom_metabox_script() {
		$the_theme         = wp_get_theme();
		$theme_version     = $the_theme->get( 'Version' );
		$suffix            = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
		$js_script = "/js/meta-boxes{$suffix}.js";
		$js_version = $theme_version . '.' . filemtime( get_template_directory() . $js_script );
		
		wp_enqueue_script( 
			'meta-boxes-js', 
			get_template_directory_uri() . $js_script, 
			array( 'wp-data', 'wp-plugins', 'wp-element', 'wp-components', 'wp-edit-post', 'wp-i18n' ), 
			$js_version, 
			true 
		);
	}
}

add_action( 'init', 'rahmanda_meta_boxes_set_script_translations' );

if ( ! function_exists( 'rahmanda_meta_boxes_set_script_translations' ) ) {
	/**
	 * Make meta boxes script translatable
	 */
	function rahmanda_meta_boxes_set_script_translations() {
		wp_set_script_translations( 
			'meta-boxes-js', 
			'rahmanda',
			get_template_directory_uri() . '/languages' 
		);
	}
}

add_action( 'init', 'rahmanda_register_work_external_links_meta_box' );

if ( ! function_exists( 'rahmanda_register_work_external_links_meta_box' ) ) {
	/**
	 * Create external links custom meta box (Gutenberg) for single work.
	 */
	function rahmanda_register_work_external_links_meta_box() {
		register_post_meta(
			'work',
			'_external_links',
			[
				'single'       => true,	
				'type'         => 'array',
				'show_in_rest' => array(
					'schema' => array(
						'items' => array(
							'type'       => 'object',
							'properties' => array(
								'label'    => array(
									'type' => 'string',
								),
								'url' => array(
									'type'   => 'string',
									'format' => 'uri',
								),
								'icon' => array(
									'type'   => 'string',
								),
							),
						),
					),
				),
				'auth_callback' => function() {
					return current_user_can( 'edit_posts' );
				}
			]
		);
	}
}

add_action( 'add_meta_boxes', 'rahmanda_freebies_url_meta_box' );

if ( ! function_exists( 'rahmanda_freebies_url_meta_box' ) ) {
	/**
	 * Create url custom meta box for single freebies.
	 */
	function rahmanda_freebies_url_meta_box(){
		add_meta_box( 
			'freebies_url',
			__( 'Tautan', 'rahmanda' ), 
			'rahmanda_freebies_url_meta_box_callback',
			'freebies'
		);
	}
}

if ( ! function_exists( 'rahmanda_freebies_url_meta_box_callback' ) ) {
	/**
	 * Url custom meta box callback
	 */
	function rahmanda_freebies_url_meta_box_callback( $post ) {
		wp_nonce_field( __FILE__, '_url_nonce' );
		?>
		<p><input type="text" class="large-text" name="url" value="<?php echo esc_attr( get_post_meta( $post->ID, '_url', true ) ); ?>"></p>
		<?php
	}
}

add_action( 'save_post', 'rahmanda_freebies_url_meta_box_save' );

if ( ! function_exists( 'rahmanda_freebies_url_meta_box_save' ) ) {
	/**
	 * Save setup on url custom meta box
	 */
	function rahmanda_freebies_url_meta_box_save( $post_id ) {
		if ( isset( $_POST['url'], $_POST['_url_nonce'] ) && wp_verify_nonce( $_POST['_url_nonce'], __FILE__ ) ) {
			update_post_meta( $post_id, '_url', sanitize_url( $_POST['url'] ) );
		}
	}
}