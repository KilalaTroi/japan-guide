<?php
if (empty($categories) || NULL === $categories) {
  $categories = get_categories_top();
}
?>
<section id="interests" class="py-3 py-md-5 kilala-animation-2">
    <div class="container">
        <h2 class="kilala-animation-item main-title-lg" data-animate>
            <?php printf('%s <thin>%s</thin>',pll__('Chủ đề'),pll__('phổ biến')); ?>
        </h2>
        <div class="row galleries">
            <?php
            foreach ($categories as $category) :

                $thumbnail = get_field('feature_image', $category->taxonomy . '_' . $category->term_id);
                $thumbnail = isset($thumbnail) && !empty($thumbnail) ? $thumbnail['sizes']['feature-image']  : no_img('8151', 'feature-image');
                ?>
                <div class="col-6 col-md-3 gallery kilala-animation-item" data-animate>
                    <a class="link-gallery" title="<?php echo $category->name; ?>" href="<?php echo get_term_link($category->term_id); ?>">
                        <div class="link-gallery-image">
                            <figure class="image">
                                <div class="image-mask"><?php printf('<img class="img-fluid" alt="%1$s" title="%1$s" src="%2$s">', $category->name, $thumbnail); ?></div>
                            </figure>
                        </div>
                        <div class="link-gallery-text">
                            <div class="link-gallery-label"><?php echo $category->name ?></div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>