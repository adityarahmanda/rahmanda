<?php
/**
 * Single post partial template
 *
 * @package Rahmanda
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<div class="entry-thumbnail thumbnail-large">
	
		<?php the_post_thumbnail( 'large' ); ?>
	
	</div>

	<header class="entry-header">

		<div class="entry-categories" >
			
			<?php the_category(); ?>

		</div>

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">

			<?php rahmanda_posted_on(); ?>

		</div><!-- .entry-meta -->

	</header><!-- .entry-header -->

	<div class="entry-content">

		<?php
		the_content();
		?>

	</div><!-- .entry-content -->

    <?php get_template_part( 'sidebar-templates/sidebar', 'single-footer' ); ?>

</article><!-- #post-## -->
