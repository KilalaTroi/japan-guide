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
        $term_id = '7';
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

// get post right excludes (artile detail)
function get_post_right(){
    $post_rightL = 'post_right_' . LANGUAGE_SLUG;
    if (false === ($post_right  = get_transient($post_rightL))) {
        $post_right = new WP_Query(
            array(
              'post_type'      => 'post',
              'posts_per_page' => 5,
              'post_status' => 'publish',
            )
          );
        set_transient($post_rightL, $post_right, 30 * DAY_IN_SECONDS);
    }
    return $post_right;
}

function get_taxonomy_type($type="destination",$number = false)
{
    if($type="interest"){
        $term_id = '1240';
        if (LANGUAGE_SLUG === 'ja') {
            $term_id = '1266';
        }
    }else{
        $term_id = '7';
        if (LANGUAGE_SLUG === 'ja') {
            $term_id = '1260';
        }
    }
    $args = array(
        'hide_empty' => false,
        'parent'    => $term_id,
        'number'            => $number,
        'orderby' => 'term_order',
        'order' => 'ASC',
    );

    return get_terms('category', $args);

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

    $str = strip_tags($obj);
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
    $arr = array();
    if($type === 'interest'){
        foreach($categories as $category){
            if(in_array($category->category_parent, array(1240,1258)) ){
                $arr[] = $category;
            }
        }
    }else{
        foreach($categories as $category){
            if(in_array($category->category_parent, array(7,1260)) ){
                $arr[] = $category;
            }
        }
    }
    return $arr;
}

function fellowtuts_wpbs_pagination( $pages = '', $range = 2 ) {
	$showitems = ( $range * 2 ) + 1;
    global $paged;
	if ( empty( $paged ) ) {
		$paged = 1;
	}
	if ( $pages == '' ) {
		global $wp_query;
		$pages = $wp_query->max_num_pages;

		if ( ! $pages ) {
			$pages = 1;
		}
	}

	if ( 1 != $pages ) {
		echo '<nav aria-label="Page navigation" role="navigation">';
		echo '<span class="sr-only">Page navigation</span>';
		echo '<ul class="pagination justify-content-center ft-wpbs">';

		echo '<li class="page-item disabled hidden-md-down d-none d-lg-block"><span class="page-link">' . pll__('Page') .' '. $paged .' '. pll__('of') . ' ' . $pages . '</span></li>';

		if ( $paged > 2 && $paged > $range + 1 && $showitems < $pages ) {
			echo '<li class="page-item"><a class="page-link" href="' . get_pagenum_link( 1 ) . '" aria-label="First Page">&laquo;</a></li>';
		}

		if ( $paged > 1 && $showitems < $pages ) {
			echo '<li class="page-item"><a class="page-link" href="' . get_pagenum_link( $paged - 1 ) . '" aria-label="Previous Page">&lsaquo;</a></li>';
		}

		for ( $i = 1; $i <= $pages; $i++ ) {
			if ( 1 != $pages && ( ! ( $i >= $paged + $range + 1 || $i <= $paged - $range - 1 ) || $pages <= $showitems ) ) {
				echo ( $paged == $i ) ? '<li class="page-item active"><span class="page-link"><span class="sr-only">Current Page </span>' . $i . '</span></li>' : '<li class="page-item"><a class="page-link" href="' . get_pagenum_link( $i ) . '"><span class="sr-only">Page </span>' . $i . '</a></li>';
			}
		}

		if ( $paged < $pages && $showitems < $pages ) {
			echo '<li class="page-item"><a class="page-link" href="' . get_pagenum_link( $paged + 1 ) . '" aria-label="Next Page">&rsaquo;</a></li>';
		}

		if ( $paged < $pages - 1 && $paged + $range - 1 < $pages && $showitems < $pages ) {
			echo '<li class="page-item"><a class="page-link" href="' . get_pagenum_link( $pages ) . '" aria-label="Last Page">&raquo;</a></li>';
		}

		echo '</ul>';
		echo '</nav>';
		// echo '<div class="pagination-info mb-5 text-center">[ <span class="text-muted">Page</span> '.$paged.' <span class="text-muted">of</span> '.$pages.' ]</div>';
	}
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
        'Kết quả tìm kiếm cho:'   => 'search-results',
	);

	foreach( $arr as $key => $value ) {
		pll_register_string($key, $value, 'translate-custom');
	}
}
add_action( 'after_setup_theme', 'wpedu_translate' );


// misha_loadmore_ajax_handler
function misha_loadmore_ajax_handler(){

    $relate_category = new WP_Query(array(
        'post_type'      => 'post',
        'posts_per_page' => 1,
        'lang'           => $_POST['lang'],
        'offset' => $_POST['offset'],
        'post_status' => 'publish',
        'orderby' => 'rand',
        'post__not_in' => explode(',', $_POST['postID']),
        'tax_query' => array(
            array(
                'taxonomy' => 'category',
                'field' => 'term_id',
                'terms' => explode(',', $_POST['categories']),
            )
        ),
    ));

    while ($relate_category->have_posts()) {
        $relate_category->the_post();
        echo '<div class="row border-top py-4"></div><div id="content-offset-'. $_POST["offset"] . '">';
        get_template_part('template-parts/components/content');
        echo '</div>';
    }

    wp_reset_query();
    die; // here we exit the script and even no wp_reset_query() required!
}



add_action('wp_ajax_loadmore', 'misha_loadmore_ajax_handler'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_loadmore', 'misha_loadmore_ajax_handler'); // wp_ajax_nopriv_{action}