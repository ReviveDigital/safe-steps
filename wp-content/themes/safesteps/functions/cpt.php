<?php
add_action('init', 'stories');
function stories() {
    $labels = array(
        'name' => __('Survivors Stories'),
        'singular_name'  => __('Survivors Stories'),
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => false,
        'menu_icon' => 'dashicons-admin-users',
        'menu_position' => 5,
        'rewrite' => array('slug' => 'survivors-stories', 'with_front' => false),
        'supports' => array( 'title','thumbnail', 'editor'),
    );

    register_post_type('stories', $args);
}