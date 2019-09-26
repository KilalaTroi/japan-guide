<?php if (!defined('APP_PATH')) die ('Bad requested!');

//load_json
function hkt_acf_json_load_point($paths)
{
    // remove original path (optional)
    unset($paths[0]);

    // append path
    $paths[] = get_stylesheet_directory() . '/acf-json';

    // return
    return $paths;
}
add_filter('acf/settings/load_json', 'hkt_acf_json_load_point');