<?php

function school_theme_scripts() {

    if ( is_front_page() ) {

        wp_enqueue_script(
            'scroll-animation',
            get_template_directory_uri() . '/scroll-animation.js',
            array(),
            null,
            true
        );

    }

}

add_action('wp_enqueue_scripts', 'school_theme_scripts');