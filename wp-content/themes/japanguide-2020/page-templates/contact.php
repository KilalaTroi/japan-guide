<?php
/**
 * Template Name: Contact Page
 */
get_header();
?>
<?php echo get_breadcrumb(); ?>
<!--Start Pull HTML here-->
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
            <?php printf('<h1>%s</h1> <p class="text-uppercase">%s</p>', pll__('Liên hệ'), pll__('')); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="contact" class="block">
  <div class="container">
    <?php echo do_shortcode('[contact-form-7 id="8354" html_class="border py-4 px-4" title="Contact Form VI"]') ?>
  </div>
</section>
<!--END  Pull HTML here-->
<?php get_footer();
