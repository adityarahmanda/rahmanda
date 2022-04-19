<?php
/**
 * Custom post type setup
 *
 * @package Rahmanda
 */

add_action( 'init', 'rahmanda_work_post_type' );

if ( ! function_exists( 'rahmanda_work_post_type' ) ) {
	/**
	 * Create work custom post type.
	 */
    function rahmanda_work_post_type() {
        $labels = array(
            'name'                  => _x( 'Kerjaan', 'Post Type General Name', 'rahmanda' ),
            'singular_name'         => _x( 'Kerjaan', 'Post Type Singular Name', 'rahmanda' ),
            'menu_name'             => __( 'Kerjaan', 'rahmanda' ),
            'name_admin_bar'        => __( 'Kerjaan', 'rahmanda' ),
            'archives'              => __( 'Arsip Kerjaan', 'rahmanda' ),
            'attributes'            => __( 'Atribut Kerjaan', 'rahmanda' ),
            'parent_item_colon'     => __( 'Induk Kerjaan:', 'rahmanda' ),
            'all_items'             => __( 'Semua Kerjaan', 'rahmanda' ),
            'add_new_item'          => __( 'Tambahkan Kerjaan Baru', 'rahmanda' ),
            'add_new'               => __( 'Tambah Baru', 'rahmanda' ),
            'new_item'              => __( 'Kerjaan Baru', 'rahmanda' ),
            'edit_item'             => __( 'Sunting Kerjaan', 'rahmanda' ),
            'update_item'           => __( 'Perbarui Kerjaan', 'rahmanda' ),
            'view_item'             => __( 'Lihat Kerjaan', 'rahmanda' ),
            'view_items'            => __( 'Lihat Kerjaan', 'rahmanda' ),
            'search_items'          => __( 'Cari Kerjaan', 'rahmanda' ),
            'not_found'             => __( 'Kerjaan tidak ditemukan', 'rahmanda' ),
            'not_found_in_trash'    => __( 'Kerjaan tidak ditemukan di tong sampah', 'rahmanda' ),
            'insert_into_item'      => __( 'Sisipkan ke dalam Kerjaan', 'rahmanda' ),
            'uploaded_to_this_item' => __( 'Diunggah ke dalam Kerjaan ini', 'rahmanda' ),
            'items_list'            => __( 'Daftar Kerjaan', 'rahmanda' ),
            'items_list_navigation' => __( 'Navigasi daftar Kerjaan', 'rahmanda' ),
            'filter_items_list'     => __( 'Filter daftar Kerjaan', 'rahmanda' ),
        );

        $args = array(
                'label'                 => __( 'Kerjaan', 'rahmanda' ),
                'description'           => __( 'Kerjaan', 'rahmanda' ),
                'labels'                => $labels,
                'menu_position'         => 5,
                'menu_icon'             => 'dashicons-text-page',
                'supports'              => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'custom-fields', 'permalinks', 'featured_image' ),
                'rewrite'               => array( 'slug' => 'kerjaan' ),
                'has_archive'           => true,
                'public'                => true,
                'hierarchical'          => true,
                'show_ui'               => true,
                'show_in_menu'          => true,
                'show_in_rest'          => true,
                'show_in_admin_bar'     => true,
                'show_in_nav_menus'     => true,
                'can_export'            => true,	
                'exclude_from_search'   => false,
                'publicly_queryable'    => true,
                'capability_type'       => 'post',
                'taxonomies'            => array( 'post_tag', 'development_tool' )
        );

        register_post_type( 'work', $args);
    }
}

add_action( 'init', 'rahmanda_freebies_post_type' );

if ( ! function_exists( 'rahmanda_freebies_post_type' ) ) {
	/**
	 * Create freebies custom post type.
	 */
    function rahmanda_freebies_post_type() {
        $labels = array(
            'name'                  => _x( 'Gratisan', 'Post Type General Name', 'rahmanda' ),
            'singular_name'         => _x( 'Gratisan', 'Post Type Singular Name', 'rahmanda' ),
            'menu_name'             => __( 'Gratisan', 'rahmanda' ),
            'name_admin_bar'        => __( 'Gratisan', 'rahmanda' ),
            'archives'              => __( 'Arsip Gratisan', 'rahmanda' ),
            'attributes'            => __( 'Atribut Gratisan', 'rahmanda' ),
            'parent_item_colon'     => __( 'Induk Gratisan:', 'rahmanda' ),
            'all_items'             => __( 'Semua Gratisan', 'rahmanda' ),
            'add_new_item'          => __( 'Tambahkan Gratisan Baru', 'rahmanda' ),
            'add_new'               => __( 'Tambah Baru', 'rahmanda' ),
            'new_item'              => __( 'Gratisan Baru', 'rahmanda' ),
            'edit_item'             => __( 'Sunting Gratisan', 'rahmanda' ),
            'update_item'           => __( 'Perbarui Gratisan', 'rahmanda' ),
            'view_item'             => __( 'Lihat Gratisan', 'rahmanda' ),
            'view_items'            => __( 'Lihat Gratisan', 'rahmanda' ),
            'search_items'          => __( 'Cari Gratisan', 'rahmanda' ),
            'not_found'             => __( 'Gratisan tidak ditemukan', 'rahmanda' ),
            'not_found_in_trash'    => __( 'Gratisan tidak ditemukan di tong sampah', 'rahmanda' ),
            'insert_into_item'      => __( 'Sisipkan ke dalam Gratisan', 'rahmanda' ),
            'uploaded_to_this_item' => __( 'Diunggah ke dalam Gratisan ini', 'rahmanda' ),
            'items_list'            => __( 'Daftar Gratisan', 'rahmanda' ),
            'items_list_navigation' => __( 'Navigasi daftar Gratisan', 'rahmanda' ),
            'filter_items_list'     => __( 'Filter daftar Gratisan', 'rahmanda' ),
        );

        $args = array(
                'label'                 => __( 'Gratisan', 'rahmanda' ),
                'description'           => __( 'Kumpulan hasil kerjaan yang dapat diunduh dan dimanfaatkan secara gratis.', 'rahmanda' ),
                'labels'                => $labels,
                'menu_position'         => 5,
                'menu_icon'             => 'dashicons-coffee',
                'supports'              => array( 'title', 'excerpt', 'permalinks', 'thumbnail', 'featured_image' ),
                'rewrite'               => array( 'slug' => 'gratisan' ),
                'has_archive'           => true,
                'public'                => true,
                'hierarchical'          => false,
                'show_ui'               => true,
                'show_in_menu'          => true,
                'show_in_admin_bar'     => true,
                'show_in_nav_menus'     => false,
                'can_export'            => true,	
                'exclude_from_search'   => true,
                'query_var'             => false,
                'publicly_queryable'    => true,
                'capability_type'       => 'post',
                'taxonomies'            => array( )
        );

        register_post_type( 'freebies', $args);
    }
}

add_action('admin_menu','remove_freebies_slug_screen_metaboxes');

if ( ! function_exists( 'remove_freebies_slug_screen_metaboxes' ) ) {
	/**
	 * Remove slug meta box on single freebies.
	 */
    function remove_freebies_slug_screen_metaboxes() {
        remove_meta_box( 'slugdiv','freebies','normal' );
    }
}

add_filter( 'post_row_actions', 'remove_freebies_view_action', 10, 2 );

if ( ! function_exists( 'remove_freebies_view_action' ) ) {
	/**
	 * Remove view action on single freebies admin menu.
	 */
    function remove_freebies_view_action( $actions, $post ) {
        if( $post->post_type == 'freebies' ) 
            unset( $actions['view'] );

        return $actions;
    }
}