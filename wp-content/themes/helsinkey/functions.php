<?php
function enqueue_helsinkey_styles() {
    wp_enqueue_style('helsinkey-style', get_template_directory_uri() . '/style.css', array(), '1.0.0');
}
add_action('wp_enqueue_scripts', 'enqueue_helsinkey_styles');

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
?>