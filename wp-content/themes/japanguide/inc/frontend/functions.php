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
        $term_id = '1238';
        if (LANGUAGE_SLUG === 'ja') {
            $term_id = '1258';
        }
        $args = array(
            'hide_empty' => false,
            'parent'    => $term_id,
            'orderby' => 'term_order',
            'order' => 'ASC',
            'number' => 8,
        );
        $destinations_top = get_terms('category', $args);
        set_transient($destinations_topL, $destinations_top, 30 * DAY_IN_SECONDS);
    }
    return $destinations_top;
}

// get map desinations
function get_destinations_map()
{
    $destinationsL = 'destination_' . LANGUAGE_SLUG;

    if (false === ($destinations  = get_transient($destinationsL))) {
        $include = wpedu_get_option('option_map');
        $args = array(
            'hide_empty' => false,
            'orderby' => 'term_order',
            'order' => 'ASC',
            'include'       => $include,
        );
        $destinations = get_terms('category', $args);
        set_transient($destinationsL, $destinations, 30 * DAY_IN_SECONDS);
    }
    return $destinations;
}

// get top categories
function get_categories_top()
{
    $categoriesL = 'category_' . LANGUAGE_SLUG;
    if (false === ($categories  = get_transient($categoriesL))) {
        $term_id = '1240';
        if (LANGUAGE_SLUG === 'ja') {
            $term_id = '1266';
        }
        $args = array(
            'hide_empty' => false,
            'parent'    => $term_id,
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

function get_breadcrumb()
{
    if (function_exists('yoast_breadcrumb')) {
        return yoast_breadcrumb('<section id="breadcrumb"><div class="container"><div class="row"><div class="breadcrumb" class="my-5">', '</div></div></div></section>', false);
    }
    return '';
}

function get_short_text($obj, $length)
{
    $str = $obj;
    if ($length < strlen($str)) {
        $count = strpos($str, ' ', $length) === false ? strlen($str) : strpos($str, ' ', $length);
        $str = substr($str, 0, $count) . '...';
    }
    return $str;
}

function get_primary_taxonomy($id = NULL, $taxonomy = 'category')
{
    if (NULL === $id || empty($id)) {
        $id = get_the_ID();
    }
    $primary = get_post_meta($id, '_yoast_wpseo_primary_category', true);
    if (NULL === $primary || empty($primary)) {
        $taxonomies = get_the_terms(get_the_ID(), $taxonomy);
        if (isset($taxonomies)) {
            return get_term($taxonomies[0]->term_id, $taxonomy);
        }
    }
    return get_term($primary, $taxonomy);
}

function get_category_type($id= NULL,$type= 'destination'){
    if (NULL === $id || empty($id)) {
        $id = get_the_ID();
    }
    $categories = get_the_category($id);

    if($type === 'interest'){
        foreach($categories as $category){
            if(in_array($category->category_parent, array(1240,1258)) ){
                $arr[] = $category;
            }
        }
    }else{
        foreach($categories as $category){
            if(in_array($category->category_parent, array(1238,1260)) ){
                $arr[] = $category;
            }
        }
    }
    return $arr;
}


function wpedu_translate(){
	/**
	 * Key = Name
	 * Value = String
	 */
	$arr = array(
        'Điểm đến' 	                    => 'Destination',
        'Các điểm đến'                  => 'Destinations',
        'được yêu thích nhất' 	        => 'interests',
        'Chủ đề'                        => 'Topic',
        'phổ biến'                      => 'popular',
        'Tin tức du lịch Nhật Bản'      => 'Japan travel news',
        'Chủ đề phổ biến'               => 'Popular topic',
        'Bạn yêu thích điểm đến nào ở Nhật Bản?'  => 'What is your favorite destination in Japan?',
        'Bài viết'                      => 'Post',
        'về'                            => 'about',
        'Khám phá'                      => 'Discover',
        'Bài viết cùng chủ đề'          => 'Posts same topic',
        'Không tìm thấy trang'          => 'Page not found',
        'Trang bạn đang tìm kiếm không thể tìm thấy.' => 'The page you were looking for could not be found.',
        'Trở về trang chủ'              => 'Go back to home',
        'Dưới đây là một số liên kết hữu ích'   => 'Here are some helpful links',
        'Xem thêm'   => 'More',
	);

	foreach( $arr as $key => $value ) {
		pll_register_string($key, $value, 'translate-custom');
	}
}
add_action( 'after_setup_theme', 'wpedu_translate' );