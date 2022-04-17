<?php
/**
 * Featured work partial template
 *
 * @package Rahmanda
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class( "mb-4" ); ?> id="post-<?php the_ID(); ?>">

	<div class="row">
		
		<div class="col-md-8">
			
			<header class="entry-header">

				<?php 
				the_title(
					sprintf( '<h3 class="entry-title mb-3"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
					'</a></h3>'
				);
				?>

				<div class="entry-meta mb-3">
				
					<?php understrap_work_metas(); ?>
			
				</div> <!-- .entry-meta -->

			</header><!-- .entry-header -->

			<div class="entry-content">

				<?php
				the_excerpt();
				?>

			</div><!-- .entry-content -->

		</div> <!-- col end -->

		<div class="col-md-4">

			<?php understrap_work_development_tools(); ?>

		</div> <!-- col end -->

	</div> <!-- row end -->

	<div class="entry-thumbnail mb-3">

		<?php the_post_thumbnail(); ?> 
	
	</div>

	<?php understrap_more_link(); ?>

</article><!-- #post-## -->
