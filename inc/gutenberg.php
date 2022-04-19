<?php
/**
 * Custom functions to create a custom Gutenberg Block
 *
 *
 * @package Rahmanda
 */

add_action( 'init', 'rahmanda_popular_posts_block' );

function rahmanda_popular_posts_block()
{
    register_block_type( 'rahmanda/popular-posts', array(
        'editor_script' => 'popular-posts-js',
        'render_callback' => 'rahmanda_child_popular_posts_render_callback'
    ));
}


add_action( 'enqueue_block_editor_assets', 'rahmanda_enqueue_popular_posts_block_script' );

if ( ! function_exists( 'rahmanda_enqueue_popular_posts_block_script' ) ) {
	/**
	 * Enqueue popular post block script
	 */
	function rahmanda_enqueue_popular_posts_block_script() {
		$the_theme         = wp_get_theme();
		$theme_version     = $the_theme->get( 'Version' );
		$suffix            = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
		$js_script = "/js/popular-posts-block{$suffix}.js";
		$js_version = $theme_version . '.' . filemtime( get_template_directory() . $js_script );
		
		wp_enqueue_script( 
			'popular-posts-js', 
			get_template_directory_uri() . $js_script, 
			array( 'wp-element', 'wp-blocks', 'wp-block-editor', 'wp-i18n' ), 
			$js_version, 
			true 
		);
	}
}

// Optional: Moved render callback to separate function to keep logic clear
function rahmanda_child_popular_posts_render_callback($attributes, $content){
    $numOfPosts = $attributes['numOfPosts'] ? $attributes['numOfPosts'] : 4;

  	$args = array(
  		"posts_per_page"        => $numOfPosts,
  		'orderby'               => 'comment_count',
  		'order'                 => 'DESC'
  	);

    $html = '';
    $queryResult = new WP_Query($args);
    if($queryResult -> have_posts())
    {
        $html .= '<ul class="wp-block-popular-posts-list ' . $attributes['className'] .'">';
        
        while($queryResult ->have_posts())
        {	
            $queryResult ->the_post();

            $html .= '<li class="popular-posts-list-item">'
            . '<a href="' . get_permalink() . '" class="popular-posts-title">' . get_the_title() . '</a>'
            . '</li>';
        }

	    $html .= '</ul>';
    } else {
        $html .= esc_html_e( 'Tak ada postingan', 'rahmanda' );
    }

    return $html;
}