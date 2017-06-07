    </div>

    <footer class="footer">
        <div class="container">
            <div class="footer-logo">
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

            <?php wp_nav_menu(array(
                'theme_location'  => 'footer-menu',
                'menu'            => 'Footer Menu',
                'container'       => false,
                'menu_class'      => 'footer-menu',
                'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
                'depth'           => 1
            )); ?>

            <ul class="footer-info">
                <?php echo get_field('copyright', 'option') ? '<li>'.get_field('copyright', 'option').'</li>' : ''; ?>
                <?php echo get_field('phone', 'option') ? '<li>'.get_field('phone', 'option').'</li>' : ''; ?>
            </ul>
        </div>
    </footer>

    <?php wp_footer(); ?>
</body>
</html>