<button class="navbar-toggler" type="button" data-toggle="collapse" 
data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarCollapse">
    <?php
    wp_nav_menu(array(
        'theme_location'  => 'default_main_menu',
        'depth'           => 2, // 1 = no dropdowns, 2 = with dropdowns.
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
                <form action="<?= esc_url(site_url('/')) ?>" method="get" class="d-flex">
                    <input type="text" name="s" placeholder="Tìm kiếm..." name="search">
                    <button type="submit" class="ml-auto"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </li>
        
        <?php
        pll_the_languages(array(
            'hide_current' => 1,
            'show_flags' => 1,
        ));
        ?>
    </ul>
</div>