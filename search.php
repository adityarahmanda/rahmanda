<?php
/**
 * The template for displaying search results pages
 *
 * @package Rahmanda
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>

<div class="wrapper" id="wrapper-search">

	<div class="container" id="content" tabindex="-1">

		<div class="row" >

			<main class="site-main col-md-8" id="main">

				<?php if ( have_posts() ) : ?>

					<header class="page-header mb-3">

							<h1 class="page-title">
								<?php
								printf(
									/* translators: %s: query term */
									esc_html__( 'Hasil pencarian untuk : %s', 'understrap' ),
									'<span>' . get_search_query() . '</span>'
								);
								?>
							</h1>

					</header><!-- .page-header -->

					<?php /* Start the Loop */ ?>
					<?php
					while ( have_posts() ) :
						the_post();

						/*
						 * Run the loop for the search to output the results.
						 * If you want to overload this in a child theme then include a file
						 * called content-search.php and that will be used instead.
						 */
						get_template_part( 'loop-templates/content', 'search' );
					endwhile;
					?>

				<?php else : ?>

					<?php get_template_part( 'loop-templates/content', 'none' ); ?>

				<?php endif; ?>

			</main><!-- #main -->

			<!-- The pagination component -->
			<?php understrap_pagination(); ?>

			<!-- Do the right sidebar check -->
			<?php get_template_part( 'sidebar-templates/sidebar', 'right' ); ?>

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #wrapper-search -->

<?php
get_footer();
