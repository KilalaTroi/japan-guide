<?php
/**
 * Template Name: About Page
 */
get_header();
?>
<style type="text/css" media="screen">
  .about-page > .content {
    background: url('<?= ASSETS_PATH ?>images/gallery/bg-about.jpg');
    background-size: 100% auto;
    background-position: center top;
    background-repeat: no-repeat;
  }
</style>
<?php echo get_breadcrumb(); ?>

<section id="contact" class="block no-banner">
  <div class="container about-page">
    <div class="content pb-3 pt-5 px-4 pb-md-5 overflow-hidden">
      <?php the_content() ?>
    </div>

    <div class="pb-5">
      <div class="row d-flex justify-content-between align-items-center flex-wrap">
        <div class="col-12 col-md-3 my-3 col-xl-auto">
          <img data-src="<?= ASSETS_PATH ?>images/img-phat-hanh.png" alt="phat-hanh" class="lazy img-fluid">
        </div>
        <div class="col-12 col-md-3 my-3 col-xl-auto">
          <img data-src="<?= ASSETS_PATH ?>images/fahasa.jpg" alt="fahasa" class="lazy img-fluid">
        </div>
        <div class="col-12 col-md-3 my-3 col-xl-auto">
          <img data-src="<?= ASSETS_PATH ?>images/phuong-nam.png" alt="phuong-nam" class="lazy img-fluid">
        </div>
        <div class="col-12 col-md-3 my-3 col-xl-auto">
          <img data-src="<?= ASSETS_PATH ?>images/tiki.png" alt="tiki" class="lazy img-fluid">
        </div>
      </div>
    </div>
    <!-- Grid row -->
    <h2 class="main-title"><?= pll__('Magazine') ?></h2>
    <div class="gallery-photo pb-5" id="gallery">

      <!-- Grid column -->
      <div class="mb-3 pics animation">
        <img class="lazy w-100 img-fluid" data-src="<?= ASSETS_PATH ?>images/gallery/g1-2.png" alt="Kilala Travel Book Series 1.2">
      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="mb-3 pics animation">
        <img class="lazy w-100 img-fluid" data-src="<?= ASSETS_PATH ?>images/gallery/g1-1.jpg" alt="Kilala Travel Book Series 1.1">
      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="mb-3 pics animation">
        <img class="lazy w-100 img-fluid" data-src="<?= ASSETS_PATH ?>images/gallery/g2-1.jpg" alt="Kilala Travel Book Series 2.1">
      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="mb-3 pics animation">
        <img class="lazy w-100 img-fluid" data-src="<?= ASSETS_PATH ?>images/gallery/g2-2.png" alt="Kilala Travel Book Series 2.2">
      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="mb-3 pics animation">
        <img class="lazy w-100 img-fluid" data-src="<?= ASSETS_PATH ?>images/gallery/g3-1.jpg" alt="Kilala Travel Book Series 3.1">
      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="mb-3 pics animation">
        <img class="lazy w-100 img-fluid" data-src="<?= ASSETS_PATH ?>images/gallery/g3-2.png" alt="Kilala Travel Book Series 3.2">
      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="mb-3 pics animation">
        <img class="lazy w-100 img-fluid" data-src="<?= ASSETS_PATH ?>images/gallery/g4-2.png" alt="Kilala Travel Book Series 4.2">
      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="mb-3 pics animation">
        <img class="lazy w-100 img-fluid" data-src="<?= ASSETS_PATH ?>images/gallery/g4-1.jpg" alt="Kilala Travel Book Series 4.1">
      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->
    <h2 class="main-title"><?= pll__('Đăng ký mua sách') ?></h2>
    <?php echo do_shortcode('[contact-form-7 id="9053" html_class="border py-4 px-4" title="Đăng ký mua sách"]') ?>
  </div>
</section>
<!--END  Pull HTML here-->
<?php get_footer();
