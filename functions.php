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
    wp_enqueue_style('lefleat', 'https://unpkg.com/leaflet@1.9.4/dist/leaflet.css');
    wp_enqueue_script('lefleat-js', 'https://unpkg.com/leaflet@1.9.4/dist/leaflet.js', array(), null, true);
    wp_enqueue_script('swiper', get_stylesheet_directory_uri().'/assets/js/swiper.js', array(), null, true);
    wp_enqueue_script('scroll', get_stylesheet_directory_uri().'/assets/js/scroll.js', array(), null, true);
    wp_enqueue_script('swiperjs-js', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js');
    wp_enqueue_script('scroll-step', get_stylesheet_directory_uri().'/assets/js/scroll-step.js', array(), null, true);
    wp_enqueue_script('lightbox', get_stylesheet_directory_uri().'/assets/js/lightbox.js', array(), null, true);
    wp_enqueue_script('map', get_stylesheet_directory_uri().'/assets/js/map.js', array(), null, true);
    wp_enqueue_script('menu', get_stylesheet_directory_uri().'/assets/js/menu.js', array(), null, true);
}

function wpc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg xml';
    return $mimes;
}

function create_custom_post_type_accessoires(){
    $labels = array(
        'name' => 'Accessoires piscine',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor','thumbnail'),
        'show_in_rest' => true,
        'rewrite' => array('slug' => 'mes-accessoires'),
    );

    register_post_type('mes_accessoires', $args);
}

function create_custom_post_type_chantiers(){
    $labels = array(
        'name' => 'Mes chantiers',
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

function create_custom_post_type_etapes(){
    $labels = array(
        'name' => 'Mes etapes',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor','thumbnail'),
        'show_in_rest' => true,
        'rewrite' => array('slug' => 'mes-etapes'),
    );

    register_post_type('mes_etapes', $args);
}

function wpcode_elementor_shortcode_accessoires_txt(){
    $tabTxt= [];
    $index = 0;
    $args = array(
        'post_type' => 'mes_accessoires',
        'posts_per_page' => -1,
    );
    $query = new WP_Query($args);
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $tabTxt[$index] = get_the_content() ;
            $index++;
        }
    }
    wp_reset_postdata();
    return $tabTxt;
}

function wpcode_elementor_shortcode_accessoires_img(){
    $tabImg= [];
    $index = 0;
    $args = array(
        'post_type' => 'mes_accessoires',
        'posts_per_page' => -1,
    );
    $query = new WP_Query($args);
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $tabImg[$index] = get_the_post_thumbnail_url() ;
            $index++;
        }
    }
    wp_reset_postdata();
    return $tabImg;
}

function wpcode_elementor_shortcode_accessoires_title(){
    $tabTitle= [];
    $index = 0;
    $args = array(
        'post_type' => 'mes_accessoires',
        'posts_per_page' => -1,
    );
    $query = new WP_Query($args);
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $tabTitle[$index] = get_the_title() ;
            $index++;
        }
    }
    wp_reset_postdata();
    return $tabTitle;
}



function wpcode_elementor_shortcode_etapes(){
    $tabThumbnails = [];
    $index = 0;
    $args = array(
        'post_type' => 'mes_etapes',
        'posts_per_page' => -1,
    );
    $query = new WP_Query($args);
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $tabThumbnails[$index] = get_the_post_thumbnail_url() ;
            $index++;
        }
    }
    wp_reset_postdata();
    return array_reverse($tabThumbnails);
}

function wpcode_elementor_shortcode(){
    $tabThumbnails = [];
    $index = 0;
    $args = array(
        'post_type' => 'mes_chantiers',
        'posts_per_page' => -1,
    );
    $query = new WP_Query($args);
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $tabThumbnails[$index] = get_the_post_thumbnail_url() ;
            $index++;
        }
    }
    wp_reset_postdata();
    return $tabThumbnails;
}


function wpcode_elementor_shortcode_title_step(){
    $tabTitle = [];
    $index = 0;
    $args = array(
        'post_type' => 'mes_etapes',
    );
    $query = new WP_Query($args);
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $tabTitle[$index] = get_the_title() ;
            $index++;
        }
    }
    wp_reset_postdata();
    return array_reverse($tabTitle);
}

function get_accessoires_shortcode(){
    $tabTxt = wpcode_elementor_shortcode_accessoires_txt();
    $tabImg = wpcode_elementor_shortcode_accessoires_img();
    $tabTitle = wpcode_elementor_shortcode_accessoires_title();
    $max = count($tabTxt);
    for($index = 0; $index < $max ; $index++){
        echo <<<HTML
            <div class="container-cat-popup">
            
HTML;

        echo "<img class=\"img-popup\" src=\"". $tabImg[$index] . "\">";
        echo "<div class=\"container-content-popup\">";
        echo "<h4 class=\"title-h4-popup title-content-info \">".$tabTitle[$index]."</h4>";
        echo "<div class=\"p txt-p-popup\">".$tabTxt[$index] . "</div>";
        echo <<<HTML
    </div>
</div>
HTML;
        
    }

}



function get_etapes_shortcode()
{
    $tabThumbnails = wpcode_elementor_shortcode_etapes();
    $tabTitleStep = wpcode_elementor_shortcode_title_step();
    $max = count($tabThumbnails);
    echo <<<HTML
        <div class="swiper-step">
            <div class="swiper-wrapper">
HTML;
    for ($index = 0; $index < $max ; $index++) {
        echo "<div class=\"swiper-slide\"><h3 class=\"title-swiper-step\">" . $tabTitleStep[$index] . "</h3><img alt =\"" . $tabTitleStep[$index] . "\" class=\"img-chantier\" src= \" " . $tabThumbnails[$index] . "\"></div>";
    }
    echo <<<HTML
            </div>
            <div class="swiper-button-prev btn-swiper"></div>
            <div class="swiper-button-next btn-swiper"></div>
        </div>
HTML;
}



function get_chantier_shortcode()
{
    $tabThumbnails = wpcode_elementor_shortcode();
    $max = count($tabThumbnails);
    echo <<<HTML
    <div class="container-swiper">
        <div class="bloc-info">
            <a class="link-bloc-info" href="#"></a>
            <h3 class="txt-bloc-info">Envie d'avoir la même chose chez vous ?</h3>
        </div>
        <div class="swiper">
            <div class="swiper-wrapper">
            
HTML;
    for ($index = 0; $index < $max ; $index++) {
        echo "<div class=\"swiper-slide\"><img class=\"img-chantier\" src= \" " . $tabThumbnails[$index] . "\"></div>";
    }
    echo <<<HTML
            </div>
            <div class="swiper-scrollbar"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </div>
HTML;
}

add_shortcode('get_chantier_shortcode', 'get_chantier_shortcode');
add_shortcode('get_etapes_shortcode', 'get_etapes_shortcode');
add_shortcode('get_accessoires_shortcode', 'get_accessoires_shortcode');
add_filter("use_block_editor_for_post_type", "disable_gutenberg_editor");
add_filter('upload_mimes', 'wpc_mime_types');
add_action('after_setup_theme','theme_AquaPlaisir_supports');
add_action('init', 'create_custom_post_type_accessoires');
add_action('init', 'create_custom_post_type_chantiers');
add_action('init', 'create_custom_post_type_etapes');
add_action('wp_enqueue_scripts', 'theme_AquaPlaisir_register_assets');


register_nav_menu('header', 'menu principal');
register_nav_menu('header-secondary', 'menu secondaire');
register_nav_menu('header-mobile', 'menu mobile');