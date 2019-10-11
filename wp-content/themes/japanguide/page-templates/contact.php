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
            <?php printf('<h1>%s</h1> <p class="text-uppercase">%s</p>', pll__('Liên hệ'), pll__('')); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="contact" class="block">
  <div class="container">
    <form action="#" method="post" class="border py-4 px-4">
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputEmail4">Họ tên</label>
          <input type="email" class="form-control" id="inputEmail4" >
        </div>
        <div class="form-group col-md-6">
          <label for="inputPassword4">Email</label>
          <input type="password" class="form-control" id="inputPassword4">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputEmail4">Số điện thoại</label>
          <input type="email" class="form-control" id="inputEmail4" >
        </div>
        <div class="form-group col-md-6">
          <label for="inputPassword4">Địa chỉ</label>
          <input type="password" class="form-control" id="inputPassword4">
        </div>
      </div>
      <div class="form-group">
        <label for="inputAddress2">Nội dung</label>
        <textarea rows="2" class="form-control"></textarea>
      </div>
      <div class="form-group text-right mb-0">
        <button type="submit" class="btn btn-primary">Xác nhận</button>
      </div>
    </form>
  </div>
</section>
<!--END  Pull HTML here-->
<?php get_footer();
