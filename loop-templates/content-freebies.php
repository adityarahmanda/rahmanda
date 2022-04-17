<?php
/**
 * Post rendering content according to caller of get_template_part
 *
 * @package Rahmanda
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class("border-bottom"); ?> id="post-<?php the_ID(); ?>">

    <div class="row">

        <div class="col-4">

            <div class="entry-thumbnail text-center">
        
                <?php the_post_thumbnail( 'medium' ); ?>
            
            </div>

        </div>

        <div class="col-8">

        <header class="entry-header">

            <h3 class="entry-title">

                <?php the_title(); ?>

            </h3>

            </header><!-- .entry-header -->

            <div class="entry-content">

            <?php the_excerpt(); ?>
                
            <a href="<?php echo esc_url( get_post_meta( get_the_ID(), '_url', true ) ); ?>" rel="bookmark" target="_blank" >
                <?php echo esc_html__( 'Unduh', 'understrap' ); ?>
            </a>

            </div><!-- .entry-content -->

        </div>

    </div>

</article><!-- #post-## -->
