<?php
/**
 * Custom meta box setup
 *
 * @package Rahmanda
 */

add_action( 'init', 'rahmanda_work_external_links_meta_box' );

if ( ! function_exists( 'rahmanda_work_external_links_meta_box' ) ) {
	/**
	 * Create external links custom meta box (Gutenberg) for single work.
	 */
	function rahmanda_work_external_links_meta_box() {
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

add_action( 'enqueue_block_editor_assets', 'rahmanda_enqueue_work_external_links_script' );

if ( ! function_exists( 'rahmanda_enqueue_work_external_links_script' ) ) {
	/**
	 * Enqueue work external links script
	 */
	function rahmanda_enqueue_work_external_links_script() {
		$the_theme         = wp_get_theme();
		$theme_version     = $the_theme->get( 'Version' );
		$suffix            = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
		$js_script = "/js/work-external-links{$suffix}.js";
		$js_version = $theme_version . '.' . filemtime( get_template_directory() . $js_script );
		
		wp_enqueue_script( 
			'work-external-links-js', 
			get_template_directory_uri() . $js_script, 
			array( 'wp-element', 'wp-blocks', 'wp-components', 'wp-editor', 'wp-i18n' ), 
			$js_version, 
			true 
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