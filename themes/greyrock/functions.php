<?php
// loading styles and scripts
function load_style_script(){
    wp_enqueue_style('font-awesome.min', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', array(), '4.7.0');
    wp_enqueue_style('swiper', '//cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.1/css/swiper.css', array(), '3.4.1' );
    wp_enqueue_style('screen', get_template_directory_uri() . '/assets/css/screen.css', array(), null );
    wp_enqueue_style('style', get_stylesheet_uri(), array(), null );

    wp_enqueue_script('modernizr.min', '//cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js', array(), '2.8.3', false );
    wp_enqueue_script('swiper.min', '//cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.1/js/swiper.min.js', array(), '3.4.1', true );
    wp_enqueue_script('player.vimeo.api', '//player.vimeo.com/api/player.js', array(), null, true );
    wp_enqueue_script('jquery.viewportchecker.min', get_template_directory_uri() . '/assets/js/jquery.viewportchecker.min.js', array('jquery'), null, true );
    wp_enqueue_script('iphone-inline-video.min', get_template_directory_uri() . '/assets/js/iphone-inline-video.min.js', array('jquery'), null, true );
    wp_enqueue_script('smooth-scroll', get_template_directory_uri() . '/assets/js/smooth-scroll.min.js', array('jquery'), null, true );
    wp_enqueue_script('magnifi', get_template_directory_uri() . '/assets/js/magnifi.js', array('jquery'), null, true );
    wp_enqueue_script('mainJs', get_template_directory_uri() . '/assets/js/custom/mainJs.js', array('jquery'), null, true );
}
add_action('wp_enqueue_scripts', 'load_style_script');


// loading styles and scripts for admin panel
function load_admin_style_script(){
    wp_enqueue_style('custom-wp-admin-style', get_template_directory_uri() . '/assets/css/custom-wp-admin-style.css', array('acf-input') );
}
add_action('admin_enqueue_scripts', 'load_admin_style_script');


// add ie conditional html5 shiv to header
function add_ie_html5_shiv () {
    global $is_IE;
    if ($is_IE) {
        echo '<!--[if lt IE 9]>';
        echo '<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>';
        echo '<![endif]-->';
    }
}
add_action('wp_head', 'add_ie_html5_shiv');


// logo at the entrance to the admin panel
function my_custom_login_logo(){
    echo '<style type="text/css">
    h1 a {height:20px !important; width:207px !important; background-size:contain !important; background-image:url('.get_bloginfo("template_url").'/img/logo@2x.png) !important;}
    </style>';
}
add_action('login_head', 'my_custom_login_logo');

add_filter( 'login_headerurl', create_function('', 'return get_home_url();') );
add_filter( 'login_headertitle', create_function('', 'return false;') );


// когда введены неправильный логин или пароль, никакой информации, объясняющей ситуацию, не появится!
add_filter('login_errors',create_function('$a', "return null;"));


// delete unnecessary items in wp_head
remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action( 'wp_head', 'feed_links', 2 );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'index_rel_link' );
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 );
remove_action( 'wp_head', 'wp_generator' );


// удаление оборачиваемого тега <p> из картинок в контенте
function filter_ptags_on_images($content){
   return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}
add_filter('the_content', 'filter_ptags_on_images');


// automatic generation of the tag <title>
add_theme_support( 'title-tag' );
// adding html5 markup
add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );

// support custom logo
add_theme_support( 'custom-logo', array(
    'flex-height' => true,
    'flex-width'  => true
) );
add_theme_support( 'custom-logo' );


// support thumbnails
if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails' );
}


// support menus
if ( function_exists( 'register_nav_menus' ) ) {
    register_nav_menus(array(
        'main-menu'     => 'Main Menu',
        'footer-menu'   => 'Footer Menu'
    ));
}
function main_menu(){
    wp_list_pages('title_li=&');
}



/* Хак на перезапись параметра guid при публикации или обновлении поста в админке (записывается пермалинк в текущей структуре)
--------------------------------------------------------------------------------------------------------------------------------- */
function guid_write( $id ){
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE  ) return false;

    global $wpdb;

    if( $id = (int) $id )
        $wpdb->query("UPDATE $wpdb->posts SET guid='". get_permalink($id) ."' WHERE ID=$id LIMIT 1");
}
add_action ('save_post', 'guid_write', 100);



// Запрещаем доступ к редактору файлов по прямой ссылке wp-admin/theme-editor.php:
function disable_editing_theme() {
    if (stripos($_SERVER['PHP_SELF'], '/wp-admin/theme-editor.php')) :
        wp_redirect(admin_url());
        exit;
    endif;
}
add_action('admin_init', 'disable_editing_theme', 999);

// Удаляем пункт меню Редактор из меню админки:
function remove_theme_editor_page() {
    remove_submenu_page('themes.php', 'theme-editor.php');
}
add_action('admin_menu', 'remove_theme_editor_page', 999);



// for Options Page
if (function_exists('acf_set_options_page_menu')){
    acf_set_options_page_menu('Theme Options');
}
