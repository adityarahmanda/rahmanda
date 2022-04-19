<?php
/**
 * Declaring widgets
 *
 * @package Rahmanda
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Add filter to the parameters passed to a widget's display callback.
 * The filter is evaluated on both the front and the back end!
 *
 * @link https://developer.wordpress.org/reference/hooks/dynamic_sidebar_params/
 */
add_filter( 'dynamic_sidebar_params', 'rahmanda_widget_classes' );

if ( ! function_exists( 'rahmanda_widget_classes' ) ) {

	/**
	 * Count number of visible widgets in a sidebar and add classes to widgets accordingly,
	 * so widgets can be displayed one, two, three or four per row.
	 *
	 * @global array $sidebars_widgets
	 *
	 * @param array $params {
	 *     Parameters passed to a widget’s display callback.
	 *
	 *     @type array $args  {
	 *         An array of widget display arguments.
	 *
	 *         @type string $name          Name of the sidebar the widget is assigned to.
	 *         @type string $id            ID of the sidebar the widget is assigned to.
	 *         @type string $description   The sidebar description.
	 *         @type string $class         CSS class applied to the sidebar container.
	 *         @type string $before_widget HTML markup to prepend to each widget in the sidebar.
	 *         @type string $after_widget  HTML markup to append to each widget in the sidebar.
	 *         @type string $before_title  HTML markup to prepend to the widget title when displayed.
	 *         @type string $after_title   HTML markup to append to the widget title when displayed.
	 *         @type string $widget_id     ID of the widget.
	 *         @type string $widget_name   Name of the widget.
	 *     }
	 *     @type array $widget_args {
	 *         An array of multi-widget arguments.
	 *
	 *         @type int $number Number increment used for multiples of the same widget.
	 *     }
	 * }
	 * @return array $params
	 */
	function rahmanda_widget_classes( $params ) {

		global $sidebars_widgets;

		/*
		 * When the corresponding filter is evaluated on the front end
		 * this takes into account that there might have been made other changes.
		 */
		$sidebars_widgets_count = apply_filters( 'sidebars_widgets', $sidebars_widgets );

		// Only apply changes if sidebar ID is set and the widget's classes depend on the number of widgets in the sidebar.
		if ( isset( $params[0]['id'] ) && strpos( $params[0]['before_widget'], 'dynamic-classes' ) ) {
			$sidebar_id   = $params[0]['id'];
			$widget_count = count( $sidebars_widgets_count[ $sidebar_id ] );

			$widget_classes = 'widget-count-' . $widget_count;
			if ( 0 === $widget_count % 4 || $widget_count > 6 ) {
				// Four widgets per row if there are exactly four or more than six widgets.
				$widget_classes .= ' col-md-3';
			} elseif ( 6 === $widget_count ) {
				// If exactly six widgets are published.
				$widget_classes .= ' col-md-2';
			} elseif ( $widget_count >= 3 ) {
				// Three widgets per row if there's three or more widgets.
				$widget_classes .= ' col-md-4';
			} elseif ( 2 === $widget_count ) {
				// If two widgets are published.
				$widget_classes .= ' col-md-6';
			} elseif ( 1 === $widget_count ) {
				// If just on widget is active.
				$widget_classes .= ' col-md-12';
			}

			// Replace the placeholder class 'dynamic-classes' with the classes stored in $widget_classes.
			$params[0]['before_widget'] = str_replace( 'dynamic-classes', $widget_classes, $params[0]['before_widget'] );
		}

		return $params;

	}
} // End of if function_exists( 'rahmanda_widget_classes' ).

add_action( 'widgets_init', 'rahmanda_widgets_init' );

if ( ! function_exists( 'rahmanda_widgets_init' ) ) {
	/**
	 * Initializes themes widgets.
	 */
	function rahmanda_widgets_init() {
		register_sidebar(
			array(
				'name'          => __( 'Hero Canvas', 'rahmanda' ),
				'id'            => 'herocanvas',
				'description'   => __( 'Full size canvas hero area for Bootstrap and other custom HTML markup', 'rahmanda' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '',
				'after_title'   => '',
			)
		);

		register_sidebar(
			array(
				'name'          => __( 'About Canvas', 'rahmanda' ),
				'id'            => 'aboutcanvas',
				'description'   => __( 'Full size canvas about area for Bootstrap and other custom HTML markup', 'rahmanda' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '',
				'after_title'   => '',
			)
		);

		register_sidebar(
			array(
				'name'          => __( 'Right Sidebar', 'rahmanda' ),
				'id'            => 'right-sidebar',
				'description'   => __( 'Right sidebar widget area', 'rahmanda' ),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			)
		);

		register_sidebar(
			array(
				'name'          => __( 'Single Footer', 'rahmanda' ),
				'id'            => 'single-footer',
				'description'   => __( 'Single footer widget area', 'rahmanda' ),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			)
		);

		register_sidebar(
			array(
				'name'          => __( 'Footer Social Icon', 'rahmanda' ),
				'id'            => 'footer-social-icons',
				'description'   => __( 'Footer social icon widget area', 'rahmanda' ),
				'before_widget' => '<div id="%1$s" class="footer-widget %2$s dynamic-classes">',
				'after_widget'  => '</div><!-- .footer-social-icons-widget -->',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			)
		);

	}
} // End of function_exists( 'rahmanda_widgets_init' ).

add_filter( 'widget_block_dynamic_classname', 'rahmanda_filter_widget_classes', 10, 2 );

if ( ! function_exists( 'rahmanda_filter_widget_classes' ) ) {
	/**
	 * Initializes themes widgets.
	 */
	function rahmanda_filter_widget_classes( $classname, $block_name ){
		switch ($block_name) {
			case 'rahmanda/popular-posts':
				$classname = 'widget_block widget_popular_posts';
				break;
		}

		return $classname;
	}
} // End of function_exists( 'rahmanda_filter_widget_classes' ).

add_filter('widget_nav_menu_args',  'rahmanda_nav_menu_args', 10, 4);

if ( ! function_exists( 'rahmanda_nav_menu_args' ) ) {
	/**
	 * Change nav menu widget classes
	 */
	function rahmanda_nav_menu_args($nav_menu_args, $nav_menu, $args, $instance) {
		$defaults = array(
			'menu_class'		=> 'nav',
		);

		$nav_menu_args = wp_parse_args( $defaults, $nav_menu_args );

		return $nav_menu_args;
	}
} // End of function_exists( 'rahmanda_nav_hero_args' ).

add_filter( 'nav_menu_css_class', 'rahmanda_nav_menu_css_class');

if ( ! function_exists( 'rahmanda_nav_menu_css_class' ) ) {
	/**
	 * Add useful nav-item class to nav menu classes
	 */
	function rahmanda_nav_menu_css_class( $classes ) {
		$classes[] = 'nav-item';

		return $classes;  
	}
} // End of function_exists( 'rahmanda_nav_menu_css_class' ).
   
add_filter( 'nav_menu_link_attributes', 'rahmanda_nav_menu_link_attributes');

if ( ! function_exists( 'rahmanda_nav_menu_link_attributes' ) ) {
	/**
	 * Add useful nav-link class to nav menu link classes
	 */
	function rahmanda_nav_menu_link_attributes( $attributes ) {
		$attributes['class'] = "nav-link";
		
		return $attributes;
	}
} // End of function_exists( 'rahmanda_nav_menu_link_attributes' ).