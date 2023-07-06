<?php

function disable_gutenberg_editor(){
    return false;
}

function theme_AquaPlaisir_supports(){
    add_theme_support('title-tag');
    add_theme_support('menus');
    add_theme_support('post-thumbnails');
}

function theme_AquaPlaisir_register_assets(){
    wp_deregister_script('jquery');
    wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js');
    wp_enqueue_style('themeaquaplaisir', get_stylesheet_directory_uri().'/assets/sass/main.css');
    wp_enqueue_script('swiper', get_stylesheet_directory_uri().'/assets/js/swiper.js');
    wp_enqueue_script('swiperjs-js', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js');
}

function wpc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg xml';
    return $mimes;
}

function create_custom_post_type(){
    $labels = array(
        'name' => 'Mes chantiers',
        'singular_name' => 'Mes chantiers',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor','thumbnail'),
        'show_in_rest' => true,
        'rewrite' => array('slug' => 'mes-chantiers'),
    );

    register_post_type('mes_chantiers', $args);
}

add_action('wp_enqueue_scripts', 'theme_AquaPlaisir_register_assets');
add_filter("use_block_editor_for_post_type", "disable_gutenberg_editor");
add_filter('upload_mimes', 'wpc_mime_types');
add_action('after_setup_theme','theme_AquaPlaisir_supports');
add_action('init', 'create_custom_post_type');
register_nav_menu('header', 'menu principal');
register_nav_menu('header-secondary', 'menu secondaire');