<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
  <meta charset="<?= get_bloginfo('charset'); ?>">
  <meta name="viewport" content="initial-scale=1.0,width=device-width,height=device-height,shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="google" content="notranslate">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <?php if (is_singular() && pings_open(get_queried_object())) : ?>
    <link rel="pingback" href="<?= get_bloginfo('pingback_url'); ?>">
  <?php endif; ?>

  <style type="text/css" media="screen">
    .frame000 {
      width: 510px;
      height: 320px;
    }

    #js_progressLoading {
      background: #fff;
      width: 100vw;
      height: 100vh;
      top: 0;
      left: 0;
      z-index: 99;
      position: fixed;
      z-index: 999999;
    }

    #js_progressLoading svg {
      position: absolute;
      top: 50%;
      left: 50%;
      margin-top: -160px;
      margin-left: -255px;
    }
  </style>

  <?php wp_head(); ?>
  <?= wpedu_get_option('option_head_code') ?>
</head>

<body <?php body_class(); ?>>
<?= wpedu_get_option('option_body_code') ?>
<?php do_action('progress_loading'); ?>

<header id="header" class="block-header">
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container">
      <a class="navbar-brand" href="<?= home_url() ?>">
        <img src="<?= wpedu_get_option('option_logo')['url'] ?>" alt="<?php bloginfo('name') ?>">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
              aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <?php 
          wp_nav_menu( array(
            'theme_location'  => 'default_main_menu',
            'depth'           => 1, // 1 = no dropdowns, 2 = with dropdowns.
            'container'       => '',
            'container_class' => '',
            'container_id'    => '',
            'menu_class'      => 'navbar-nav mr-auto',
            'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
            'walker'          => new WP_Bootstrap_Navwalker(),
          ) );
        ?>
        <ul class="navbar-nav ml-auto mr-3"><?php pll_the_languages();?></ul>
        <form class="form-inline mt-2 mt-md-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>
</header>
<main role="main" id="main-content">
