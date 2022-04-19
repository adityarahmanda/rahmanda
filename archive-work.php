<?php
/**
 * The template for displaying work archive page
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Rahmanda
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>

<div class="wrapper" id="wrapper-archive-work">

	<div class="container" id="content" tabindex="-1">

		<div class="row">

			<main class="site-main col-md" id="main">

				<?php
				if ( have_posts() ) {
					?>
					
					<header class="page-header mb-3">
                        <h1 class="page-title"><?php echo post_type_archive_title(); ?></h1>
					</header><!-- .page-header -->

					<?php
					// Start the loop.
					while ( have_posts() ) {
						the_post();

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'loop-templates/content', 'work' );
					}
				} else {
					get_template_part( 'loop-templates/content', 'none-work' );
				}
				?>

			</main><!-- #main -->

			<!-- The pagination component -->
			<?php rahmanda_pagination(); ?>

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #wrapper-archive -->

<?php
get_footer();
