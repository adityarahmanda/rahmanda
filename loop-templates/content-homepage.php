<?php
/**
 * Partial template for content in Homepage Template Page
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Rahmanda
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( empty( get_the_content() ) ) {
    return;
}
?>

<div class="wrapper" id="wrapper-front-page">
    
    <div class="container">
        
        <div class="row">
            
            <div class="col-md front-page-content">  

                <?php the_content(); ?>

            </div>  <!-- .col -->    
        
        </div> <!-- .row -->
    
    </div> <!-- .container -->

</div> <!-- #wrapper-front-page -->
