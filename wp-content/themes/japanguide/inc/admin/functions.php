<?php if (!defined('APP_PATH')) die ('Bad requested!');

/**
 * Change the Login Logo
 */
function load_admin_style()
{
    wp_enqueue_style('admin_css', ASSETS_PATH . 'css/admin-style.css', false, '1.0.0');
}
add_action('admin_enqueue_scripts', 'load_admin_style');

function default_login_logo()
{ ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url('<?= get_template_directory_uri() ?>/logo.png');
            height: 85px;
            width: 100%;
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
            padding-bottom: 30px;
        }
    </style>
<?php }
add_action('login_enqueue_scripts', 'default_login_logo');

function default_login_logo_url()
{
    return home_url();
}
add_filter('login_headerurl', 'default_login_logo_url');

function default_login_logo_url_title()
{
    return get_bloginfo('name');
}
add_filter('login_headertext', 'default_login_logo_url_title');

/**
 * Save post delete cache when a post is saved.
 *
 * @param int $post_id The post ID.
 */
function save_post_delete_cache( $post_id ) {
    $post_type = get_post_type($post_id);
    foreach(pll_languages_list() as $v){
        switch ($post_type) {
            case "post":
                delete_transient('post_home_'.$v);
                break;
            default:
                break;
        }
    }
    return;
}
add_action( 'save_post', 'save_post_delete_cache' );


