<?php 
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$url_path = parse_url($actual_link, PHP_URL_PATH);
$basename = pathinfo($url_path, PATHINFO_BASENAME);

$args = array (
    'post_type'              => array('page','post'),
    'name'                   => $basename,
    'post_status'            => 'publish',
    'posts_per_page'         => 1
);
$query = new WP_Query( $args );

if ( $query->have_posts() ) {
  $url = get_permalink($query->posts[0]->ID);
  wp_redirect( $url );
  exit;
}

get_header(); 
?>
<div class="container _404-content py-5 text-center">
  <h1><?= pll__('404') ?></h1>
  <h2><?= pll__('Page not found') ?></h2>
  <p><?= pll__('The page you were looking for could not be found.') ?></p>

  <a href="<?= site_url(); ?>" class="btn btn-go-home my-5"><?= pll__('Go back to home') ?></a>

  <div class="help-link">
    <h4><?= pll__('Here are some helpful links') ?></h4>
    <?php
    wp_nav_menu(array(
        'theme_location'  => 'helpful_menu',
        'container'       => '',
        'container_class' => '',
        'container_id'    => '',
        'menu_class'      => 'm-0 mt-3 list-inline'
    ));
    ?>
  </div>
<?php get_footer(); ?>
