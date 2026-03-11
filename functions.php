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

    // Enqueue AOS CSS (The animations)
    wp_enqueue_style('aos-css', 'https://unpkg.com/aos@2.3.1/dist/aos.css');

    // Enqueue AOS JS (The logic)
    wp_enqueue_script('aos-js', 'https://unpkg.com/aos@2.3.1/dist/aos.js', array(), false, true);

    // Initialize AOS (The "start" button)
    wp_add_inline_script('aos-js', 'AOS.init();');
}

add_action('wp_enqueue_scripts', 'school_theme_scripts');


/**
 * 1. Register Custom Post Type: Students
 */
function school_register_student_cpt() {
    $args = array(
        'labels'      => array( 'name' => 'Students', 'singular_name' => 'Student' ),
        'public'      => true,
        'has_archive' => true,
        'show_in_rest'=> true,
        'menu_icon'   => 'dashicons-id-alt',
        'supports'    => array( 'title', 'editor', 'thumbnail' ),
        'template'    => array(
            array( 'core/paragraph', array( 'placeholder' => 'Add student name' ) ), // Rubric specific
            array( 'core/paragraph', array( 'placeholder' => 'Add student bio...' ) ),
            array( 'core/button', array( 'text' => 'View Portfolio' ) ),
        ),
        'template_lock' => 'all',
    );
    register_post_type( 'student', $args );
}
add_action( 'init', 'school_register_student_cpt' );

/**
 * 2. Register Taxonomy: Program (for Students)
 */
function school_register_program_taxonomy() {
    register_taxonomy( 'program', 'student', array(
        'labels'       => array( 'name' => 'Programs', 'singular_name' => 'Program' ),
        'hierarchical' => true, // Allows for "Parent/Child" relationship like categories
        'show_in_rest' => true,
    ));
}
add_action( 'init', 'school_register_program_taxonomy' );

/**
 * 3. Custom Image Sizes
 */
add_image_size( 'student-headshot', 400, 400, true );
add_image_size( 'student-card', 600, 400, true );

/**
 * 4. Register Custom Post Type: Staff
 */
function school_register_staff_cpt() {
    register_post_type( 'staff', array(
        'labels'      => array( 'name' => 'Staff', 'singular_name' => 'Staff Member' ),
        'public'      => true,
        'show_in_rest'=> true,
        'menu_icon'   => 'dashicons-businessman',
        'supports'    => array( 'title', 'editor', 'thumbnail' ),
        'template'    => array(
            array( 'core/paragraph', array( 'placeholder' => 'Add staff name' ) ), // Rubric specific
            array( 'core/paragraph', array( 'placeholder' => 'Job title' ) ),
            array( 'core/paragraph', array( 'placeholder' => 'Email' ) ),
        ),
        'template_lock' => 'all',
    ));
}
add_action( 'init', 'school_register_staff_cpt' );

/**
 * 5. Staff Taxonomy with Restricted Capabilities
 */
function school_register_staff_taxonomy() {
    register_taxonomy( 'staff_dept', 'staff', array(
        'labels' => array( 'name' => 'Departments' ),
        'hierarchical' => true,
        'show_in_rest' => true,
        'capabilities' => array(
            'manage_terms' => 'administrator', // Only Admin can add/delete terms
            'edit_terms'   => 'administrator',
            'delete_terms' => 'administrator',
            'assign_terms' => 'edit_posts',    // Staff can only assign them to posts
        ),
    ));
}
add_action( 'init', 'school_register_staff_taxonomy' );

/**
 * 6. AOS Animation Block
 */
add_action( 'init', function() {
    // Based on your terminal: aos-block -> build -> aos-block
    $path = __DIR__ . '/aos-block/build/aos-block';

    if ( file_exists( $path . '/block.json' ) ) {
        register_block_type( $path );
    }
} );