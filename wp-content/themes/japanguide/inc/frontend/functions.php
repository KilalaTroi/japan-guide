<?php if (!defined('APP_PATH')) die('Bad requested!');

//adding a body class to a specific page template
add_filter('body_class', 'custom_class');
function custom_class($classes)
{
    $classes[] = 'japan-guide';
    return $classes;
}

//Add active class to wp_nav_menu
function special_nav_class($classes, $item)
{
    if (in_array('current-menu-item', $classes)) {
        $classes[] = 'active';
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'special_nav_class', 10, 2);

function no_img($id, $size = 'thumbnail', $icon = false, $arg = '')
{
    return wp_get_attachment_image_url($id, $size, $icon, $arg);
}

// get top desinations
function get_destinations_top()
{
    $destinations_topL = 'destination_top_' . LANGUAGE_SLUG;
    if (false === ($destinations_top  = get_transient($destinations_topL))) {
        $args = array(
            'hide_empty' => false,
            // 'orderby' => 'term_id',
            // 'order' => 'ASC',
            'number' => 8,
        );
        $destinations_top = get_terms('destinations', $args);
        set_transient($destinations_topL, $destinations_top, 30 * DAY_IN_SECONDS);
    }
    return $destinations_top;
}

// get map desinations
function get_destinations_map()
{
    $destinationsL = 'destination_' . LANGUAGE_SLUG;
    if (false === ($destinations  = get_transient($destinationsL))) {
        $include_ja = array(1021, 1022, 1023, 1024, 1025, 1026, 1027, 1028);
        $include_vi = array(1219, 1221, 1223, 1225, 1227, 1229, 1231, 1233);
        $args = array(
            'hide_empty' => false,
            'orderby' => 'term_id',
            'order' => 'ASC',
            'include'       => array_merge($include_vi, $include_ja),
        );
        $destinations = get_terms('destinations', $args);
        set_transient($destinationsL, $destinations, 30 * DAY_IN_SECONDS);
    }
    return $destinations;
}

// get top categories
function get_categories_top()
{
    $categoriesL = 'category_' . LANGUAGE_SLUG;
    if (false === ($categories  = get_transient($categoriesL))) {
        $args = array(
            'hide_empty' => false,
            'number'            => '8',
            'orderby' => 'term_order',
            'order' => 'ASC',
            'meta_query' => array(
                array(
                    'key' => 'top',
                    'value' => true,
                )
            )
        );
        $categories = get_terms('category', $args);
        set_transient($categoriesL, $categories, 30 * DAY_IN_SECONDS);
    }
    return $categories;
}
