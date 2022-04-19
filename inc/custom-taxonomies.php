<?php
/**
 * Custom taxonomies setup
 *
 * @package Rahmanda
 */

add_action( 'init', 'rahmanda_change_tag_tax_object_label' );

if ( ! function_exists( 'rahmanda_change_tag_tax_object_label' ) ) {
	/**
	 * Change default tag labels
	 */
    function rahmanda_change_tag_tax_object_label() {
        global $wp_taxonomies;

        $labels = array(
            'name'                          => _x('Label', 'general name', 'rahmanda' ),
            'singular_name'                 => _x( 'Label', 'singular name', 'rahmanda' ),
            'separate_items_with_commas'    => __( 'Pisahkan label dengan koma', 'rahmanda' ),
            'choose_from_most_used'         => __( 'Pilih label yang paling sering digunakan', 'rahmanda' ),
            'search_items'                  => __( 'Cari Label' ),
            'all_items'                     => __( 'Semua Label' ),
            'parent_item'                   => __( 'Induk Label' ),
            'parent_item_colon'             => __( 'Induk Label:' ),
            'edit_item'                     => __( 'Sunting Label' ),
            'update_item'                   => __( 'Perbarui Label' ),
            'add_new_item'                  => __( 'Tambahkan Label Baru' ),
            'new_item_name'                 => __( 'Nama Label Baru' ),
            'not_found'                     => __( 'Tidak ada label yang ditemukan.', 'rahmanda' ),
            'no_terms'                      => __( 'Tanpa Label', 'rahmanda' ),
            'items_list_navigation'         => __( 'Navigasi daftar label', 'rahmanda' ),
            'items_list'                    => __( 'Daftar label', 'rahmanda' ),
            'back_to_items'                 => __( '← Pergi ke Label', 'rahmanda' ),
            'item_link'                     => __( 'Tautan Label', 'rahmanda' ),
            'item_link_description'         => __( 'Tautan ke label.', 'rahmanda' ),
            'menu_name'                     => __( 'Label' ),
        );

        $tag_tax = &$wp_taxonomies['post_tag'];
        $tag_tax->label = __( 'Label', 'rahmanda');
        $tag_tax->labels = $labels;
    }
}

add_action( 'init', 'rahmanda_register_taxonomy_dev_tool' );

if ( ! function_exists( 'rahmanda_register_taxonomy_dev_tool' ) ) {
	/**
	 * Create development tool custom taxonomy.
	 */
    function rahmanda_register_taxonomy_dev_tool() {
        $labels = array(
            'name'                          => _x( 'Perkakas', 'general name', 'rahmanda' ),
            'singular_name'                 => _x( 'Perkakas', 'singular name', 'rahmanda' ),
            'search_items'                  => __( 'Cari Perkakas', 'rahmanda' ),
            'all_items'                     => __( 'Semua Perkakas', 'rahmanda' ),
            'parent_item'                   => __( 'Induk Perkakas', 'rahmanda' ),
            'parent_item_colon'             => __( 'Induk Perkakas:', 'rahmanda' ),
            'edit_item'                     => __( 'Sunting Perkakas', 'rahmanda' ),
            'update_item'                   => __( 'Perbarui Perkakas', 'rahmanda' ),
            'add_new_item'                  => __( 'Tambahkan Perkakas Baru', 'rahmanda' ),
            'new_item_name'                 => __( 'Nama Perkakas Baru', 'rahmanda' ),
            'not_found'                     => __( 'Tidak ada perkakas yang ditemukan.', 'rahmanda' ),
            'no_terms'                      => __( 'Tanpa Perkakas', 'rahmanda' ),
            'items_list_navigation'         => __( 'Navigasi daftar Perkakas', 'rahmanda' ),
            'items_list'                    => __( 'Daftar Perkakas', 'rahmanda' ),
            'back_to_items'                 => __( '← Pergi ke Perkakas', 'rahmanda' ),
            'item_link'                     => __( 'Tautan Perkakas', 'rahmanda' ),
            'item_link_description'         => __( 'Tautan ke Perkakas.', 'rahmanda' ),
            'menu_name'                     => __( 'Perkakas', 'rahmanda' ),
        );
        $args   = array(
            'hierarchical'      => false,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'show_in_rest'      => true, 
            'query_var'         => true,
            'rewrite'           => [ 'slug' => 'perkakas' ],
        );
        register_taxonomy( 'dev_tool', [ 'work' ], $args );
    }
}