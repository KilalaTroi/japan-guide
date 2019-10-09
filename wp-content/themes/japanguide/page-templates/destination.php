<?php

/**
 * Template Name: Destination Page
 */
get_header();
?>
<!--Start Pull HTML here-->
<?php echo get_breadcrumb(); ?>

<section id="banner">
  <div id="myCarousel" class="carousel slide has-cap" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <div class="container">
          <?php
          if (has_post_thumbnail(get_the_ID())) : the_post_thumbnail('full', array('class' => 'img-fluid d-none d-lg-block'));
          endif;
          $class_mobile = 'd-block d-lg-none img-fluid';
          $field_featured_image_mobile = get_field('featured_image_mobile', get_the_ID());
          $featured_image_mobile = get_the_post_thumbnail('large', array('class' => $class_mobile));
          if (isset($field_featured_image_mobile) && !empty($field_featured_image_mobile)) {
            $featured_image_mobile = wp_get_attachment_image($field_featured_image_mobile['id'], 'large', false, array('class' => $class_mobile));
          }
          echo $featured_image_mobile;
          ?>
          <div class="carousel-caption">
            <?php printf('<h1>%s</h1> <p class="text-uppercase">%s</p>', pll__('Japan'), pll__('Tìm điểm đến yêu thích của bạn')); ?>
          </div>
        </div>
      </div>
    </div>
  </div>


</section>

<section class="mt-3 mt-lg-5 pb-5">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <?php get_template_part('template-parts/blocks/destination/left') ?>
      </div>
      <div class="col-lg-4 pl-lg-4">
        <?php get_template_part('template-parts/blocks/destination/right') ?>
      </div>
    </div>
  </div>
</section>
<!--END  Pull HTML here-->
<?php get_footer();
