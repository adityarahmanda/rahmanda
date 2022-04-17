<?php
/**
 * Post rendering content according to caller of get_template_part
 *
 * @package Rahmanda
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class('mb-4'); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

		<?php
		the_title(
			sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
			'</a></h3>'
		);
		?>

	</header><!-- .entry-header -->

	<div class="entry-content">

		<?php 
		the_excerpt(); 
		understrap_more_link();
		?>

	</div><!-- .entry-content -->

</article><!-- #post-## -->
