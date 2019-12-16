<?php
/**
 * Template Name: About Page
 */
get_header(); ?>
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
    <hr id="datmuasach" class="mb-5 mt-0">
    <h2 class="main-title"><?= pll__('Đặt mua sách') ?></h2>
    <?php 
    $form = get_field('book_form');
    echo do_shortcode('[contact-form-7 id="' . $form->id . '" html_class="border py-4 px-4" title="' . $form->post_title . '"]'); 
    ?>
  </div>
</section>
<!--END  Pull HTML here-->
<script type="text/javascript">
  jQuery('[name="total"]').attr('readonly', true).val(0);

  function formatNumber(num) {
    return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')
  }

  function totalPrice() {
    var quantity = jQuery('[name="quanlity"] option:selected').val() * 1;
    var province = jQuery('[name="khu_vuc_nhan"] option:selected').val();
    var book_series = jQuery('[name="book_type"] option:selected').val();
    var book_price = 0;
    var fee = 0;
    if ( book_series === 'Japan Guide (Giá: 105.000 đồng/ quyển)' ) {
      book_price = 105000;
    } 
    if ( province === 'Khác (20.000 đồng / đơn hàng)' ) {
      fee = 20000;
    } 
    var totalnotship = quantity * book_price;
    // if(quantity == 1){
    //   totalnotship = totalnotship - (totalnotship * 0.1);
    // }
    // else if(quantity == 2){
    //   totalnotship = totalnotship - (totalnotship * 0.2);
    // }else if(quantity > 2){
    //   totalnotship = totalnotship - (totalnotship * 0.3);
    // }
    jQuery('[name="total"]').val(formatNumber(totalnotship + fee) + ' vnđ');
  }

  totalPrice();

  jQuery(document).on('change', '[name="quanlity"],[name="book_type"],[name="khu_vuc_nhan"]', function() {
    totalPrice();
  });

  jQuery('a[href^="#"]').on('click touch', function (e) {
    e.preventDefault();
    var el = jQuery(this).attr('href');
    if (jQuery(el).length > 0) {
      var scrollTop = $(el).offset().top;
      jQuery('html, body').animate({ scrollTop: scrollTop - 75 });
    }
  });
</script>
<?php get_footer();
