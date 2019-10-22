<?php
/**
 * Template Name: About Page
 */
get_header();
?>
<?php echo get_breadcrumb(); ?>

<section id="contact" class="block no-banner">
  <div class="container">
    <div class="content pb-3 pb-md-5 overflow-hidden">
      <?php the_content() ?>
    </div>
    <!-- Grid row -->
    <div class="gallery-photo pb-5" id="gallery">

      <!-- Grid column -->
      <div class="mb-3 pics animation">
        <img class="w-100 img-fluid" src="<?= ASSETS_PATH ?>images/gallery/g1-2.png" alt="Card image cap">
      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="mb-3 pics animation">
        <img class="w-100 img-fluid" src="<?= ASSETS_PATH ?>images/gallery/g1-1.png" alt="Card image cap">
      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="mb-3 pics animation">
        <img class="w-100 img-fluid" src="<?= ASSETS_PATH ?>images/gallery/g2-1.png" alt="Card image cap">
      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="mb-3 pics animation">
        <img class="w-100 img-fluid" src="<?= ASSETS_PATH ?>images/gallery/g2-2.png" alt="Card image cap">
      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="mb-3 pics animation">
        <img class="w-100 img-fluid" src="<?= ASSETS_PATH ?>images/gallery/g3-1.png" alt="Card image cap">
      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="mb-3 pics animation">
        <img class="w-100 img-fluid" src="<?= ASSETS_PATH ?>images/gallery/g3-2.png" alt="Card image cap">
      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="mb-3 pics animation">
        <img class="w-100 img-fluid" src="<?= ASSETS_PATH ?>images/gallery/g4-2.png" alt="Card image cap">
      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="mb-3 pics animation">
        <img class="w-100 img-fluid" src="<?= ASSETS_PATH ?>images/gallery/g4-1.png" alt="Card image cap">
      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->
    <h2 class="main-title"><?= pll__('Đăng ký mua sách') ?></h2>
    <?php echo do_shortcode('[contact-form-7 id="8354" html_class="border py-4 px-4" title="Contact Form VI"]') ?>
  </div>
</section>
<!--END  Pull HTML here-->
<?php get_footer();
