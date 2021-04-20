<?php
add_theme_support('post-thumbnails');

/** * Completely Remove jQuery From WordPress */
function my_init() {
    if (!is_admin()) {
        wp_deregister_script('jquery');
        wp_register_script('jquery', false);
    }
}
add_action('init', 'my_init');


function jaback_scripts()
{
    /* ----------- Stylesheets --------------- */
    wp_enqueue_style('main-style', get_template_directory_uri() . '/css/style.min.css');

    /* ----------- Stylesheets --------------- */

    /* ----------- Javascripts --------------- */
    wp_enqueue_script('jquery-js', 'https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js', array(), null, false);
    wp_enqueue_script('vue-js', 'https://cdn.jsdelivr.net/npm/vue@2.6.12', array(), null, false);
    wp_enqueue_script('wavesurfer-js', 'https://unpkg.com/wavesurfer.js', array(), null, false);
    wp_enqueue_script('typewriter-js', 'https://unpkg.com/typewriter-effect@latest/dist/core.js', array(), null, true);
    wp_enqueue_script('main-js', get_theme_file_uri('js/app.js'), array(), null, true);
    /* ----------- Javascripts --------------- */
}
add_action('wp_enqueue_scripts', 'jaback_scripts');


