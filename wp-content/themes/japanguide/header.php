<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">

<head>
    <meta charset="<?= get_bloginfo('charset'); ?>">
    <meta name="viewport" content="initial-scale=1.0,width=device-width,height=device-height,shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="google" content="notranslate">
    <title><?php wp_title(); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php
    $urlFavicon = wpedu_get_option('option_icon_logo')['url'];
    if (isset($urlFavicon) && !empty($urlFavicon)) {
        printf("<link rel='shortcut icon' type='image/x-icon' href='%s'/>", $urlFavicon);
    } ?>
    <?php if (is_singular() && pings_open(get_queried_object())) : ?>
    <link rel="pingback" href="<?= get_bloginfo('pingback_url'); ?>">
<?php endif; ?>

<style type="text/css" media="screen">
    .frame000 {
        width: 255px;
        height: 160px;
    }

    @media (min-width: 768px) {
        .frame000 {
            width: 510px;
            height: 320px;
        }
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
        -webkit-transform: translate(-50%,-50%);
        -ms-transform: translate(-50%,-50%);
        transform: translate(-50%,-50%);
    }
</style>

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Be+Vietnam:100,100i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i&display=fallback&subset=latin-ext,vietnamese">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<?php wp_head(); ?>
<?= wpedu_get_option('option_head_code') ?>
</head>

<body <?php body_class(); ?>>
    <?= wpedu_get_option('option_body_code') ?>

    <div id="preloadSVG" style="display: none;">
        <?php get_template_part('template-parts/svgs/logo-animation') ?>
    </div>
    <div id="js_progressLoading" style="display: none; background-image: url('<?= get_template_directory_uri() ?>/logo.png'); background-position: center; background-repeat: no-repeat;">
        <svg role="img" class="frame000">
            <use id="svg_change" xlink:href="#frame000"></use>
        </svg>
    </div>

    <?php do_action('progress_loading_script'); ?>

    <header id="header">
        <div id="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-sm-auto col-12">
                        <ul class="list-inline top-contact">
                            <li class="list-inline-item mr-4">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                                <a href="tel:<?= str_replace([' ', ',', '.'], ['', '', ''], wpedu_get_option('option_phone')) ?>">
                                    <?= wpedu_get_option('option_phone') ?>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                <a href="mailto:<?= wpedu_get_option('option_email') ?>"><?= wpedu_get_option('option_email') ?></a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-auto ml-auto d-none d-sm-block">
                        <ul class="list-inline">
                        <!--list-inline-item mr-4 -->
                            <li class="list-inline-item">
                                <div class="search-container">
                                    <form action="<?= esc_url(home_url('/')) ?>" method="get">
                                        <input type="text" name="s" placeholder="Tìm kiếm..." name="search">
                                        <button type="submit"><i class="fa fa-search"></i></button>
                                    </form>
                                </div>
                            </li>
                            <?php
                            // pll_the_languages(array(
                            //     'hide_current' => 1,
                            //     'show_flags' => 1,
                            // ));

                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <nav id="header-menu" class="navbar navbar-light navbar-expand-md shadow-sm">
            <div class="container">
                <div>
                    <?php $urlKilala = LANGUAGE_SLUG === 'ja' ? 'http://www.kilala.vn/ja/cam-nang-nhat-ban.html' : 'http://www.kilala.vn/cam-nang-nhat-ban.html'; ?>
                    <a target="_blank" class="navbar-brand mr-0" href="<?php echo $urlKilala ?>">
                        <img alt="Cầu nối Văn hóa Việt - Nhật" title="Cầu nối Văn hóa Việt - Nhật" src="<?php echo wpedu_get_option('option_logo_kilala')['url']; ?>">
                    </a>
                    <a class="navbar-brand mr-0" href="<?php echo home_url(); ?>">
                        <?php if (is_home() && is_front_page()) { ?><h1 class="d-none"><?php bloginfo('name'); ?></h1><?php } ?>
                        <img src="<?php echo wpedu_get_option('option_logo')['url'] ?>" title="<?php bloginfo('name') ?>" alt="<?php bloginfo('name') ?>">
                    </a>
                </div>
                    
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <?php
                    wp_nav_menu(array(
                        'theme_location'  => 'default_main_menu',
                    'depth'           => 1, // 1 = no dropdowns, 2 = with dropdowns.
                    'container'       => '',
                    'container_class' => '',
                    'container_id'    => '',
                    'menu_class'      => 'navbar-nav',
                    'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                    'walker'          => new WP_Bootstrap_Navwalker(),
                ));
                ?>

                <ul class="navbar-nav d-block d-md-none my-2">
                    <li class="nav-item mb-3">
                        <div class="search-container">
                            <form action="<?= esc_url(home_url('/')) ?>" method="get" class="d-flex">
                                <input type="text" name="s" placeholder="Tìm kiếm..." name="search">
                                <button type="submit" class="ml-auto"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </li>
                    <?php
                    // pll_the_languages(array(
                    //     'hide_current' => 1,
                    //     'show_flags' => 1,
                    // ));

                    ?>
                </ul>
            </div>
        </div>
    </nav>
    <div class="placeholder-content"></div>
    <div class="container">
        <hr class="header-border m-0">
    </div>
</header>
<main role="main" id="main-content">