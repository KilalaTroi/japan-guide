<section class="kilala-animation">
  <div class="row">
    <div class="col-12">
      <!-- map -->
      <?php get_template_part('template-parts/blocks/global/map') ?>
    </div>
  </div>
</section>
<section class="gallery-cards sm">
  <div class="row">
    <div class="col-12 ">
      <h2 class="main-title-lg">
        <?php printf('%s <thin>%s</thin>',pll__('Điểm đến'),pll__('được yêu thích nhất')); ?>
      </h2>
    </div>
    <?php
    if (empty($destinations_top) || NULL === $destinations_top) {
      $destinations_top = get_destinations_top();
    }
    foreach ($destinations_top as $k => $v) :
      if ($k > 5) break;
      $thumbnail = get_field('feature_image', $v->taxonomy . '_' . $v->term_id);
      $thumbnail = isset($thumbnail) && !empty($thumbnail) ? $thumbnail['sizes']['thumbnail']  : no_img('8151');
      ?>
      <div class="col-sm-6 col-md-4 gallery">
        <a class="link-gallery" alt="<?php echo $v->name; ?>" title="<?php echo $v->name; ?>" href="<?php echo get_term_link($v->term_id); ?>">
          <div class="link-gallery-image">
            <figure class="image">
              <div class="image-mask" style="background-image: url(<?php echo $thumbnail; ?>)">
              </div>
            </figure>
            <div class="link-gallery-image-text">
              <div class="link-gallery-image-text-content">
                <?php echo $v->description; ?>
              </div>
            </div>
          </div>
          <div class="link-gallery-desc">
            <h3><i class="fa fa-map-marker mr-2"></i><?php echo $v->name; ?></h3>
          </div>
        </a>
      </div>
    <?php endforeach; ?>
  </div>
</section>
<section class="top-dest mt-5">
  <?php
  if (empty($destinations) || NULL === $destinations) {
    $destinations = get_destinations_map();
  }
  foreach ($destinations as $destination) :
    $sub_image = get_field('sub_image', $destination->taxonomy . '_' . $destination->term_id);
    $sub_image = isset($sub_image) && !empty($sub_image) ? $sub_image['sizes']['medium']  : no_img('8151');
    ?>
    <div class="row">
      <div class="col-12 top-dest-title">
        <h2 class="main-title">
          <i class="fa fa-map-marker mr-2"></i><?php echo $destination->name; ?></h2>
      </div>
      <div class="col-md-6 top-dest-map">
        <?php printf('<img title="%1$s" alt="%1$s" src="%2$s" />', $destination->name, $sub_image) ?>
      </div>
      <div class="col-md-6 top-dest-text">
        <?php
          $posts = get_posts(array(
            'post_type'      => 'post',
            'posts_per_page' => 3,
            'post_status' => 'publish',
            'tax_query' => array(
              array(
                'taxonomy' => 'destinations',
                'field' => 'term_id',
                'terms' => $destination->term_id,
              )
            ),
          ));
          global $post;
          ?>
        <ul>
          <?php foreach ($posts as $post) {
              setup_postdata($post);
              ?>
            <li>
              <a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>">
                <h3>
                  <img class="rating-icon" src="/wp-content/uploads/2019/10/icon-japanese-flower.svg">
                  <?php the_title(); ?>
                </h3>
                <?php the_excerpt(); ?>
              </a>
            </li>
          <?php }
            wp_reset_postdata();
            if (isset($posts) && !empty($posts)) { ?>
            <li>
              <a title="<?php echo $destination->name; ?>" href="<?php echo get_term_link($destination->term_id) ?>">
                Xem thêm<i class="ml-2 fa fa-angle-down"></i>
              </a>
            </li>
          <?php } ?>
        </ul>
      </div>
    </div>
  <?php endforeach; ?>
</section>