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

add_filter('pll_the_language_link', function($url, $slug) {
    if ($slug === 'en') {
        // Append 'page_id=267' to the English URL
        $url = add_query_arg('page_id', '267', $url);
    }
    return $url;
}, 10, 2);

function disable_plugin_deactivation( $actions, $plugin_file, $plugin_data, $context ) {
    unset( $actions['edit'] );
    unset( $actions['deactivate'] );
    unset( $actions['delete'] );
    return $actions;
}
add_filter( 'plugin_action_links', 'disable_plugin_deactivation', 10, 4 );


function disable_plugin_activation() {
    if ( is_admin() && !defined('DOING_AJAX') ) {
        wp_die('Plugin activation is disabled.');
    }
}
add_action( 'activate_plugin', 'disable_plugin_activation' );


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
// debugging function
function debug_to_console($data) {
    $output = $data;
    if (is_array($output)) {
        $output = implode(',', $output);
    }
    echo "<script>console.log('Debug: " . $output . "');</script>";
}

// Redirect function
function redirect_non_admin_users() {
    if (is_admin() && !current_user_can('administrator') && !(defined('DOING_AJAX') && DOING_AJAX)) {
        debug_to_console("Redirecting to custom page");
        wp_redirect(get_permalink(160));
        exit;
    }
}
add_action('admin_init', 'redirect_non_admin_users');

add_action('woocommerce_cart_updated', 'custom_cart_update_redirect');

function custom_cart_update_redirect() {
    if (is_page_template('woocommerce-ostoskori.php')) {
        wp_safe_redirect(get_permalink(201));
        exit();
    }
}

function remove_single_product_notices() {
    if (is_product()) {
        remove_action('woocommerce_before_single_product', 'wc_print_notices', 10);
    }
}
add_action('wp', 'remove_single_product_notices');


add_action( 'init', 'update_user_profile' );

function update_user_profile() {
    if ( isset( $_POST['action'] ) && 'update-user' == $_POST['action'] ) {
        $current_user = wp_get_current_user();
        
        if ( isset( $_POST['first_name'] ) ) {
            update_user_meta( $current_user->ID, 'first_name', sanitize_text_field( $_POST['first_name'] ) );
        }

        if ( isset( $_POST['last_name'] ) ) {
            update_user_meta( $current_user->ID, 'last_name', sanitize_text_field( $_POST['last_name'] ) );
        }

        if ( isset( $_POST['email'] ) ) {
            $new_email = sanitize_email( $_POST['email'] );
            if ( is_email( $new_email ) ) {
                wp_update_user( array( 'ID' => $current_user->ID, 'user_email' => $new_email ) );
            }
        }
    }
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

add_filter('template_include', 'load_language_specific_single_product_template');

function load_language_specific_single_product_template($template) {
    if (is_product()) {
        $current_language = function_exists('pll_current_language') ? pll_current_language() : 'default';
        
        if ($current_language === 'en') {
            $new_template = locate_template(array('single-product-english.php'));
            if ('' != $new_template) {
                return $new_template;
            }
        }
    }
    return $template;
}

add_filter('template_include', 'load_language_specific_single_artist_template');

function load_language_specific_single_artist_template($template) {
    if (is_singular('artists')) {
        $current_language = function_exists('pll_current_language') ? pll_current_language() : 'default';
        
        if ($current_language === 'en') {
            $new_template = locate_template(array('single-artists-english.php'));
            if ('' != $new_template) {
                return $new_template;
            }
        }
    }
    return $template;
}

add_filter('template_include', 'load_language_specific_single_event_template');

function load_language_specific_single_event_template($template) {
    if (is_singular('events')) {
        $current_language = function_exists('pll_current_language') ? pll_current_language() : 'default';
        
        if ($current_language === 'en') {
            $new_template = locate_template(array('single-events-english.php'));
            if ('' != $new_template) {
                return $new_template;
            }
        }
    }
    return $template;
}

function load_english_marketplace_single_template() {
    global $wp_query;

    $current_language = function_exists('pll_current_language') ? pll_current_language() : 'default';

    if (is_single() && get_post_type() === 'tori' && $current_language === 'en') {
        $new_template_path = get_template_directory() . '/single-marketplace-english.php';

        if (file_exists($new_template_path)) {
            $wp_query->is_404 = false;
            $wp_query->is_single = true;
            $wp_query->is_page = false;
            include($new_template_path);
            exit;
        }
    }
}
add_action('template_redirect', 'load_english_marketplace_single_template');

add_filter('template_include', 'load_language_specific_single_blog_template');

function load_language_specific_single_blog_template($template) {
    if (is_singular('post')) {
        $current_language = function_exists('pll_current_language') ? pll_current_language() : 'default';
        
        if ($current_language === 'en') {
            $new_template = locate_template(array('single-blog-english.php'));
            if ('' != $new_template) {
                return $new_template;
            }
        }
    }
    return $template;
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

function load_single_find_a_musician_template($template) {
    global $post;

    if ($post->post_type === 'etsi_soittajaa') {
        $current_language = function_exists('pll_current_language') ? pll_current_language() : 'default';
        
        if ($current_language === 'en') {
            $new_template_path = get_template_directory() . '/single-find-a-musician-page-english.php';
        } else {
            $new_template_path = get_template_directory() . '/single-etsi_soittajaa.php';
        }

        if (file_exists($new_template_path)) {
            return $new_template_path;
        }
    }
    return $template;
}

add_filter('single_template', 'load_single_find_a_musician_template');

function create_etsi_soittajaa_post_type() {
    register_post_type('etsi_soittajaa',
        array(
            'labels' => array(
                'name' => __('Etsi soittajaa'),
                'singular_name' => __('Etsi soittajaa')
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array('title', 'editor', 'thumbnail'),
        )
    );
}
add_action('init', 'create_etsi_soittajaa_post_type');

add_filter('pll_get_post_types', 'add_my_custom_post_type_translation', 10, 2);

function add_my_custom_post_type_translation($post_types, $is_settings) {
    if ($is_settings) {
        unset($post_types['events']);
        unset($post_types['artists']);
        unset($post_types['product']);
        unset($post_types['tori']);
        unset($post_types['etsi_soittajaa']);
    } else {
        $post_types['events'] = 'events';
        $post_types['artists'] = 'artists';
        $post_types['product'] = 'product';
        $post_types['tori'] = 'tori';
        $post_types['etsi_soittajaa'] = 'etsi_soittajaa';
        
    }
    return $post_types;
}

function create_tori_post_type() {
    register_post_type('tori',
        array(
            'labels' => array(
                'name' => __('Tori'),
                'singular_name' => __('Tori Item')
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'tori'),
            'show_in_rest' => true,
            'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'comments')
        )
    );
}
add_action('init', 'create_tori_post_type');

add_filter('woocommerce_product_single_add_to_cart_text', 'woo_custom_single_add_to_cart_text');

function woo_custom_single_add_to_cart_text() {
    return __('Lisää ostoskoriin', 'woocommerce');
}

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

