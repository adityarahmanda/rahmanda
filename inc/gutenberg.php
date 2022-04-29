<?php
/**
 * Custom functions to create a custom Gutenberg Block
 *
 *
 * @package Rahmanda
 */

add_action( 'init', 'rahmanda_register_blocks' );

if ( ! function_exists( 'rahmanda_register_blocks' ) ) {

	/**
	 * Register custom blocks
	 */
	function rahmanda_register_blocks() {
		register_block_type( 'rahmanda/applause-button', array(
			'api_version' => 2,
			'editor_script' 	=> 'rahmanda-blocks-js',
			'attributes'      	=> array(
				'align'		=> array(
					'type' 		=> 'string',
					'default' 	=> 'center'
				),
				'size'		=> array( 
					'type' 		=> 'int',
					'default' 	=> 36, 
				),
				'color'		=> array( 
					'type' 		=> 'string', 
					'default' 	=> '#929EC9' 
				),
				'multiclap'	=> array( 
					'type' 		=> 'boolean', 
					'default' 	=> true
				),
			),
			'render_callback'	=>	'rahmanda_applause_button_block_render_callback'
		));

		register_block_type( 'rahmanda/popular-posts', array(
			'api_version' 		=> 2,
			'editor_script' 	=> 'rahmanda-blocks-js',
			'attributes'      	=> array(
				'numOfPosts' => array(
					'type' 		=> 'int',
					'default' 	=> 4,
				)
			),
			'render_callback' => 'rahmanda_popular_posts_block_render_callback'
		));

		register_block_type( 'rahmanda/ellipsis-separator', array(
			'api_version' 		=> 2,
			'editor_script' 	=> 'rahmanda-blocks-js',
		));
	}
}

add_action( 'enqueue_block_editor_assets', 'rahmanda_enqueue_blocks_script' );

if ( ! function_exists( 'rahmanda_enqueue_blocks_script' ) ) {
	/**
	 * Enqueue custom blocks script
	 */
	function rahmanda_enqueue_blocks_script() {
		$the_theme         = wp_get_theme();
		$theme_version     = $the_theme->get( 'Version' );
		$suffix            = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
		
		$js_script = "/js/blocks{$suffix}.js";
		$js_version = $theme_version . '.' . filemtime( get_template_directory() . $js_script );

		wp_enqueue_script( 
			'rahmanda-blocks-js', 
			get_template_directory_uri() . $js_script, 
			array( 'wp-blocks', 'wp-block-editor', 'wp-components', 'wp-i18n' ), 
			$js_version, 
			true 
		);
	}
}

add_action( 'init', 'rahmanda_blocks_set_script_translations' );

if ( ! function_exists( 'rahmanda_blocks_set_script_translations' ) ) {
	/**
	 * Make blocks script translatable
	 */
	function rahmanda_blocks_set_script_translations() {
		wp_set_script_translations( 
			'rahmanda-blocks-js', 
			'rahmanda',
			get_template_directory_uri() . '/languages' 
		);
	}
}

if ( ! function_exists( 'rahmanda_applause_button_block_render_callback' ) ) {
	function rahmanda_applause_button_block_render_callback($attributes, $content) {
		$aligmentClass = isset($attributes['align']) ? 'd-flex justify-content-' . $attributes['align'] : 'd-flex justify-content-center';
		$size = isset($attributes['size']) ? $attributes['size'] . 'px' : '36px';
		$color = isset($attributes['color']) ? $attributes['color'] : '#929EC9';
		$multiclap = isset($attributes['multiclap']) ? ($attributes['multiclap'] ? 'true' : 'false') : 'true';
		$url = is_single() || is_page() ? get_permalink( get_the_ID() ) : '';

		$classesArray = array('wp-block-applause-button', $aligmentClass);
		if(isset($attributes['className'])) {
			array_push($classesArray, $attributes['className']);
		}
		$elementClasses = join(" ", $classesArray);

		return '<div class="'. $elementClasses .'">'
			.'<applause-button size="'. $size .'" color="'. $color .'" multiclap="'. $multiclap .'" url="'. $url .'" />'
		.'</div>';
	}
}

if ( ! function_exists( 'rahmanda_popular_posts_block_render_callback' ) ) {
	function rahmanda_popular_posts_block_render_callback($attributes, $content){
		$numOfPosts = $attributes['numOfPosts'] ? $attributes['numOfPosts'] : 4;

		$args = array(
			"posts_per_page"        => $numOfPosts,
			'orderby'               => 'comment_count',
			'order'                 => 'DESC'
		);

		$classesArray = array('wp-block-popular-posts-list');
		if(isset($attributes['className'])) {
			array_push($classesArray, $attributes['className']);
		}
		$elementClasses = join(" ", $classesArray);
		
		$queryResult = new WP_Query($args);
		if($queryResult -> have_posts())
		{
			$html .= '<ul class="' . $elementClasses .'">';

			while($queryResult ->have_posts())
			{	
				$queryResult ->the_post();

				$html .= '<li class="popular-posts-list-item">'
				. '<a href="' . get_permalink() . '" class="popular-posts-title">' . get_the_title() . '</a>'
				. '</li>';
			}

			$html .= '</ul>';
		} else {
			$html .= '<span class="'. $elementClasses .'">'.esc_html_e( 'Tak ada postingan', 'rahmanda' ).'</span>';
		}

		return $html;
	}
}