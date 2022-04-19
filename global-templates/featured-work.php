<?php
/**
 * Featured Works setup
 *
 * @package Rahmanda
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$enable_featured_work = get_theme_mod( 'rahmanda_front_page_enable_featured_work' );

if(!$enable_featured_work) {
    return;
}
?>
    
<div class="wrapper" id="wrapper-featured-work">
    
    <div class="container">
        
        <div class="row">
            
            <div class="col-md content-area">    
                
                <div class="featured-work-main">
                    
					<div class="featured-work-header">

                        <h2 class="featured-work-title">
                            
                            <?php echo esc_html__('Kerjaan Unggulan', 'rahmanda'); ?>

                        </h2>
                    
                    </div>

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
                        
							<?php echo esc_html__("Intip Kerjaan Lain", 'rahmanda'); ?>
                        
						</a>

					</div>
                
                </div>  <!-- .featured-works-main -->
            
            </div> <!-- .col -->
        
        </div> <!-- .row -->
    
    </div> <!-- .container -->

</div> <!-- #wrapper-featured-work -->