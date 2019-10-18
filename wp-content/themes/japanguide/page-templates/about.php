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
        <img class="img-fluid" src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(73).jpg" alt="Card image cap">
      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="mb-3 pics animation">
        <img class="img-fluid" src="https://mdbootstrap.com/img/Photos/Vertical/mountain1.jpg" alt="Card image cap">
      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="mb-3 pics animation">
        <img class="img-fluid" src="https://mdbootstrap.com/img/Photos/Vertical/mountain2.jpg" alt="Card image cap">
      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="mb-3 pics animation">
        <img class="img-fluid" src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(35).jpg" alt="Card image cap">
      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="mb-3 pics animation">
        <img class="img-fluid" src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(18).jpg" alt="Card image cap">
      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="mb-3 pics animation">
        <img class="img-fluid" src="https://mdbootstrap.com/img/Photos/Vertical/mountain3.jpg" alt="Card image cap">
      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="mb-3 pics animation">
        <img class="img-fluid" src="https://mdbootstrap.com/img/Photos/Vertical/mountain2.jpg" alt="Card image cap">
      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="mb-3 pics animation">
        <img class="img-fluid" src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(35).jpg" alt="Card image cap">
      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->
    <h2 class="main-title"><?= pll__('Liên hệ') ?></h2>
    <?php echo do_shortcode('[contact-form-7 id="8354" html_class="border py-4 px-4" title="Contact Form VI"]') ?>
  </div>
</section>
<style type="text/css" media="screen">
  .gallery-photo {
-webkit-column-count: 3;
-moz-column-count: 3;
column-count: 3;
-webkit-column-width: 25%;
-moz-column-width: 25%;
column-width: 25%; }
.gallery-photo .pics {
-webkit-transition: all 350ms ease;
transition: all 350ms ease; }
.gallery-photo .animation {
-webkit-transform: scale(1);
-ms-transform: scale(1);
transform: scale(1); }

@media (max-width: 767px) {
.gallery-photo {
-webkit-column-count: 2;
-moz-column-count: 2;
column-count: 2;
-webkit-column-width: 50%;
-moz-column-width: 50%;
column-width: 50%;
}
}

@media (max-width: 450px) {
.gallery-photo {
-webkit-column-count: 1;
-moz-column-count: 1;
column-count: 1;
-webkit-column-width: 100%;
-moz-column-width: 100%;
column-width: 100%;
}
}
</style>
<!--END  Pull HTML here-->
<?php get_footer();
