<?php

define("WEBSITE_VERSION", '1.2.0');

function walhain_setup()
{

    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', [
    'search-form',
    'comment-form',
    'comment-list',
    'gallery',
    'caption',
    'style',
    'script',
    ]);
}
add_action('after_setup_theme', 'walhain_setup');

function walhain_enqueue_assets()
{
     wp_enqueue_style(
        'main-font',
        get_template_directory_uri() . "/assets/fonts/fonts.css",
        [],
        WEBSITE_VERSION
    );

    wp_enqueue_style(
        'main-style',
        get_template_directory_uri() . "/assets/style/css/style.css",
        [],
        WEBSITE_VERSION
    );

    wp_enqueue_script(
        'main-js',
        get_template_directory_uri() . "/assets/js/main.js",
        ["jquery"],
        WEBSITE_VERSION,
    );
}
add_action('wp_enqueue_scripts', 'walhain_enqueue_assets');
