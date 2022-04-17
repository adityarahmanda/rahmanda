<?php
/**
 * The template for displaying the author pages
 *
 * Learn more: https://codex.wordpress.org/Author_Templates
 *
 * @package Rahmanda
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>

<div class="wrapper" id="wrapper-author">

	<div class="container" id="content" tabindex="-1">

		<div class="row">

			<main class="site-main col-md-8" id="main">

				<header class="page-header author-header mb-3">

					<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					?>

				</header><!-- .page-header -->

				<!-- The Loop -->
				<?php
				if ( have_posts() ) {
					while ( have_posts() ) {
						the_post();
						get_template_part( 'loop-templates/content', 'author' );
					}
				} else {
					get_template_part( 'loop-templates/content', 'none' );
				}
				?>
				<!-- End Loop -->

				<!-- The pagination component -->
				<?php understrap_pagination(); ?>

			</main><!-- #main -->

			<!-- Do the right sidebar check -->
			<?php get_template_part( 'sidebar-templates/sidebar', 'right' ); ?>

		</div> <!-- .row -->

	</div><!-- #content -->

</div><!-- #wrapper-author -->

<?php
get_footer();
