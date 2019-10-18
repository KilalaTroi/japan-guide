<?php
global $current_term;
echo get_breadcrumb(); ?>
<section class="no-banner">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <section class="block">
          <h1 class="main-title-lg"><?php printf('%s <thin>%s %s</thin>', pll__('Post'), pll__('about'), $current_term->name); ?></h1>
          <!-- <div class="row gallery-cards sm"> -->
          <!-- <div class="gallery"> -->
          <div class="row gallery-cards sm">
            <?php while (have_posts()) : the_post();
              $img = get_the_post_thumbnail_url(get_the_ID(), 'feature-image');
              $img = isset($img) && !empty($img) ? $img : no_img('8151', 'feature-image');
              $taxonomy_destination = get_primary_taxonomy(get_the_ID());
              $color = get_field('color', $taxonomy_destination->taxonomy . '_' . $taxonomy_destination->term_id);
              $color = isset($color) && !empty($color) ? 'style="color:' . $color . '"'  : '';
              include(APP_PATH . '/template-parts/components/article_col_3.php');
            endwhile;
            ?>
          </div>
          <!-- </div> -->
          <!-- </div> -->
          <div class="div-pagination ">
            <?php
            if (function_exists("fellowtuts_wpbs_pagination")) {
              fellowtuts_wpbs_pagination();
              // fellowtuts_wpbs_pagination($wp_query->max_num_pages);
            }
            ?>
          </div>
        </section>
      </div>
      <div class="col-lg-4 pl-lg-4 has-border-top-sp">
        <?php get_sidebar('taxonomy'); ?>
      </div>
    </div>
  </div>
</section>