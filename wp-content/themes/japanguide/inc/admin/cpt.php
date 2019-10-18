<?php if (!defined('APP_PATH')) die ('Bad requested!');

// if (!function_exists('create_destinations')) {

//     function create_destinations() {

//         $labels = array(
//             'name' => __('Destinations', DOMAIN),
//             'singular_name' => __('Destination', DOMAIN),
//             'add_new' => __('Add New', DOMAIN),
//             'add_new_item' => __('Add New Destination', DOMAIN),
//             'edit_item' => __('Edit Destination', DOMAIN),
//             'new_item' => __('New Destination', DOMAIN),
//             'view_item' => __('View Destination', DOMAIN),
//             'search_items' => __('Search Destination', DOMAIN),
//             'not_found' => __('No destinations found', DOMAIN),
//             'not_found_in_trash' => __('No destinations found in Trash', DOMAIN),
//             'parent_item_colon' => 'Parent Destinations',
//         );


//         $args = array(
//             'labels' => $labels,
//             'public' => true,
//             'publicly_queryable' => true,
//             'show_ui' => true,
//             'query_var' => true,
//             'has_archive' => false,
//             'capability_type' => 'post',
//             'hierarchical' => true,
//             'menu_position' => 5,
//             'supports' => array('title', 'revisions', 'editor'),
//             'menu_icon' => 'dashicons-location-alt',
//             'rewrite' => array('slug' => __('destination', DOMAIN))
//         );

//         register_post_type('destinations', $args);
//     }
// }

// add_action('init', 'create_destinations');


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
                'rewrite'           => array('slug' => pll__('slug-taxonomy-region')),
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
                'rewrite'           => array('slug' => pll__('slug-taxonomy-topic')),
            )
        );
    }
    add_action( 'init', 'create_topic_taxonomies' , 0);
}
