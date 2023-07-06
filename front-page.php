<?php get_header();
the_content();
$args = array(
    'post_type' => 'mes_chantiers',
    'posts_per_page' => -1,
);

$query = new WP_Query($args);
?>

<div class="swiper">
    <div class="swiper-wrapper">
<?php
if ($query->have_posts()) {
    while ($query->have_posts()) {
        $query->the_post();
        ?><div class="swiper-slide"><img class="img-chantier" src="<?=the_post_thumbnail_url();?>"></div>
<?php
    }
}

wp_reset_postdata();
?>
    </div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
</div>
<?php
get_footer();