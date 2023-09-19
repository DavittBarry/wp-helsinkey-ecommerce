<?php
require_once get_template_directory() . '/class-wp-tailwind-navwalker.php';

function enqueue_helsinkey_styles() {
    wp_enqueue_style('helsinkey-tailwind', get_template_directory_uri() . '/dist/styles.css', array(), '1.0.0');
}
add_action('wp_enqueue_scripts', 'enqueue_helsinkey_styles');

function helsinkey_add_menu_class($classes, $item, $args) {
    if($args->theme_location === 'header-menu') {
        $classes[] = 'text-sm px-3 inline-block';
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'helsinkey_add_menu_class', 10, 3);

add_action(
    'save_post', 'set_front_page_template_automatically'
);

function set_front_page_template_automatically($post_id) {
    if (get_post($post_id)->post_title === 'Etusivu') {
        update_post_meta($post_id, '_wp_page_template', 'template-front-page.php');
    }
}


function helsinkey_register_menus() {
    register_nav_menus(
        array(
            'header-menu' => __( 'Header Menu', 'helsinkey' ),
            'footer-menu' => __( 'Footer Menu', 'helsinkey' )
        )
    );
}
add_action( 'init', 'helsinkey_register_menus' );

function helsinkey_theme_setup() {
    add_theme_support('post-thumbnails');
    
    add_theme_support('custom-logo');
    
    add_theme_support('html5', ['comment-list', 'comment-form', 'search-form']);
}
add_action('after_setup_theme', 'helsinkey_theme_setup');

function helsinkey_enqueue_scripts() {
    wp_enqueue_script('helsinkey-scripts', get_template_directory_uri() . '/assets/js/main.js', ['jquery'], null, true);
}
add_action('wp_enqueue_scripts', 'helsinkey_enqueue_scripts');

function helsinkey_customize_register($wp_customize) {
}
add_action('customize_register', 'helsinkey_customize_register');

function add_google_fonts() {

    wp_register_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;600&display=swap', array(), null);

    wp_enqueue_style('google-fonts');
}

add_action('wp_enqueue_scripts', 'add_google_fonts');


add_action('wp_enqueue_scripts', 'add_google_fonts');
