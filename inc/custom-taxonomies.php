<?php
/*
* Plugin Name: Course Taxonomy
* Description: A short example showing how to add a taxonomy called Course.
* Version: 1.0
* Author: developer.wordpress.org
* Author URI: https://codex.wordpress.org/User:Aternus
*/

add_action( 'init', 'understrap_register_taxonomy_development_tool' );

function understrap_register_taxonomy_development_tool() {
     $labels = array(
         'name'              => _x( 'Perkakas Pengembangan', 'general name' ),
         'singular_name'     => _x( 'Perkakas Pengembangan', 'singular name' ),
         'search_items'      => __( 'Cari Perkakas' ),
         'all_items'         => __( 'Semua Perkakas' ),
         'parent_item'       => __( 'Induk Perkakas' ),
         'parent_item_colon' => __( 'Induk Perkakas:' ),
         'edit_item'         => __( 'Sunting Perkakas' ),
         'update_item'       => __( 'Perbarui Perkakas' ),
         'add_new_item'      => __( 'Tambahkan Perkakas Baru' ),
         'new_item_name'     => __( 'Nama Perkakas Baru' ),
         'menu_name'         => __( 'Perkakas Pengembangan' ),
     );
     $args   = array(
         'hierarchical'      => false,
         'labels'            => $labels,
         'show_ui'           => true,
         'show_admin_column' => true,
         'show_in_rest'      => true, 
         'query_var'         => true,
         'rewrite'           => [ 'slug' => 'perkakas-pengembangan' ],
     );
     register_taxonomy( 'development_tool', [ 'work' ], $args );
}