<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">

<head>
    <meta charset="<?= get_bloginfo('charset'); ?>">
    <meta name="viewport" content="initial-scale=1.0,width=device-width,height=device-height,shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="google" content="notranslate">
    <title><?php wp_title(); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#00a300">
    <meta name="theme-color" content="#ffffff">
    <!-- End Favicon -->

    <?php if (is_singular() && pings_open(get_queried_object())) : ?>
    <link rel="pingback" href="<?= get_bloginfo('pingback_url'); ?>">
    <?php endif; ?>

    <link rel="stylesheet" type="text/css" href="<?= ASSETS_PATH ?>css/preload.css">

    <?php wp_head(); ?>
    <?= wpedu_get_option('option_head_code') ?>
</head>

<body <?php body_class(); ?>>
    <?= wpedu_get_option('option_body_code') ?>
    
    <!-- Is home page -->
    <?php if ( is_front_page() ) { ?>
        <div id="preloadSVG" style="display: none;"></div>
        <div id="js_progressLoading" style="display: none;">
            <svg role="img" class="frame000">
                <use id="svg_change" xlink:href="#frame000"></use>
            </svg>
        </div>

        <?php do_action('progress_loading_script'); ?>
    <?php } ?>
    <!-- End Is home page -->

    <header id="header">
        <div id="header-top">
            <div class="container">
                <?php get_template_part('template-parts/components/header_top') ?>
            </div>
        </div>

        <nav id="header-menu" class="navbar navbar-light navbar-expand-lg shadow-sm">
            <div class="container">
                <?php get_template_part('template-parts/components/header_logo') ?>
                <?php get_template_part('template-parts/components/header_main_menu') ?>
            </div>
        </nav>
        <div class="placeholder-content"></div>
        <div class="container">
            <hr class="header-border m-0">
        </div>
    </header>

    <main role="main" id="main-content">