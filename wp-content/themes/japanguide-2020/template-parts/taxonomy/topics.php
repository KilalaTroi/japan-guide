<?php
global $current_term;
echo get_breadcrumb(); ?>
<section class="no-banner">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <section class="block">
          <h1 class="main-title-lg"><?php printf('%s <thin>%s %s</thin>', pll__('Post'), pll__('about'), $current_term->name); ?></h1>
          <div class="row gallery-cards sm">
            <div class="gallery">
                <div class="row">
                  <?php while (have_posts()) : the_post();
                    $img = get_the_post_thumbnail_url($post->ID, 'feature-image');
                    $img = isset($img) && !empty($img) ? $img : no_img('8151', 'feature-image');
                    $taxonomies = get_the_terms($post->ID, 'category');
                    include(APP_PATH . '/template-parts/components/article_col_4.php');
                  endwhile;
                  ?>
                </div>
              </div>
          </div>
          <div class="div-pagination mt-4">
            <?php
            if (function_exists("fellowtuts_wpbs_pagination")) {
              fellowtuts_wpbs_pagination();
            }
            ?>
          </div>
        </section>
      </div>
    </div>
  </div>
</section>