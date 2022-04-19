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

	<header class="entry-header">

		<?php the_title( '<h1 class="entry-title mb-3">', '</h1>' ); ?>

		<div class="entry-meta mb-3">
		
			<?php rahmanda_work_metas(); ?>
	
		</div> <!-- .entry-meta -->

	</header><!-- .entry-header -->

	<?php the_excerpt(); ?>

	<div class="entry-taxonomies mb-3">

		<?php rahmanda_work_taxonomies(); ?>

	</div><!-- .entry-excerpt -->

	<?php 
		the_content(); 
	?>

</article><!-- #post-## -->