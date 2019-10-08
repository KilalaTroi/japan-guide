<?php if (!defined('APP_PATH')) die('Bad requested!');

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
        #login h1 a,
        .login h1 a {
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
    function save_post_delete_cache($post_id)
    {
        $post_type = get_post_type($post_id);
        global $wpdb;
        switch ($post_type) {
            case "post":
                $wpdb->query("DELETE FROM `$wpdb->options` WHERE `option_name` LIKE ('\_transient\_post\_%') OR `option_name` LIKE ('\_transient\_timeout\_post\_%')");
                break;
            default:
                break;
        }
        return;
    }
    add_action('save_post', 'save_post_delete_cache');

    /**
     * Save taxonomy delete cache when a taxonomy is saved.
     *
     * @param int $term_id The taxonomy ID.
     */
    function save_taxonomy_delete_cache($term_id)
    {
        $term = get_term($term_id);
        global $wpdb;
        switch ($term->taxonomy) {
            case "destinations":
                $wpdb->query("DELETE FROM `$wpdb->options` WHERE `option_name` LIKE ('\_transient\_destination\_%') OR `option_name` LIKE ('\_transient\_timeout\_destination\_%')");
                break;
            case "category":
                $wpdb->query("DELETE FROM `$wpdb->options` WHERE `option_name` LIKE ('\_transient\_category\_%') OR `option_name` LIKE ('\_transient\_timeout\_category\_%')");
                break;
            default:
                break;
        }
        return;
    }
    add_action('edit_term', 'save_taxonomy_delete_cache');


    function add_file_types_to_uploads($file_types)
    {
        $new_filetypes = array();
        $new_filetypes['svg'] = 'image/svg+xml';
        $file_types = array_merge($file_types, $new_filetypes);
        return $file_types;
    }
    add_action('upload_mimes', 'add_file_types_to_uploads');
    add_filter('logout_url', 'fix_logout_url');
    function fix_logout_url($url)
    {
        $redirect = admin_url();
        return $url . '&redirect_to=' . $redirect;
    }
