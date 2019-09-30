<?php if (!defined('APP_PATH')) die ('Bad requested!');

if (!function_exists('create_destinations')) {

    function create_destinations() {

        $labels = array(
            'name' => __('Destinations', DOMAIN),
            'singular_name' => __('Destination', DOMAIN),
            'add_new' => __('Add New', DOMAIN),
            'add_new_item' => __('Add New Destination', DOMAIN),
            'edit_item' => __('Edit Destination', DOMAIN),
            'new_item' => __('New Destination', DOMAIN),
            'view_item' => __('View Destination', DOMAIN),
            'search_items' => __('Search Destination', DOMAIN),
            'not_found' => __('No destinations found', DOMAIN),
            'not_found_in_trash' => __('No destinations found in Trash', DOMAIN),
            'parent_item_colon' => 'Parent Destinations',
        );


        $args = array(
            'labels' => $labels,
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'query_var' => true,
            'has_archive' => false,
            'capability_type' => 'post',
            'hierarchical' => true,
            'menu_position' => 5,
            'supports' => array('title', 'revisions', 'editor'),
            'menu_icon' => 'dashicons-location-alt',
            'rewrite' => array('slug' => __('destination', DOMAIN))
        );

        register_post_type('destinations', $args);
    }
}

add_action('init', 'create_destinations');


if (!function_exists('create_destination_taxonomies')) {
    function create_destination_taxonomies() {
        register_taxonomy(
            'regions',
            'destinations',
            array(
                'labels' => array(
                    'name' => 'Regions of Japan',
                    'add_new_item' => 'Add New Region',
                    'new_item_name' => "New Region"
                ),
                'show_ui' => true,
                'show_tagcloud' => false,
                'hierarchical' => true
            )
        );
    }


    add_action( 'init', 'create_destination_taxonomies', 0 );
}