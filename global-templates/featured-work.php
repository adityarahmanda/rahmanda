<?php
/**
 * Featured Works setup
 *
 * @package Rahmanda
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$enable_featured_works = get_theme_mod( 'understrap_front_page_enable_featured_works' );

if(!$enable_featured_works) {
    return;
}
?>
    
<div class="wrapper" id="wrapper-featured-work">
    
    <div class="container">
        
        <div class="row">
            
            <div class="col-md content-area">    
                
                <div class="featured-works-main">
                    
                    <h2 class="featured-works-title mb-4">
                        
                        <?php echo esc_html__('Kerjaan Unggulan', 'understrap'); ?>

                    </h2>

                    <?php
                        $args = array(
                            'post_type'             => 'work',
                            'posts_per_page'        => 1,
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
                                get_template_part( 'loop-templates/content', 'work' );
                            }

                        } else {

                            get_template_part( 'loop-templates/content', 'none-work' );

                        }
                    ?>

                    <div class="more-works">
						
						<a href="<?php echo get_post_type_archive_link( 'work' ); ?>">
                        
							<?php echo esc_html__("Intip Kerjaan Lain", 'understrap'); ?>
                        
						</a>

					</div>
                
                </div>  <!-- .featured-works-main -->
            
            </div> <!-- .col -->
        
        </div> <!-- .row -->
    
    </div> <!-- .container -->

</div> <!-- #wrapper-featured-work -->