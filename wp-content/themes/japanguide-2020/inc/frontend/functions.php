<?php if (!defined('APP_PATH')) die('Bad requested!');

//------------Add Class Functions-------------//
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
//------------End Add Class Functions-------------//


//------------Set Default Resource Functions-------------//
function no_img($id, $size = 'thumbnail', $icon = false, $arg = '')
{
    return wp_get_attachment_image_url($id, $size, $icon, $arg);
}
//------------End Set Default Resource Functions-------------//


//------------Get Data Functions-------------//
// get top desinations
function get_destinations_top()
{
    $destinations_topL = 'destination_top_' . LANGUAGE_SLUG;
    if (false === ($destinations_top  = get_transient($destinations_topL))) {
        $args = array(
            'hide_empty' => false,
            'orderby' => 'term_order',
            'order' => 'ASC',
            'number' => 8,
            'meta_query' => array(
                array(
                    'key' => 'top',
                    'value' => true,
                )
            )
        );

        $destinations_top = get_terms('category', $args);
        set_transient($destinations_topL, $destinations_top, 30 * DAY_IN_SECONDS);
    }
    return $destinations_top;
}

// get map
function get_map()
{
    $mapsL = 'map_' . LANGUAGE_SLUG;

    if (false === ($maps  = get_transient($mapsL))) {

        $include = wpedu_get_option('option_map');

        $args = array(
            'hide_empty' => false,
            'orderby' => 'term_order',
            'order' => 'ASC',
            'include'       => $include,
        );

        $maps = get_terms('regions', $args);
        foreach ($maps as $key => $map) {
            $destination = get_terms('category', array(
                'hide_empty' => false,
                'meta_query' => array(
                    array(
                        'key' => 'show_on_map',
                        'value' => true,
                    ),
                    array(
                        'key' => 'region_of',
                        'value' => $map->term_id,
                    )
                )
            ));

            if (isset($destination) && !empty($destination)) {
                $maps[$key]->destinations = $destination;
            }
        }
        set_transient($mapsL, $maps, 30 * DAY_IN_SECONDS);
    }
    return $maps;
}

// get top topics
function get_topics_top()
{
    $topicsL = 'topics_' . LANGUAGE_SLUG;
    if (false === ($topics  = get_transient($topicsL))) {
        $args = array(
            'hide_empty' => false,
            'number'            => '8',
            'orderby' => 'term_order',
            'order' => 'ASC',
        );
        $topics = get_terms('topics', $args);
        set_transient($topicsL, $topics, 30 * DAY_IN_SECONDS);
    }
    return $topics;
}

// get post right excludes (artile detail)
function get_post_right()
{
    $post_rightL = 'post_right_' . LANGUAGE_SLUG;
    if (false === ($post_right  = get_transient($post_rightL))) {
        $post_right = new WP_Query(
            array(
                'post_type'      => 'post',
                'posts_per_page' => 5,
                'post_status' => 'publish',
                'cat' => '1199',
            )
        );
        set_transient($post_rightL, $post_right, 30 * DAY_IN_SECONDS);
    }
    return $post_right;
}

