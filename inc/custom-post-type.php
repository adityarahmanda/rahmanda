<?php

add_action( 'init', 'understrap_work_post_type' );

function understrap_work_post_type() {
    $labels = array(
        'name'                  => _x( 'Kerjaan', 'Post Type General Name', 'understrap' ),
        'singular_name'         => _x( 'Kerjaan', 'Post Type Singular Name', 'understrap' ),
        'menu_name'             => __( 'Kerjaan', 'understrap' ),
        'name_admin_bar'        => __( 'Kerjaan', 'understrap' ),
        'archives'              => __( 'Arsip Kerjaan', 'understrap' ),
        'attributes'            => __( 'Atribut Kerjaan', 'understrap' ),
        'parent_item_colon'     => __( 'Induk Kerjaan:', 'understrap' ),
        'all_items'             => __( 'Semua Kerjaan', 'understrap' ),
        'add_new_item'          => __( 'Tambahkan Kerjaan Baru', 'understrap' ),
        'add_new'               => __( 'Tambah Baru', 'understrap' ),
        'new_item'              => __( 'Kerjaan Baru', 'understrap' ),
        'edit_item'             => __( 'Sunting Kerjaan', 'understrap' ),
        'update_item'           => __( 'Perbarui Kerjaan', 'understrap' ),
        'view_item'             => __( 'Lihat Kerjaan', 'understrap' ),
        'view_items'            => __( 'Lihat Kerjaan', 'understrap' ),
        'search_items'          => __( 'Cari Kerjaan', 'understrap' ),
        'not_found'             => __( 'Kerjaan tidak ditemukan', 'understrap' ),
        'not_found_in_trash'    => __( 'Kerjaan tidak ditemukan di tong sampah', 'understrap' ),
        'insert_into_item'      => __( 'Sisipkan ke dalam Kerjaan', 'understrap' ),
        'uploaded_to_this_item' => __( 'Diunggah ke dalam Kerjaan ini', 'understrap' ),
        'items_list'            => __( 'Daftar Kerjaan', 'understrap' ),
        'items_list_navigation' => __( 'Navigasi daftar Kerjaan', 'understrap' ),
        'filter_items_list'     => __( 'Filter daftar Kerjaan', 'understrap' ),
    );

    $args = array(
            'label'                 => __( 'Kerjaan', 'understrap' ),
            'description'           => __( 'Kerjaan', 'understrap' ),
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
            'taxonomies'            => array( 'development_tool' )
    );

    register_post_type( 'work', $args);
}

add_action( 'init', 'understrap_freebies_post_type' );

function understrap_freebies_post_type() {
    $labels = array(
        'name'                  => _x( 'Gratisan', 'Post Type General Name', 'understrap' ),
        'singular_name'         => _x( 'Gratisan', 'Post Type Singular Name', 'understrap' ),
        'menu_name'             => __( 'Gratisan', 'understrap' ),
        'name_admin_bar'        => __( 'Gratisan', 'understrap' ),
        'archives'              => __( 'Arsip Gratisan', 'understrap' ),
        'attributes'            => __( 'Atribut Gratisan', 'understrap' ),
        'parent_item_colon'     => __( 'Induk Gratisan:', 'understrap' ),
        'all_items'             => __( 'Semua Gratisan', 'understrap' ),
        'add_new_item'          => __( 'Tambahkan Gratisan Baru', 'understrap' ),
        'add_new'               => __( 'Tambah Baru', 'understrap' ),
        'new_item'              => __( 'Gratisan Baru', 'understrap' ),
        'edit_item'             => __( 'Sunting Gratisan', 'understrap' ),
        'update_item'           => __( 'Perbarui Gratisan', 'understrap' ),
        'view_item'             => __( 'Lihat Gratisan', 'understrap' ),
        'view_items'            => __( 'Lihat Gratisan', 'understrap' ),
        'search_items'          => __( 'Cari Gratisan', 'understrap' ),
        'not_found'             => __( 'Gratisan tidak ditemukan', 'understrap' ),
        'not_found_in_trash'    => __( 'Gratisan tidak ditemukan di tong sampah', 'understrap' ),
        'insert_into_item'      => __( 'Sisipkan ke dalam Gratisan', 'understrap' ),
        'uploaded_to_this_item' => __( 'Diunggah ke dalam Gratisan ini', 'understrap' ),
        'items_list'            => __( 'Daftar Gratisan', 'understrap' ),
        'items_list_navigation' => __( 'Navigasi daftar Gratisan', 'understrap' ),
        'filter_items_list'     => __( 'Filter daftar Gratisan', 'understrap' ),
    );

    $args = array(
            'label'                 => __( 'Gratisan', 'understrap' ),
            'description'           => __( 'Kumpulan hasil kerjaan yang dapat diunduh dan dimanfaatkan secara gratis.', 'understrap' ),
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
            'publicly_queryable'    => true,
            'capability_type'       => 'post',
            'taxonomies'            => array( )
    );

    register_post_type( 'freebies', $args);
}

add_action('admin_menu','remove_freebies_slug_screen_metaboxes');

function remove_freebies_slug_screen_metaboxes() {
	remove_meta_box( 'slugdiv','freebies','normal' ); // Slug Metabox
}

add_filter( 'post_row_actions', 'remove_freebies_view_action', 10, 2 );

function remove_freebies_view_action( $actions, $post ) {
    if( $post->post_type == 'freebies' ) 
        unset( $actions['view'] );

    return $actions;
}