<?php

function turistik_scripts() {
    wp_enqueue_style('libs', get_template_directory_uri() . '/assets/css/libs.min.css');
    wp_enqueue_style('main', get_template_directory_uri() . '/assets/css/main.css');
    wp_enqueue_style('media', get_template_directory_uri() . '/assets/css/media.css');

    wp_deregister_script('jquery');
    wp_register_script('jquery', 'https://code.jquery.com/jquery-2.2.4.min.js');
    wp_enqueue_script('jquery');
    wp_enqueue_script('mains-turist', '/assets/js/main.js');
}

add_action('wp_enqueue_scripts', 'turistik_scripts');

function turistik_setup() {
    add_theme_support('title-tag');

    register_nav_menus(
        array(
            'header_menu' => 'Header Menu',
            'footer_menu' => 'Footer Menu',
        )
    );
}

add_action('after_setup_theme', 'turistik_setup');
