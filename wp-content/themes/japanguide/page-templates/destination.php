<?php
/**
 * Template Name: Destination Page
 */
get_header();
?>
<!--Start Pull HTML here-->
<section id="banner">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item text-center active">
        <?php if (has_post_thumbnail(get_the_ID())) : the_post_thumbnail('full'); endif; ?>
        <div class="container">
          <div class="carousel-caption text-left">
            <h1 class="text-center">
              <?php printf('%s <br><thin>%s</thin>',pll__('Japan'),pll__('TÌM ĐIỂM ĐẾN YÊU THÍCH CỦA BẠN')); ?>
            </h1>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="mt-3 mt-lg-5">
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
