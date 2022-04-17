<?php
add_action( 'init', 'understrap_work_external_links_meta_box' );

function understrap_work_external_links_meta_box() {
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

	add_action( 'enqueue_block_editor_assets', function() {
		wp_enqueue_script(
			'work-external-links-js',
			get_template_directory_uri() . '/js/work-external-links.min.js',
			[ 'wp-element', 'wp-blocks', 'wp-components', 'wp-editor', 'wp-i18n' ],
			'0.1.0',
			true
		);
	} );
}

add_action( 'add_meta_boxes', 'understrap_freebies_url_meta_box' );

function understrap_freebies_url_meta_box(){
	add_meta_box( 
		'freebies_url',
		__( 'Tautan', 'understrap' ), 
		'understrap_freebies_url_meta_box_callback',
		'freebies'
	);
}

function understrap_freebies_url_meta_box_callback( $post ) {
	wp_nonce_field( __FILE__, '_url_nonce' );
	?>
	<p><input type="text" class="large-text" name="url" value="<?php echo esc_attr( get_post_meta( $post->ID, '_url', true ) ); ?>"></p>
	<?php
}

add_action( 'save_post', 'understrap_freebies_url_meta_box_save' );

function understrap_freebies_url_meta_box_save( $post_id ) {
	if ( isset( $_POST['url'], $_POST['_url_nonce'] ) && wp_verify_nonce( $_POST['_url_nonce'], __FILE__ ) ) {
		update_post_meta( $post_id, '_url', sanitize_url( $_POST['url'] ) );
	}
}