<?php
/**
 * The template for displaying freebies archive page
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Rahmanda
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>

<div class="wrapper" id="wrapper-archive-freebies">

	<div class="container" id="content" tabindex="-1">

		<div class="row">

			<main class="site-main col-md" id="main">

				<?php
				if ( have_posts() ) {
					?>
					
					<header class="page-header border-bottom">

                        <h1 class="page-title">
							<?php echo post_type_archive_title(); ?>
						</h1>
                        
						<div class="page-description">
							<?php echo get_the_post_type_description(); ?>
						</div>
					
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
						get_template_part( 'loop-templates/content', 'freebies' );
					}
				} else {
					get_template_part( 'loop-templates/content', 'none-freebies' );
				}
				?>

			</main><!-- #main -->

			<!-- The pagination component -->
			<?php understrap_pagination(); ?>

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #wrapper-archive -->

<?php
get_footer();
