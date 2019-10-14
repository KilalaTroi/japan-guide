<?php

/**
 * Template Name: Destination Page
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
        <?php get_template_part('template-parts/blocks/destination/left') ?>
      </div>
      <div class="col-lg-4 pl-lg-4 has-border-top-sp">
        <?php get_template_part('template-parts/blocks/destination/right') ?>
      </div>
    </div>
  </div>
</section>
<!--END  Pull HTML here-->
<?php get_footer();
