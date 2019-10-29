<?php

/**
 * Template Name: Videos
 */
get_header();
?>
<?php 
    $args = array(
      'post_type' => 'post',
      'post_status' => 'publish',
        'meta_query'    => array(
            array(
                'key'         => 'has_video',
                'value'          => true,
                'compare'     => '=',
            ),
        ),
    );
    $wp_query = new WP_Query($args);
?>
<?php echo get_breadcrumb(); ?>
<section class="no-banner">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 kilala-animation">
        <section class="block kilala-animation-item" data-animate>
          <h1 class="main-title-lg mt-3 mt-md-0">
            <?php the_title() ?>
          </h1>
          <div class="row gallery-cards sm">
            <div class="gallery">
                <div class="row">
                  <?php 
                  while ($wp_query->have_posts()) : $wp_query->the_post();
                    $img = get_the_post_thumbnail_url($post->ID, 'feature-image');
                    $img = isset($img) && !empty($img) ? $img : no_img('8151', 'feature-image');
                    $taxonomies = get_the_terms($post->ID, 'category');
                    $taxo_primary = get_primary_taxonomy($post->ID);
                    $region_id = get_field('region_of', $taxo_primary->taxonomy . '_' . $taxo_primary->term_id);
                    $color = get_field('color', 'regions_' . $region_id);
                    $color = isset($color) && !empty($color) ? 'style="color:' . $color . '"'  : '';
                    include(APP_PATH . '/template-parts/components/article_col_4.php');
                  endwhile;
                  ?>
                </div>
              </div>
          </div>
          <div class="div-pagination mt-4">
            <?php
            if (function_exists("fellowtuts_wpbs_pagination")) {
              fellowtuts_wpbs_pagination();
            }
            ?>
          </div>
        </section>
      </div>
    </div>
  </div>
</section>
<?php get_footer(); ?>