<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Rahmanda
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>

<div class="wrapper" id="wrapper-index">

	<div class="container" id="content" tabindex="-1">

		<div class="row">
			
			<div class="col-md-8 content-area" id="primary">

				<main class="site-main" id="main">

					<header class="page-header mb-3">
						
						<h1 class="page-title">
							
							<?php echo esc_html__('Postingan', 'rahmanda'); ?>
						
						</h1>

					</header><!-- .page-header -->

					<?php
					if ( have_posts() ) {
						// Start the Loop.
						while ( have_posts() ) {
							the_post();

							/*
							* Include the Post-Format-specific template for the content.
							* If you want to override this in a child theme, then include a file
							* called content-___.php (where ___ is the Post Format name) and that will be used instead.
							*/
							get_template_part( 'loop-templates/content', get_post_format() );
						}
					} else {
						get_template_part( 'loop-templates/content', 'none' );
					}
					?>

				</main><!-- #main -->

				<!-- The pagination component -->
				<?php rahmanda_pagination(); ?>

			</div>

			<?php get_template_part( 'sidebar-templates/sidebar', 'right' ); ?>

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #wrapper-index -->

<?php
get_footer();