<?php if (!defined('APP_PATH')) die('Bad requested!');

function get_ajax_map()
{
  
  get_template_part('template-parts/svgs/map');
  exit; // exit ajax call(or it will return useless information to the response)
}

// Fire AJAX action for both logged in and non-logged in users
add_action('wp_ajax_get_ajax_map', 'get_ajax_map');
add_action('wp_ajax_nopriv_get_ajax_map', 'get_ajax_map');
