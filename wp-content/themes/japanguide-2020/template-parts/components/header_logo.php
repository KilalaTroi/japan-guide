<div>
    <?php $urlKilala = LANGUAGE_SLUG === 'ja' ? 'http://www.kilala.vn/ja/cam-nang-nhat-ban.html' : 'http://www.kilala.vn/cam-nang-nhat-ban.html'; ?>
    <a target="_blank" class="navbar-brand mr-0" href="<?php echo $urlKilala ?>">
        <img alt="Cầu nối Văn hóa Việt - Nhật" title="Cầu nối Văn hóa Việt - Nhật" src="<?php echo wpedu_get_option('option_logo_kilala')['url']; ?>">
    </a>
    <a class="navbar-brand mr-0" href="<?php echo site_url(); ?>">
        <?php if (is_home() && is_front_page()) { ?><h1 class="d-none"><?php bloginfo('name'); ?></h1><?php } ?>
        <img src="<?php echo wpedu_get_option('option_logo')['url'] ?>" title="<?php bloginfo('name') ?>" alt="<?php bloginfo('name') ?>">
    </a>
</div>