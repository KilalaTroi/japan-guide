<?php global $post; setup_postdata( $single_id ); ?>
<div class="row mb-3">
    <div class="col-sm col-xs-12">
        <h1 class="mt-2"><?= get_the_title($single_id); ?></h1>
        <div class="d-flex d-sm-block align-items-center flex-wrap">
            <?php
            if (isset($term_color) && isset($term_name)) printf('<a id="openExploreNav_%1$s" class="mr-3 d-block d-sm-inline" href="javascript:void(0)" data-sidebar="#exploreNav_%1$s" data-overlay="#exploreCanvasNav_%1$s"><i %2$s class="fa fa-map-marker mr-2"></i>%3$s</a>', $single_id, $term_color, $term_name);

            if (isset($interests) && !empty($interests)) {
                foreach ($interests as $interest) {
                    $sub_image = get_field('sub_image', $interest->taxonomy . '_' . $interest->term_id);
                    $sub_image = isset($sub_image) && !empty($sub_image) ? $sub_image['sizes']['thumbnail']  : no_img('8218');
                    $arr[] = sprintf('<a id="openTopic_%2$s_%4$s" title="%1$s" class="mr-3 pl-4" style="background: url(%3$s) no-repeat 0 -20px; background-size: 20px;"  href="javascript:void(0)" data-sidebar="#exploreTopic_%2$s_%4$s" data-overlay="#exploreTopicOV_%2$s_%4$s">%1$s</a>', $interest->name, $interest->slug, $sub_image, $single_id);
                }
                printf('%s', implode('', !empty($arr) ? $arr : ''));
            }
            ?>
            <div class="fb-like fb_iframe_widget d-block d-sm-none <?= count($arr) === 0 || count($arr)%2 === 1 ? 'ml-auto' : 'mt-2'; ?>" data-href="<?= get_the_permalink($single_id); ?>" data-width="" data-layout="button" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
        </div>
    </div>
    <div class="col-auto mt-3 d-none d-sm-block">
        <div class="fb-like" data-href="<?= get_the_permalink($single_id); ?>" data-width="" data-layout="box_count" data-action="like" data-size="large" data-show-faces="true" data-share="false"></div>
    </div>
</div>

<div class="row">

    <div class="col-12 content">
        <?php the_content($single_id); ?>
    </div>

    <div class="col-12 py-2 py-lg-3 tags">
        <?php
        $post_tags = get_the_tags($single_id);
        if (!empty($post_tags)) {
            ?>
            <ul class="d-inline">
                <li class="main-label"><?php echo pll__('Tags'); ?></li>
                <?php foreach ($post_tags as $tag) {
                    printf('<li><a title="%1$s" href="%2$s">%1$s</a>', $tag->name, get_tag_link($tag->term_id));
                } ?>
            </ul>
        <?php } ?>

    </div>
    <div class="col-12 py-2 py-lg-3"></div>
</div>
<?php wp_reset_postdata(); ?>