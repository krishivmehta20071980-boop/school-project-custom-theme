<?php

function school_scroll_animation() {

    if ( is_front_page() ) {

        wp_enqueue_script(
            'scroll-animation',
            get_template_directory_uri() . '/js/scroll-animation.js',
            array(),
            null,
            true
        );

    }

}

add_action('wp_enqueue_scripts', 'school_scroll_animation');