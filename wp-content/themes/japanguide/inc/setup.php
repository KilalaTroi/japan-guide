<?php if ( ! defined('APP_PATH')) die ('Bad requested!');

/**
 * Enqueue scripts and styles.
 **/
function setup_scripts() {
    // Styles
    wp_enqueue_style('main-style', ASSETS_PATH.'css/app.css', array(), null);

    // Scripts
    wp_enqueue_script('TweenMax', ASSETS_PATH.'js/TweenMax.min.js', array('jquery'), null, true);
    wp_enqueue_script('ScrollMagic', ASSETS_PATH.'js/ScrollMagic.min.js', array('jquery'), null, true);
    wp_enqueue_script('animationGsap', ASSETS_PATH.'js/animation.gsap.min.js', array('jquery'), null, true);
    wp_enqueue_script('debugScrollMagic', ASSETS_PATH.'js/debug.addIndicators.min.js', array('jquery'), null, true);
    wp_enqueue_script('main-script', ASSETS_PATH.'js/app.js', array('jquery'), null, true);

    /* array with elements to localize in scripts */
    $script_localization = array(
        'ajax_url' => admin_url( 'admin-ajax.php' ),
        'site_url' => get_site_url()
    );
    wp_localize_script('main-script', 'script_loc', $script_localization);
}
add_action( 'wp_enqueue_scripts', 'setup_scripts' );

/**
 * Default setup.
 **/
function default_setup(){
    register_nav_menus( array(
        'default_main_menu' => __('Main Menu', DOMAIN),
        'helpful_menu' => __('helpful links', DOMAIN)
    ) );

    add_theme_support( 'post-thumbnails' );
    add_post_type_support( 'page', 'excerpt' );

    // add_image_size
    add_image_size('feature-image', 280, 200, true);
}
add_action('init', 'default_setup');