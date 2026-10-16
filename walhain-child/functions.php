<?php

function walhain_enqueue_assetsChild()
{
    wp_enqueue_style(
        'main-style-child',
        get_stylesheet_directory_uri() . "/assets/style.css",
        [],
        WEBSITE_VERSION
    );

    wp_enqueue_script(
        'script-js-child',
        get_stylesheet_directory_uri() . "/assets/script.js",
        [],
        WEBSITE_VERSION,
        true
    );
}
add_action('wp_enqueue_scripts', 'walhain_enqueue_assetsChild');

require __DIR__ . '/include/blocks.php';
