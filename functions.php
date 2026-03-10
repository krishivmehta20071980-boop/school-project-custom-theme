<?php
// Enqueue theme scripts
function school_theme_scripts() {

    // Only load scroll animation JS on the front page
    if ( is_front_page() ) {

        wp_enqueue_script(
            'scroll-animation', // Handle
            get_template_directory_uri() . '/scroll-animation.js', // Path to your JS file
            array(), // Dependencies
            null, // Version (null = no version)
            true // Load in footer
        );

    }

    // You can enqueue other theme scripts/styles here if needed
    wp_enqueue_style(
        'school-theme-style',
        get_stylesheet_uri(),
        array(),
        wp_get_theme()->get('Version')
    );
}

add_action('wp_enqueue_scripts', 'school_theme_scripts');
?>