function get_taxonomy_type($type = "destination", $number = false)
{
    if ("interest" === $type) {
        $term_id = '1240';
        if ('ja' === LANGUAGE_SLUG) {
            $term_id = '1266';
        }
    } else {
        $term_id = '7';
        if ('ja' === LANGUAGE_SLUG) {
            $term_id = '12';
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

function get_primary_taxonomy($id = NULL, $taxonomy = 'category')
{
    if (NULL === $id || empty($id)) {
        $id = get_the_ID();
    }
    $primary = get_post_meta($id, '_yoast_wpseo_primary_category', true);
    if (NULL === $primary || empty($primary)) {
        $taxonomies = get_the_terms($id, $taxonomy);
        if (isset($taxonomies)) {
            return get_term($taxonomies[0]->term_id, $taxonomy);
        }
    }
    return get_term($primary, $taxonomy);
}
//------------End Get Data Functions-------------//


//------------Helper Functions-------------//
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

function get_category_type($id = NULL, $type = 'destination')
{
    if (NULL === $id || empty($id)) {
        $id = get_the_ID();
    }
    $categories = get_the_category($id);
    $arr = array();
    if ('interest' === $type) {
        foreach ($categories as $category) {
            if (in_array($category->category_parent, array(1240, 1258))) {
                $arr[] = $category;
            }
        }
    } else {
        foreach ($categories as $category) {
            if (in_array($category->category_parent, array(7, 12))) {
                $arr[] = $category;
            }
        }
    }
    return $arr;
}

function fellowtuts_wpbs_pagination($pages = '', $range = 2)
{
    $showitems = ($range * 2) + 1;
    global $paged;
    if (empty($paged)) {
        $paged = 1;
    }
    if ($pages == '') {
        global $wp_query;
        $pages = $wp_query->max_num_pages;

        if (!$pages) {
            $pages = 1;
        }
    }

    if (1 != $pages) {
        echo '<nav aria-label="Page navigation" role="navigation">';
        echo '<span class="sr-only">Page navigation</span>';
        echo '<ul class="pagination justify-content-center ft-wpbs">';

        if ($paged > 2 && $paged > $range + 1 && $showitems < $pages) {
            echo '<li class="page-item"><a class="page-link" href="' . get_pagenum_link(1) . '" aria-label="First Page">&laquo;</a></li>';
        }

        if ($paged > 1 && $showitems < $pages) {
            echo '<li class="page-item"><a class="page-link" href="' . get_pagenum_link($paged - 1) . '" aria-label="Previous Page">&lsaquo;</a></li>';
        }

        for ($i = 1; $i <= $pages; $i++) {
            if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems)) {
                echo ($paged == $i) ? '<li class="page-item active"><span class="page-link"><span class="sr-only">Current Page </span>' . $i . '</span></li>' : '<li class="page-item"><a class="page-link" href="' . get_pagenum_link($i) . '"><span class="sr-only">Page </span>' . $i . '</a></li>';
            }
        }

        if ($paged < $pages && $showitems < $pages) {
            echo '<li class="page-item"><a class="page-link" href="' . get_pagenum_link($paged + 1) . '" aria-label="Next Page">&rsaquo;</a></li>';
        }

        if ($paged < $pages - 1 && $paged + $range - 1 < $pages && $showitems < $pages) {
            echo '<li class="page-item"><a class="page-link" href="' . get_pagenum_link($pages) . '" aria-label="Last Page">&raquo;</a></li>';
        }

        echo '</ul>';
        echo '</nav>';
    }
}
//------------End Helper Functions-------------//


//------------Translate Functions-------------//
function wpedu_translate()
{
    $arr = array(
        'Điểm đến'                         => 'Destination',
        'Các điểm đến'                  => 'Destinations',
        'được yêu thích nhất'             => 'interests',
        'Chủ đề'                        => 'Topic',
        'phổ biến'                      => 'popular',
        'Bí kíp du lịch Nhật Bản'      => 'Japan travel news',
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
        'Các thành phố'   => 'Cities',
        'thuộc khu vực'   => 'in the region',
        'Tìm điểm đến yêu thích của bạn'  => 'Find your favorite destination',
        'Tìm khu vực yêu thích của bạn'  => 'Find your favorite region'
    );

    $arrSlugTaxonomy = array(
        'chu-de' => 'slug-taxonomy-topic',
        'khu-vuc' => 'slug-taxonomy-region'
    );

    foreach ($arr as $key => $value) {
        pll_register_string($key, $value, 'translate-custom');
    }

    foreach ($arrSlugTaxonomy as $key => $value) {
        pll_register_string($key, $value, 'translate-slug');
    }
}
add_action('after_setup_theme', 'wpedu_translate');
//------------End Translate Functions-------------//


//------------Ajax Functions-------------//
// misha_loadmore_ajax_handler
function misha_loadmore_ajax_handler()
{
    $posts_per_page = 1;
    if ($_POST['offset'] == 1) {
        $posts_per_page = 6;
    }
    $relate_category = new WP_Query(array(
        'post_type'      => 'post',
        'posts_per_page' => $posts_per_page,
        'lang'           => $_POST['lang'],
        'offset' => $_POST['offset'],
        'post_status' => 'publish',
        'post__not_in' => explode(',', $_POST['postID']),
        'tag__in' => explode(',', $_POST['tags']),
    ));

    while ($relate_category->have_posts()) {
        $relate_category->the_post();
        if ($relate_category->current_post == 0) {
            global $post;
            $term = get_primary_taxonomy();
            $term_name = !empty($term) ? $term->name : '';
            $term_id = !empty($term) ? $term->id : '';
            $region_id = get_field('region_of', $term->taxonomy . '_' . $term->term_id);
            $term_color = get_field('color', 'regions_' . $region_id);
            $term_color = isset($term_color) && !empty($term_color) ? 'style="color:' . $term_color . '"'  : '';
            $single_id = $post->ID;
            $interests = get_the_terms($single_id,'topics');

            if ( is_array($interests) && count($interests) > 0 ) { 
                foreach ( $interests as $key => $value ) {
                    $topic_term = get_term($value, 'topics');
                    include(APP_PATH . '/template-parts/blocks/global/explore_topic.php');
                }
            }
            include(APP_PATH . '/template-parts/blocks/global/explore_destination.php');
            echo '<div class="row border-top py-2 py-sm-3"></div><div id="content-offset-' . $_POST["offset"] . '">';
            include(APP_PATH . '/template-parts/components/content.php');
            include(APP_PATH . '/template-parts/components/layzy-script.php');
            echo '</div>';
        } else {
            if ($relate_category->current_post == 1) {
                echo '<h3 class="mt-0">Có thể bạn quan tâm:</h3><ul class="pl-4">';
            };

            printf('<li><a title="%1$s" href="%2$s">%1$s</a></li>', get_the_title(), get_the_permalink($post->ID));
        }
    }

    if ($relate_category->found_posts > 1) {
        echo '</ul>';
    };

    wp_reset_query();
die; // here we exit the script and even no wp_reset_query() required!
}

add_action('wp_ajax_loadmore', 'misha_loadmore_ajax_handler'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_loadmore', 'misha_loadmore_ajax_handler'); // wp_ajax_nopriv_{action}

// get_five_articles
function get_five_articles() {
    $data = array();
    $postHomeL = 'post_home_' . LANGUAGE_SLUG;
    if (false === ($postHome  = get_transient($postHomeL))) {
        $postHome = get_posts(
            array(
                'post_type'      => 'post',
                'posts_per_page' => 5,
                'post_status' => 'publish',
                'meta_query' => array(array('key' => '_thumbnail_id')),
                'category__not_in' => array( 1397 ),
                'orderby' => 'rand'
            )
        );
        set_transient($postHomeL, $postHome, 1 * HOUR_IN_SECONDS);
    }
    global $post;

    $post = array_shift($postHome);
    setup_postdata($post);
    $img = get_the_post_thumbnail_url($post->ID, 'feature-image');
    $img = isset($img) && !empty($img) ? $img : no_img('8151', 'feature-image');
    $img_feature = get_the_post_thumbnail_url($post->ID, 'full');
    $img_feature = isset($img_feature) && !empty($img_feature) ? $img_feature : no_img('8151', 'full');
    $taxonomy_destination = get_primary_taxonomy($post->ID);
    $region_id = get_field('region_of', $taxonomy_destination->taxonomy . '_' . $taxonomy_destination->term_id);
    $color = get_field('color', 'regions_' . $region_id);
    $color = isset($color) && !empty($color) ? 'color:' . $color : '';
    $data['first_article'] = array(
        'title' => get_the_title(),
        'excerpt' => get_the_excerpt(),
        'url' => get_the_permalink(),
        'img_url' => $img_feature,
        'img_sp_url' => $img,
        'taxonomy' => $taxonomy_destination,
        'taxonomy_link' => get_term_link($taxonomy_destination->term_id),
        'color' => $color
    );
    wp_reset_postdata();

    foreach ($postHome as $post) {
        setup_postdata($post);
        $img = get_the_post_thumbnail_url($post->ID, 'feature-image');
        $img = isset($img) && !empty($img) ? $img : no_img('8151', 'feature-image');
        $taxonomy_destination = get_primary_taxonomy($post->ID);
        $region_id = get_field('region_of', $taxonomy_destination->taxonomy . '_' . $taxonomy_destination->term_id);
        $color = get_field('color', 'regions_' . $region_id);
        $color = isset($color) && !empty($color) ? 'color:' . $color : '';
        $data['articles'][] = array(
            'title' => get_the_title(),
            'url' => get_the_permalink(),
            'img_url' => $img,
            'taxonomy' => $taxonomy_destination,
            'taxonomy_link' => get_term_link($taxonomy_destination->term_id),
            'color' => $color
        );
        wp_reset_postdata();
    }

    echo json_encode($data);
    die();
}
add_action('wp_ajax_get_five_articles', 'get_five_articles'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_get_five_articles', 'get_five_articles'); // wp_ajax_nopriv_{action}
//------------End Ajax Functions-------------//


//------------Override/Filter/Hook Functions-------------//
// overide regions taxonomy query
function customize_customtaxonomy_archive_display ( $query ) {
    if (($query->is_main_query()) && (is_tax('regions'))) {
        $current_term = get_queried_object();
        $args = array(
            'hide_empty' => false,
            'order' => 'ASC',
            'meta_query' => array(
                array(
                    'key' => 'region_of',
                    'value' => $current_term->term_id,
                )
            )
        );
        $child_of_rigion = get_terms('category', $args);
        $child_of_rigion_arr = array();

        foreach ($child_of_rigion as $key => $value) {
            $child_of_rigion_arr[] = $value->term_id;
        };

        $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

        unset( $query->query['regions'] );
        unset( $query->query['lang'] );
        unset( $query->tax_query );
        $query->set( 'post_type', 'post' );       

        $query->set( 'post_status', 'publish' );
        $query->set( 'paged', $paged );
        $query->set( 'tax_query',  array(
            'relation' => 'OR',
            array(
                'taxonomy' => 'category',
                'field'    => 'term_id',
                'terms'    => $child_of_rigion_arr,
            ),
        ));
    }
}

add_action( 'pre_get_posts', 'customize_customtaxonomy_archive_display' );

function wpse_286813_omit_all( $query_vars ){
    // triggered also in admin pages
    if ( is_admin() )
        return $query_vars;

    if( !empty($query_vars['regions']) ) {
        $query_vars['lang'] = '';
    }
    return $query_vars;

}
add_filter( 'request', 'wpse_286813_omit_all' );
// End overide region taxonomy query

function WPTime_add_custom_class_to_all_images($content){
    //* Has lazy images
    if ( strpos( $content, '-image' ) === true ) {
        return $content;
    }

    //* Replace images src to data-src
    return preg_replace_callback( '/(?P<all> (?# ) <img(?P<before>[^>]*) (?# ) ( (?# ) src=["\'](?P<src1>[^>"\']*)["\'] ) (?P<after>[^>]*) (?# ) (?P<closing>\/?)> (?# ) )/x', 
        function ( $matches ) {
            //* Image Placeholder
            $placeholder_image = 'data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=';

            //* Disable lazy load for specific images
            if ( false !== strpos( $matches['all'], 'data-lazy="1"' ) ) {
                return $matches['all'];
            } else {
                return '<img ' . $matches['before']
                . ' class="lazy" src="' . $placeholder_image . '" '
                . ' data-src="' . $matches['src1'] . '" '
                . $matches['after']
                . $matches['closing'] . '><noscript>' . $matches['all'] . '</noscript>';
            }
        }
        , $content );
}
add_filter('the_content', 'WPTime_add_custom_class_to_all_images', 13);
//------------End Override/Filter/Hook Functions-------------//

// Disable Yoast Generated Schema Data
function disable_yoast_schema_data($data){
    $data = array();
    return $data;
}
add_filter('wpseo_json_ld_output', 'disable_yoast_schema_data', 10, 1);