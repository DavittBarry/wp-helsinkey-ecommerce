<?php
// phpcs:ignoreFile PEAR.Commenting.FileComment.MissingVersion
/**
 * Helsinkey Theme Functions
 *
 * @package  Helsinkey
 * @category WordPress_Theme
 * @license  GPL-2.0+
 * @author   Davitt Barry <davittbarry333@gmail.com>
 * @link     http://davittportfolio.com
 * @version  1.0.0
 * @requires PHP 8.1
 */

require_once get_template_directory() . '/class-wp-tailwind-navwalker.php';

/**
 * Enqueue Helsinkey styles.
 *
 * @return void
 */
function Helsinkey_Enqueue_styles()
{
    wp_enqueue_style(
        'helsinkey-tailwind',
        get_template_directory_uri() . '/dist/styles.css',
        array(),
        '1.0.0'
    );
}

add_action('wp_enqueue_scripts', 'Helsinkey_Enqueue_Styles');

/**
 * Add menu class.
 *
 * @param array  $classes Classes.
 * @param object $item    Item.
 * @param object $args    Args.
 *
 * @return array
 */
function Helsinkey_Add_Menu_class($classes, $item, $args)
{
    if ($args->theme_location === 'header-menu') {
        $classes[] = 'text-sm px-3 inline-block';
    }
    return $classes;
}

add_filter('nav_menu_css_class', 'Helsinkey_Add_Menu_Class', 10, 3);

function my_custom_image_sizes() {
    add_image_size('my_custom_size', 700, 500, true);
}
add_action('after_setup_theme', 'my_custom_image_sizes');


/**
 * Register menus.
 *
 * @return void
 */
function Helsinkey_Register_menus()
{
    register_nav_menus(
        array(
            'header-menu' => __('Header Menu', 'helsinkey'),
            'footer-menu' => __('Footer Menu', 'helsinkey')
        )
    );
}

add_action('init', 'Helsinkey_Register_Menus');

/**
 * Theme setup.
 *
 * @return void
 */
function Helsinkey_Theme_setup()
{
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('html5', ['comment-list', 'comment-form', 'search-form']);
}

add_action('after_setup_theme', 'Helsinkey_Theme_Setup');

function custom_woocommerce_quantity_input_args($args, $product) {
    $args['input_attrs'] = array(
        'style' => 'color: black; background-color: white;'
    );
    return $args;
}
add_filter('woocommerce_quantity_input_args', 'custom_woocommerce_quantity_input_args', 10, 2);


/**
 * Enqueue scripts.
 *
 * @return void
 */
function Helsinkey_Enqueue_scripts()
{
    wp_enqueue_script(
        'helsinkey-scripts',
        get_template_directory_uri() . '/assets/js/main.js',
        ['jquery'],
        null,
        true
    );
}

add_action('wp_enqueue_scripts', 'Helsinkey_Enqueue_Scripts');

/**
 * Add Google Fonts.
 *
 * @return void
 */
function Helsinkey_Add_Google_fonts()
{
    wp_register_style(
        'google-fonts',
        'https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;600&display=swap',
        array(),
        null
    );
    wp_enqueue_style('google-fonts');
}

add_action('wp_enqueue_scripts', 'Helsinkey_Add_Google_Fonts');

function load_single_template($template) {
    global $post;

    if ($post->post_type === 'post') {
        return locate_template('single-blog.php');
    } elseif ($post->post_type === 'events') {
        return locate_template('single-events.php');
    } elseif ($post->post_type === 'product') {
        return locate_template('single-product.php');
    }

    return $template;
}

add_filter('single_template', 'load_single_template');

function create_event_post_type() {
    register_post_type('events',
        array(
            'labels' => array(
                'name' => __('Events'),
                'singular_name' => __('Event')
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'events'),
            'show_in_rest' => true,
            'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'comments')
        )
    );
}
add_action('init', 'create_event_post_type');

function create_artists_post_type() {
    register_post_type('artists',
        array(
            'labels' => array(
                'name' => __('Artists'),
                'singular_name' => __('Artist')
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'artists'),
            'show_in_rest' => true,
            'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'comments')
        )
    );
}

add_action('init', 'create_artists_post_type');