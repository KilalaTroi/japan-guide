<?php

/**
 * Template Name: Destinations Page
 */
get_header();
?>
<!--Start Pull HTML here-->
<?php echo get_breadcrumb(); ?>

<section id="banner" class="kilala-animation">
  <div id="myCarousel" class="carousel slide has-cap" data-ride="carousel">
    <div class="carousel-inner kilala-animation-item" data-animate>
      <div class="carousel-item active h-auto">
        <div class="container">
          <?php
          $feature_img  = wpedu_get_option('des_feature_image');
          $feature_img_m  = wpedu_get_option('des_feature_image_mb');
          if (isset($feature_img['id']) && !empty($feature_img['id'])) {
            echo wp_get_attachment_image($feature_img['id'], 'full', false, array('class' => 'img-fluid d-none d-lg-block'));
          }
          if (isset($feature_img_m['id']) && !empty($feature_img_m['id'])) {
            echo wp_get_attachment_image($feature_img_m['id'], 'large', false, array('class' => 'd-block d-lg-none img-fluid'));
          } elseif (isset($feature_img['id']) && !empty($feature_img['id'])) {
            echo wp_get_attachment_image($feature_img['id'], 'large', false, array('class' => 'd-block d-lg-none img-fluid'));
          }
          ?>
          <div class="carousel-caption">
            <?php printf('<h1>%s</h1> <p class="text-uppercase">%s</p>', pll__('Japan'), pll__('Tìm điểm đến yêu thích của bạn')); ?>
          </div>
        </div>
      </div>
    </div>
  </div>


</section>

<section>
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <section class="block kilala-animation-1">
          <div class="row">
            <div class="col-12">
              <!-- map -->
              <?php get_template_part('template-parts/blocks/global/map') ?>
            </div>
          </div>
        </section>

        <section class="block" id="stop-dest">
          <h2 class="main-title-lg">
            <?php printf('%s', pll__('Destinations')); ?>
          </h2>
          <div class="row gallery-cards kilala-animation-2">
            <?php
            if (empty($destinations_top) || NULL === $destinations_top) {
              $destinations_top = get_destinations_top();
            }
            foreach ($destinations_top as $k => $v) :
              $thumbnail = get_field('feature_image', $v->taxonomy . '_' . $v->term_id);
              $thumbnail = isset($thumbnail) && !empty($thumbnail) ? $thumbnail['sizes']['large']  : no_img('8151');
              $description_cotnent = get_short_text($v->description, 345);
              $sort_description = get_short_text($v->description, 70);
              ?>
              <div class="col-6 col-xl-4 gallery kilala-animation-item" data-animate>
                <a class="link-gallery" alt="<?php echo $v->name; ?>" title="<?php echo $v->name; ?>" href="<?php echo get_term_link($v->term_id); ?>">
                  <div class="link-gallery-image">
                    <figure class="image">
                      <div class="image-mask" style="background-image: url(<?php echo $thumbnail; ?>)">
                      </div>
                    </figure>
                    <div class="link-gallery-image-text">
                      <div class="link-gallery-image-text-content">
                        <?php echo $description_cotnent; ?>
                      </div>
                    </div>
                  </div>
                  <div class="link-gallery-desc">
                    <h3><?php echo $v->name; ?></h3>
                    <p class="d-none d-sm-block"><?php echo $sort_description; ?></p>
                  </div>
                </a>
              </div>
            <?php endforeach; ?>
          </div>
        </section>

        <section class="top-dest block">
          <?php
          if (empty($destinations) || NULL === $destinations) {
            $destinations = get_destinations_map();
          }
          foreach ($destinations as $destination) :
            $sub_image = get_field('sub_image', $destination->taxonomy . '_' . $destination->term_id);
            $sub_image = isset($sub_image) && !empty($sub_image) ? $sub_image['sizes']['medium']  : no_img('8151');
            $color = get_field('color', $destination->taxonomy . '_' . $destination->term_id);
            $color = isset($color) && !empty($color) ? 'style="color:' . $color . '"'  : '';
            ?>
            <div class="row">
              <div class="col-12 top-dest-title">
                <h2 class="main-title">
                  <?php printf('<i %s class="fa fa-map-marker mr-2"></i>%s</h2>', $color, $destination->name) ?>
              </div>
              <div class="col-md-5 top-dest-map">
                <?php printf('<img title="%1$s" alt="%1$s" src="%2$s" />', $destination->name, $sub_image) ?>
              </div>
              <div class="col-md-7 top-dest-text mt-3 mt-md-0">
                <?php
                  $posts = get_posts(array(
                    'post_type'      => 'post',
                    'posts_per_page' => 3,
                    'post_status' => 'publish',
                    'tax_query' => array(
                      array(
                        'taxonomy' => 'category',
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
                      </a>
                      <?php the_excerpt(); ?>
                    </li>
                  <?php }
                    wp_reset_postdata();
                    if (isset($posts) && !empty($posts)) { ?>
                    <li>
                      <a title="<?php echo $destination->name; ?>" class="extra-link" href="<?php echo get_term_link($destination->term_id) ?>">
                        <?= pll__('More') ?><i class="ml-2 fa fa-angle-down"></i>
                      </a>
                    </li>
                  <?php } ?>
                </ul>
              </div>
            </div>
          <?php endforeach; ?>
        </section>
      </div>
      <div class="col-lg-4 pl-lg-4 has-border-top-sp">
        <?php get_sidebar('right'); ?>
      </div>
    </div>
  </div>
</section>
<!--END  Pull HTML here-->
<?php get_footer();
