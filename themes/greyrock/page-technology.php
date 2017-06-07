<?php
/**
 * Template Name: Technology
 */
get_header(); 

    $prebanner_title = get_field('prebanner_title');
    $prebanner_content = get_field('prebanner_content');
    $prebanner_sublist = get_field('prebanner_sublist');

    $video_title = get_field('video_title');
    $video_color = get_field('video_color') ? 'color: '.get_field('video_color').';' : '';
    $video_url = esc_url(get_field('video_vimeo'));
    $video_bg = get_field('video_bg') ? 'background-image: url('.get_field('video_bg').');' : '';
?>


    <?php get_template_part('inc/banner'); ?>


<?php get_footer(); ?>