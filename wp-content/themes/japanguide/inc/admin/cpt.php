<?php if (!defined('APP_PATH')) die ('Bad requested!');

function revcon_change_cat_object() {
    global $wp_taxonomies;
    $labels = &$wp_taxonomies['category']->labels;
    $labels->name = 'Destinations';
    $labels->singular_name = 'Destination';
    $labels->add_new = 'Add Destination';
    $labels->add_new_item = 'Add Destination';
    $labels->edit_item = 'Edit Destination';
    $labels->new_item = 'Destination';
    $labels->view_item = 'View Destination';
    $labels->search_items = 'Search Destination';
    $labels->not_found = 'No Destinations found';
    $labels->not_found_in_trash = 'No Destinations found in Trash';
    $labels->all_items = 'All Destinations';
    $labels->menu_name = 'Destinations';
    $labels->name_admin_bar = 'Destinations';
}
add_action( 'init', 'revcon_change_cat_object' );


if (!function_exists('create_region_taxonomies')) {
    function create_region_taxonomies() {
        register_taxonomy(
            'regions',
            'post',
            array(
                'labels' => array(
                    'name' => 'Regions',
                    'add_new_item' => 'Add New Region',
                    'new_item_name' => "New Region"
                ),
                'show_ui' => true,
                'show_tagcloud' => false,
                'hierarchical' => true,
                'rewrite'           => array('slug' => 'region'),
            )
        );
    }
    add_action( 'init', 'create_region_taxonomies' , 0);
}

if (!function_exists('create_region_topic')) {
    function create_topic_taxonomies() {
        register_taxonomy(
            'topics',
            'post',
            array(
                'labels' => array(
                    'name' => 'Topics',
                    'add_new_item' => 'Add New Topic',
                    'new_item_name' => "New Topic"
                ),
                'show_ui' => true,
                'show_tagcloud' => false,
                'hierarchical' => true,
                'rewrite'           => array('slug' => 'topic'),
            )
        );
    }
    add_action( 'init', 'create_topic_taxonomies' , 0);
}
