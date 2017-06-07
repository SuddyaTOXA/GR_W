<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <div class="wrapper">
        <header class="header" id="header">
            <div class="container">
                <div class="logo">
                    <a href="<?= home_url(); ?>">
                        <?php
                            if( has_custom_logo() ) {
                                $custom_logo = wp_get_attachment_image_src( get_theme_mod('custom_logo'), 'full' );
                                $logo_url = $custom_logo[0];
                            } else $logo_url = get_bloginfo('template_url') . '/img/logo@2x.png';
                        ?>
                        <img src="<?= $logo_url; ?>" alt="<?php bloginfo('name'); ?>">
                    </a>
                </div>
            
                <div class="mobile-menu-toggle">
                    <span></span>
                </div>
            
                <?php wp_nav_menu(array(
                    'theme_location'  => 'main-menu',
                    'menu'            => 'Main Menu',
                    'container'       => 'nav',
                    'container_class' => 'main-nav desktop',
                    'container_id'    => false,
                    'items_wrap'      => '<ul>%3$s</ul>',
                    'depth'           => 1
                )); ?>
    
                <div class="mobile-menu-wrap">
                    <div class="mobile-menu-box">
                        <?php wp_nav_menu(array(
                            'theme_location'  => 'main-menu',
                            'menu'            => 'Main Menu',
                            'container'       => false,
                            'menu_class'      => 'mobile-menu',
                            'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
                            'depth'           => 1
                        )); ?>
                    </div>
                    <div class="mobile-menu-overlay"></div>
                </div>
        
            </div>
        </header>
