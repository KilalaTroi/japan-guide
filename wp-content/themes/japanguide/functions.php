<?php
define('APP_PATH', dirname(__FILE__));
/**
 * CORE Includes
 **/
include APP_PATH.'/inc/define.php';
include APP_PATH.'/inc/setup.php';
include APP_PATH.'/inc/admin/functions.php';
include APP_PATH.'/inc/admin/cpt.php';
require_once APP_PATH.'/ReduxCore/framework.php';
require_once APP_PATH.'/option.php';
include APP_PATH.'/inc/plugins/acf/functions.php';
include APP_PATH.'/inc/plugins/cf7/functions.php';
include APP_PATH.'/inc/frontend/functions.php';
include APP_PATH.'/inc/frontend/cookie.php';
include APP_PATH.'/inc/frontend/map.php';
require_once APP_PATH.'/inc/frontend/class-wp-bootstrap-navwalker.php';
