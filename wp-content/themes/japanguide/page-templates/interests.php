<?php

/**
 * Template Name: Interests Page
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
        <section class="block kilala-animation-2">
          <h2 class="main-title-lg kilala-animation-item" data-animate>
            <?php printf('%s <thin>%s</thin>', pll__('Topic'), pll__('popular')); ?>
          </h2>
          <div class="row galleries">
            <?php
            $categories = get_taxonomy_type('interest');
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
        </section>
        <section class="top-dest block">
          <?php
          if (empty($categories) || NULL === $categories) {
            $categories = get_categories_top();
          }
          foreach ($categories as $category) :
            $sub_image = get_field('feature_image', $category->taxonomy . '_' . $category->term_id);
            $sub_image = isset($sub_image) && !empty($sub_image) ? $sub_image['sizes']['medium']  : no_img('8151');
            ?>
            <div class="row">
              <div class="col-12 top-dest-title">
                <?php printf('<h2 class="main-title">%s</h2>', $category->name) ?>
              </div>
              <div class="col-md-5 top-dest-map">
                <?php printf('<img title="%1$s" alt="%1$s" src="%2$s" />', $category->name, $sub_image) ?>
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
                        'terms' => $category->term_id,
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
                      <a title="<?php echo $category->name; ?>" class="extra-link" href="<?php echo get_term_link($category->term_id) ?>">
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
