<?php
/**
 * Custom functions to create a custom Gutenberg Block
 *
 *
 * @package Rahmanda
 */

add_action( 'init', 'understrap_child_popular_posts_block' );

function understrap_child_popular_posts_block()
{
	$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
	$popular_posts_block_script = "/js/popular-posts-block{$suffix}.js";

    wp_register_script( 
         'popular-posts-js', 
         get_template_directory_uri() . $popular_posts_block_script, 
         array( 'wp-blocks', 'wp-element', 'wp-block-editor', 'wp-i18n' )
    );

    register_block_type( 'understrap/popular-posts', array(
        'editor_script' => 'popular-posts-js',
        'render_callback' => 'understrap_child_popular_posts_render_callback'
    ));
}

// Optional: Moved render callback to separate function to keep logic clear
function understrap_child_popular_posts_render_callback($attributes, $content){
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
        $html .= esc_html_e( 'Tak ada postingan', 'understrap' );
    }

    return $html;
}