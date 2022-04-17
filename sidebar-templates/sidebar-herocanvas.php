<?php
/**
 * Sidebar - The Hero Canvas Widget Area
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( is_active_sidebar( 'herocanvas' ) ) :
?>
    <div class="wrapper" id="wrapper-hero">

        <div class="container">
    
            <?php dynamic_sidebar( 'herocanvas' ); ?>
        
        </div>

    </div>
<?php
endif;
