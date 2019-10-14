<section id="destination" class="block kilala-animation-3">
  <div class="container">
    <h2 class="main-title-lg kilala-animation-item" data-animate>
      <?php printf('%s <thin>%s</thin>', pll__('Destination'), pll__('interests')); ?>
    </h2>
    <div class="row">
      <div class="col-12 col-md-8 col-lg-7 mx-auto">
        <!-- map -->
        <?php get_template_part('template-parts/blocks/global/map') ?>
      </div>
    </div>
    <?php
    if (empty($destinations_top) || NULL === $destinations_top) {
      $destinations_top = get_destinations_top();
    }
    ?>
    <div class="row gallery-cards">
      <?php foreach ($destinations_top as $k => $v) :
        if (3 < $k) break;
        $thumbnail = get_field('feature_image', $v->taxonomy . '_' . $v->term_id);
        $thumbnail = isset($thumbnail) && !empty($thumbnail) ? $thumbnail['url']  : no_img('8151');
        $description_cotnent = get_short_text($v->description, 345);
        $sort_description = get_short_text($v->description, 70);

        ?>
        <div class="col-6 col-lg-3 gallery kilala-animation-item" data-animate>
          <a class="link-gallery" title="<?php echo $v->name ?>" href="<?php echo get_term_link($v->term_id) ?>">
            <div class="link-gallery-image">
              <figure class="image">
                <div class="image-mask" style="background-image: url(<?php echo $thumbnail; ?>)"></div>
              </figure>
              <div class="link-gallery-image-text">
                <div class="link-gallery-image-text-content"><?php echo $description_cotnent; ?>
                </div>
              </div>
            </div>
            <div class="link-gallery-desc">
              <h3><?php echo $v->name; ?></h3>
              <?php if (isset($sort_description) && !empty($sort_description)) {
                  printf("<p class='d-none d-sm-block'>%s</p>", $sort_description);
                } ?>
            </div>
          </a>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>