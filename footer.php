<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Rahmanda
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>

<div class="wrapper" id="wrapper-footer">

    <footer class="site-footer" id="colophon">

        <div class="container">

            <div class="row">

                <div class="col-md-6">

                    <?php get_template_part( 'sidebar-templates/sidebar', 'footer-social-icons' ); ?>

                </div><!--col end -->

                <div class="col-md-6">
                    
                    <div class="site-info">
                    
                    <span> <?php rahmanda_site_info(); ?> </span>

                    </div><!-- .site-info -->

                </div><!--col end -->

            </div><!-- row end -->

        </div><!-- container end -->

    </footer><!-- #colophon -->

</div><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>

