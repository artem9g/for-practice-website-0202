<?php

function _add_javascript() {
    if ( ! is_admin() ) {
        // force all scripts to load in footer
        remove_action('wp_head', 'wp_print_scripts');
        remove_action('wp_head', 'wp_print_head_scripts', 9);
        remove_action('wp_head', 'wp_enqueue_scripts', 1);

        wp_deregister_script('jquery-migrate');
        wp_enqueue_script('jquery');
//        wp_enqueue_script('theme', get_template_directory_uri() . '/assets/dist/js/main.js', null, null, true);
        //custom javascript
        wp_enqueue_script('global', get_template_directory_uri() . '/assets/dist/js/main.js', ['jquery'], filemtime(get_stylesheet_directory() . '/assets/dist/js/main.js'), true); /* This should go first */
        // Additional PHP data that will be accessible in JS files
        $localize_args = [
            'url' => admin_url('admin-ajax.php'),
        ];
        wp_localize_script('global', 'ajax', $localize_args);
    }
}
add_action('wp_enqueue_scripts', '_add_javascript', 100);

function add_stylesheets() {
    // removing all WP css files enqueued by default
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
    wp_dequeue_style('wc-block-style');
    wp_dequeue_style('global-styles');
    wp_dequeue_style('classic-theme-styles');
//    wp_enqueue_style( 'solid', get_template_directory_uri() . '/assets/dist/css/solid.css', null, filemtime( get_stylesheet_directory() . '/assets/dist/css/solid.css' ) );
//    wp_enqueue_style('custom', get_template_directory_uri() . '/assets/dist/css/custom.css', null,  filemtime(get_stylesheet_directory() . '/assets/dist/css/custom.css'));-- шлючила
  //  wp_enqueue_style('custom', get_template_directory_uri() . '/assets/dist/css/custom.css?t=' . time(), null, null);
    wp_enqueue_style('custom', get_template_directory_uri() . '/assets/dist/css/custom.css', null, filemtime(get_stylesheet_directory() . '/assets/dist/css/custom.css'));




}
add_action('wp_enqueue_scripts', 'add_stylesheets');
