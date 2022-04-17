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

	<div class="row">
		
		<div class="col-md-8">
			
			<header class="entry-header">

				<?php the_title( '<h1 class="entry-title mb-3">', '</h1>' ); ?>

				<div class="entry-meta mb-3">
				
					<?php understrap_work_metas(); ?>
			
				</div> <!-- .entry-meta -->

			</header><!-- .entry-header -->

			<div class="entry-content">

				<?php the_content(); ?>

			</div><!-- .entry-content -->

		</div> <!-- col end -->

		<div class="col-md-4">

			<?php understrap_work_development_tools(); ?>

		</div> <!-- col end -->

	</div> <!-- row end -->

	<div class="entry-thumbnail">

		<?php the_post_thumbnail(); ?> 
	
	</div>

</article><!-- #post-## -->