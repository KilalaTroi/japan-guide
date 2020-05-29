<?php

/**
 * Template Name: Regions Page
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
          if ( has_post_thumbnail() ) {
            the_post_thumbnail('full',array('class' => 'img-fluid d-none d-lg-block'));
          }
          $feature_img_m  = get_field('featured_image_mobile');
          if (isset($feature_img_m) && !empty($feature_img_m)) {
            echo wp_get_attachment_image($feature_img_m['id'], 'large', false, array('class' => 'd-block d-lg-none img-fluid'));
          } else{
            the_post_thumbnail('large',array('class' => 'd-block d-lg-none img-fluid'));
          }
          ?>
          <div class="carousel-caption">
            <?php printf('<h1>%s</h1> <p class="text-uppercase">%s</p>', pll__('Japan'), pll__('Find your favorite region')); ?>
          </div>
        </div>
      </div>
    </div>
  </div>


</section>

<section>
  <div class="container sticky-container">
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

        <section class="top-dest block">
          <?php
          if (empty($maps) || NULL === $maps) {
            $maps = get_map();
          }
          foreach ($maps as $map) :
            $sub_image = get_field('sub_image', $map->taxonomy . '_' . $map->term_id);
            $sub_image = isset($sub_image) && !empty($sub_image) ? $sub_image['sizes']['medium']  : no_img('8151');
            $color = get_field('color', $map->taxonomy . '_' . $map->term_id);
            $color = isset($color) && !empty($color) ? 'style="color:' . $color . '"'  : '';
            ?>
            <div class="row">
              <div class="col-12 top-dest-title">
                <h2 class="main-title">
                  <?php printf('<i %s class="fa fa-map-marker mr-2"></i>%s</h2>', $color, $map->name) ?>
              </div>
              <div class="col-md-5 top-dest-map">
                <?php printf('<img class="img-fluid lazy" title="%1$s" alt="%1$s" data-src="%2$s" />', $map->name, $sub_image) ?>
              </div>
              <div class="col-md-7 top-dest-text mt-3 mt-md-0">
                <?php
                  $destinations = get_field('destinations', $map->taxonomy . '_' . $map->term_id);
                  $excludes = array();
                  $id = array();
                  foreach ($destinations as $destination) {
                    $id[] = $destination;
                  }
                  $posts = get_posts(array(
                    'post_type'      => 'post',
                    'posts_per_page' => 3,
                    'post_status' => 'publish',
                    'exclude' => $excludes,
                    'tax_query' => array(
                      array(
                        'taxonomy' => 'category',
                        'field' => 'term_id',
                        'terms' => $id,
                      )
                    ),
                  ));
                  global $post;
                  ?>
                <ul>
                  <?php foreach ($posts as $post) {
                      setup_postdata($post);
                      $excludes[] = get_the_ID();
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
                      <a title="<?php echo $map->name; ?>" class="extra-link" href="<?php echo get_term_link($map->term_id) ?>">
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
      <div class="col-lg-4 pl-lg-4 has-border-top-sp" id="sidebar">
        <?php get_sidebar('taxonomy'); ?>
      </div>
    </div>
  </div>
</section>
<!--END  Pull HTML here-->
<?php get_footer();