<section id="destination" class="py-3 py-md-5 kilala-animation-3">
  <div class="container">
    <div class="row main-title">
      <h1 class="kilala-animation-item" data-animate>
        <bold>Điểm đến</bold>
        <thin> được yêu thích nhất</thin>
      </h1>
    </div>
    <div class="row">
      <div class="col-12 col-md-8 col-lg-7 mx-auto">
        <!-- map -->
        <?php get_template_part('template-parts/blocks/global/map') ?>
      </div>
    </div>

    <?php
    $destinations_topL = 'destination_top_home_' . LANGUAGE_SLUG;
    if (false === ($destinations_top  = get_transient($destinations_topL))) {
      $include_ja = array(1021, 1022, 1023, 1024, 1025, 1026, 1027, 1028);
      $include_vi = array(1219, 1221, 1223, 1225, 1227, 1229, 1231, 1233);
      $args = array(
        'hide_empty' => false,
        // 'orderby' => 'term_id',
        // 'order' => 'ASC',
        'number' => 4,
      );
      $destinations_top = get_terms('destinations', $args);

      // set_transient($destinations_topL, $destinations_top, 30 * DAY_IN_SECONDS);
    }
    ?>

    <div class="row gallery-cards">
      <?php foreach($destinations_top as $v):
        $thumbnail = get_field('feature_image', $v->taxonomy . '_' . $v->term_id);
        $thumbnail = isset($thumbnail) && !empty($thumbnail) ? $thumbnail['sizes']['medium']  : no_img('8151');
      ?>
      <div class="col-md-6 col-lg-3 gallery kilala-animation-item" data-animate>
        <a class="link-gallery" title="<?php echo $v->name ?>" href="<?php echo get_term_link($v->term_id) ?>">
          <div class="link-gallery-image">
            <figure class="image"><div class="image-mask" style="background: url(<?php echo $thumbnail; ?>)"></div></figure>
            <div class="link-gallery-image-text">
              <div class="link-gallery-image-text-content">
                <?php echo $v->description; ?>
              </div>
            </div>
          </div>
          <div class="link-gallery-desc"><h3><i class="fa fa-map-marker mr-2"></i><?php echo $v->name; ?></h3></div>
        </a>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>