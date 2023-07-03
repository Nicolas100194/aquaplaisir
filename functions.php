<?php

function disable_gutenberg_editor(){
    return false;
}

function theme_AquaPlaisir_supports(){
    add_theme_support('title-tag');
    add_theme_support('menus');
}

function theme_AquaPlaisir_register_assets(){
    wp_enqueue_style('themeaquaplaisir', get_stylesheet_directory_uri().'/assets/sass/main.css');
}


add_action('wp_enqueue_scripts', 'theme_AquaPlaisir_register_assets');
add_filter("use_block_editor_for_post_type", "disable_gutenberg_editor");
add_action('after_setup_theme','theme_AquaPlaisir_supports');