<?php
/**
 * Front Page index setup
 *
 * @package Rahmanda
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$enable_front_page_index = get_theme_mod( 'understrap_front_page_enable_posts' );

if(!$enable_front_page_index) {
    return;
}
?>
<div class="wrapper" id="wrapper-index">

	<div class="container" id="content" tabindex="-1">

		<div class="row">
			
			<div class="col-md content-area" id="primary">

				<main class="site-main" id="main">

					<div class="index-header mb-4">
						<h2 class="index-title">
						
							<?php echo esc_html__( 'Postingan', 'understrap' ); ?>
						
						</h2>
					</div>

					<?php
					$args = array(
						'posts_per_page'        => get_option( 'posts_per_page' ),
					);

					$loop = new WP_Query($args);

					if($loop->have_posts()) {

						while ( $loop->have_posts() ) {
							$loop->the_post();

							/*
							* Include the Post-Format-specific template for the content.
							* If you want to override this in a child theme, then include a file
							* called content-___.php (where ___ is the Post Format name) and that will be used instead.
							*/
							get_template_part( 'loop-templates/content', $loop->get_post_format() );
						}

					} else {
						get_template_part( 'loop-templates/content', 'none-featured-works' );
					}
					?>

                    <div class="more-posts">
						
						<a href="<?php echo get_post_type_archive_link( 'post' ); ?>">
                        
							<?php echo esc_html__("Intip Postingan Lain", 'understrap'); ?>
                        
						</a>

					</div>

				</main><!-- #main -->

			</div>

			<?php get_template_part( 'sidebar-templates/sidebar', 'right' ); ?>

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #wrapper-index -->