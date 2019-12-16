<div class="row">
    <div class="col-md-auto col-12">
        <ul class="list-inline top-contact">
            <!-- <li class="list-inline-item mr-4">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <a href="tel:<?= str_replace([' ', ',', '.'], ['', '', ''], wpedu_get_option('option_phone')) ?>">
                    <?= wpedu_get_option('option_phone') ?>
                </a>
            </li> -->
            <li class="list-inline-item mr-4">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <a href="mailto:<?= wpedu_get_option('option_email') ?>"><?= wpedu_get_option('option_email') ?></a>
            </li>
            <?php if ( get_page_template_slug() != 'page-templates/about.php' ) : ?>
                <li class="list-inline-item">
                    <a href="<?= home_url('gioi-thieu'); ?>#datmuasach" class="fancy-button pop-onhover bg-gradient3">
                        <span>Đặt Mua Sách</span>
                    </a>
                </li>
            <?php else : ?>
                <li class="list-inline-item">
                    <a href="#datmuasach" class="fancy-button bg-gradient3">
                        <span>Đặt Mua Sách</span>
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </div>

    <div class="col-auto ml-auto d-none d-md-block">
        <ul class="list-inline">
            <!--list-inline-item mr-4 -->
            <li class="list-inline-item mr-4">
                <div class="search-container">
                    <form action="<?= esc_url(site_url('/')) ?>" method="get">
                        <input type="text" name="s" placeholder="Tìm kiếm..." name="search">
                        <button type="submit"><i class="fa fa-search"></i></button>
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
</div>