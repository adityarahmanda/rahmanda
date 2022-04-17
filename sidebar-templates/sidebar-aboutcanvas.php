<?php
/**
 * Sidebar - The About Canvas Widget Area
 *
 * @package Rahmanda
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( is_active_sidebar( 'aboutcanvas' ) ) :
?>
    <div class="wrapper" id="wrapper-about">

        <div class="container">
    
            <?php dynamic_sidebar( 'aboutcanvas' ); ?>
        
        </div>

    </div>
<?php
endif;
