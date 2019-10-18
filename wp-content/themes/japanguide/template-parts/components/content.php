<div class="row mb-3">
    <div class="col-sm col-xs-12">
        <h1 class="mt-2"><?php the_title(); ?></h1>
        <div>
            <?php 
            if (isset($term_color) && isset($term_name)) printf('<a id="openExploreNav" class="mr-0 mr-sm-3 my-3 my-sm-0 d-block d-sm-inline" href="javascript:void(0)"><i %s class="fa fa-map-marker mr-2"></i>%s %s</a>', $term_color, pll__('Discover'), $term_name);
            $interests = get_category_type(get_the_ID(), 'interest');
            if (isset($interests) && !empty($interests)) {
                foreach ($interests as $interest) {
                    $sub_image = get_field('sub_image', $interest->taxonomy . '_' . $interest->term_id);
                    $sub_image = isset($sub_image) && !empty($sub_image) ? $sub_image['sizes']['thumbnail']  : no_img('8218');
                    $arr[] = sprintf('<a title="%1$s" class="pl-4" style="background: url(%3$s) no-repeat 0 -20px; background-size: 20px;" href="%2$s">%1$s</a>', $interest->name, get_term_link($interest->term_id), $sub_image);
                }
                printf('<strong class="pr-1">Chủ đề:</strong>%s', implode(', ', !empty($arr) ? $arr : ''));
            }
            ?>
        </div>
    </div>
    <div class="col-auto mt-3">
        <div class="fb-like" data-href="<?php the_permalink(); ?>" data-width="" data-layout="box_count" data-action="like" data-size="large" data-show-faces="true" data-share="false"></div>
    </div>
</div>

<div class="row">

    <div class="col-12 content">
        <?php the_content(); ?>
    </div>

    <div class="col-12 py-2 py-lg-3 tags">
        <?php
        $post_tags = get_the_tags();
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
    <div class="col-12 py-2 py-lg-3">
        <div class="fb-like pull-right fb_iframe_widget" data-href="<?php the_permalink(); ?>" data-width="" data-layout="button" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
    </div>
</div>