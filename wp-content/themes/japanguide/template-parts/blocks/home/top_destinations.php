<section id="destination" class="py-3 py-md-5">
    <div class="container">
        <div class="kilala-animation-3">
            <h2 class="kilala-animation-item main-title-lg" data-animate>
                <?php printf('%s <thin>%s</thin>',pll__('Điểm đến'),pll__('được yêu thích nhất')); ?>
            </h2>
        </div>
        <div class="row">
            <div class="col-12 col-md-8 col-lg-7 mx-auto kilala-animation-3">
                <!-- map -->
                <?php get_template_part('template-parts/blocks/global/map') ?>
            </div>
        </div>
        <?php
        if (empty($destinations_top) || NULL === $destinations_top) {
          $destinations_top = get_destinations_top();
      }
      ?>
      <div class="row gallery-cards kilala-animation-3">
        <?php foreach($destinations_top as $k => $v):
            if($k > 3) break;
            $thumbnail = get_field('feature_image', $v->taxonomy . '_' . $v->term_id);
            $thumbnail = isset($thumbnail) && !empty($thumbnail) ? $thumbnail['sizes']['medium']  : no_img('8151');
            ?>
            <div class="col-sm-6 col-lg-3 gallery kilala-animation-item" data-animate>
                <a class="link-gallery" title="<?php echo $v->name ?>" href="<?php echo get_term_link($v->term_id) ?>">
                    <div class="link-gallery-image">
                        <figure class="image"><div class="image-mask" style="background-image: url(<?php echo $thumbnail; ?>)"></div></figure>
                        <div class="link-gallery-image-text">
                            <div class="link-gallery-image-text-content"><?php echo $v->description; ?></div>
                        </div>
                    </div>
                    <div class="link-gallery-desc"><h3><i class="fa fa-map-marker mr-2"></i><?php echo $v->name; ?></h3></div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</section>