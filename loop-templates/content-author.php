<?php
/**
 * Template for displaying posts on the author archive
 *
 * @package Rahmanda
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class("mb-3"); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

		<?php
		the_title(
			sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
			'</a></h3>'
		);
		?>

	</header><!-- .entry-header -->

	<div class="entry-summary">

		<?php 
		the_excerpt(); 
		rahmanda_more_link();
		?>

	</div><!-- .entry-summary -->

</article><!-- #post-## -->
