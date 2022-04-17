<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Rahmanda
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'understrap_posted_on' ) ) {
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function understrap_posted_on() {
		$byline      = apply_filters(
			'understrap_posted_by',
			sprintf(
				'<span class="byline"><span class="author vcard"> <a class="url fn n" href="%1$s">%2$s</a></span></span>',
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				esc_html( get_the_author() )
			)
		);

		$separator	 = " - ";

		$time_string = sprintf(
			'<time class="entry-date published" datetime="%1$s">%2$s</time>',
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() )
		);

		$posted_on   = apply_filters(
			'understrap_posted_on',
			sprintf(
				'<span class="posted-on"><a href="%1$s" rel="bookmark">%2$s</a></span>',
				esc_url( get_home_url() . get_the_date( '/Y/m/d' ) ),
				apply_filters( 'understrap_posted_on_time', $time_string )
			)
		);
		echo $byline . $separator . $posted_on; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
}

if ( ! function_exists( 'understrap_work_metas' ) ) {
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function understrap_work_metas() {
		// Hide category and tag text for pages.
		if ( 'work' === get_post_type( get_the_ID() ) ) {

			$external_links = get_post_meta( get_the_ID(), '_external_links', true );
		
			if(!empty($external_links)) {
				$external_link_list = '';

				foreach ($external_links as $link) {
					$external_link_list .= sprintf(
						'<a href="%1$s" class="btn btn-primary text-white rounded-pill me-3" target="_blank" >%2$s%3$s</a>',
						!empty($link['url']) ? esc_url(  $link['url'] ) : '',
						!empty($link['icon']) ? sprintf('<i class="fa %1$s me-2"></i>', $link['icon']) : '',
						!empty($link['label']) ? $link['label'] : ''
					);
				} // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

				echo $external_link_list;
			}
		}
	}
}

if ( ! function_exists( 'understrap_work_development_tools' ) ) {
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function understrap_work_development_tools() {
		// Hide category and tag text for pages.
		if ( 'work' === get_post_type( get_the_ID() ) ) {
			$dev_tool_terms = get_the_terms( get_the_ID(), 'development_tool' );
		
			if(!empty($dev_tool_terms)) {
				$dev_tool_tax = get_taxonomy('development_tool');
				$dev_tool_label = $dev_tool_tax->label;
				$dev_tool_slug = $dev_tool_tax->rewrite['slug'];
			
				$dev_tool_list = '<ul class="dev-tool-list">';
				foreach ($dev_tool_terms as $term) {
					$dev_tool_list .= sprintf(
						'<li class="dev-tool-list-item">'
							. '<a href="%s" rel="category tag">%s</a>'
						. '</li>',
						esc_url( home_url( '/' . $dev_tool_slug . '/' . $term->slug ) ),
						$term->name
					);
				} // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				$dev_tool_list .= '</ul> <!-- dev-tool-list -->';

				printf( 
					'<div class="entry-dev-tools">'
						. '<div class="entry-dev-tools-heading">%s</div> <!-- .dev-tools-heading -->'
						. '%s'
					. '</div> <!-- .entry-dev-tools-->', 
					$dev_tool_label,
					$dev_tool_list
				); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
		}
	}
}

if ( ! function_exists( 'understrap_body_attributes' ) ) {
	/**
	 * Displays the attributes for the body element.
	 */
	function understrap_body_attributes() {
		/**
		 * Filters the body attributes.
		 *
		 * @param array $atts An associative array of attributes.
		 */
		$atts = array_unique( apply_filters( 'understrap_body_attributes', $atts = array() ) );
		if ( ! is_array( $atts ) || empty( $atts ) ) {
			return;
		}
		$attributes = '';
		foreach ( $atts as $name => $value ) {
			if ( $value ) {
				$attributes .= sanitize_key( $name ) . '="' . esc_attr( $value ) . '" ';
			} else {
				$attributes .= sanitize_key( $name ) . ' ';
			}
		}
		echo trim( $attributes ); // phpcs:ignore WordPress.Security.EscapeOutput
	}
}

if ( ! function_exists( 'understrap_comment_navigation' ) ) {
	/**
	 * Displays the comment navigation.
	 */
	function understrap_comment_navigation() {
		if ( get_comment_pages_count() <= 1 ) {
			// Return early if there are no comments to navigate through.
			return;
		}
		?>
		<nav class="comment-navigation" id="comment-nav">

			<h1 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'understrap' ); ?></h1>

			<div class="comment-navigation-content">
				
				<?php if ( get_previous_comments_link() ) { ?>
					<div class="nav-previous">
						<?php previous_comments_link( __( '&larr; Older Comments', 'understrap' ) ); ?>
					</div>
				<?php } ?>

				<?php if ( get_next_comments_link() ) { ?>
					<div class="nav-next">
						<?php next_comments_link( __( 'Newer Comments &rarr;', 'understrap' ) ); ?>
					</div>
				<?php } ?>
			
			</div>

		</nav><!-- #<?php echo esc_attr( $nav_id ); ?> -->
		<?php
	}
}

if ( ! function_exists( 'understrap_link_pages' ) ) {
	/**
	 * Displays/retrieves page links for paginated posts (i.e. including the
	 * `<!--nextpage-->` Quicktag one or more times). This tag must be
	 * within The Loop. Default: echo.
	 *
	 * @return void|string Formatted output in HTML.
	 */
	function understrap_link_pages() {
		$args = apply_filters(
			'understrap_link_pages_args',
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'understrap' ),
				'after'  => '</div>',
			)
		);
		wp_link_pages( $args );
	}
}
