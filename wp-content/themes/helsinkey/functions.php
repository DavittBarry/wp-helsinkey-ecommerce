<?php
function enqueue_helsinkey_styles() {
    wp_enqueue_style( 'helsinkey-style', get_template_directory_uri() . '/style.css', array(), '1.0.0' );
}
add_action( 'wp_enqueue_scripts', 'enqueue_helsinkey_styles' );
?>
