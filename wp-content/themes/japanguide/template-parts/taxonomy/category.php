<?php
global $current_term;
$content = get_field('content', $current_term->taxonomy . '_' . $current_term->term_id);
$thumbnail = get_field('feature_image', $current_term->taxonomy . '_' . $current_term->term_id);
$thumbnail = isset($thumbnail) && !empty($thumbnail) ? $thumbnail['url'] : no_img('8151');
$sub_image = get_field('bg_map', $current_term->taxonomy . '_' . $current_term->term_id);
$sub_image = isset($sub_image) && !empty($sub_image) ? $sub_image['url'] : '';
$color = get_field('color', $current_term->taxonomy . '_' .  $current_term->term_id);
$color = isset($color) && !empty($color) ? 'style="color:' . $color . '"'  : '';
?>
<?php echo get_breadcrumb(); ?>
<?php if (!empty($thumbnail) && !empty($content)) { ?>
  <section id="intro" class="kilala-animation">
    <div class="container">
      <div class="intro-wrapper pb-25 align-items-center">
        <div class="row">
          <div class="col-md-6 media kilala-animation-item" data-animate>
            <?php printf('<img class="mw-100" alt="%1$s" title="%1$s" class="img-fluid" src="%2$s">', $current_term->name, $thumbnail) ?>
          </div>
          <div class="col-md-6 content text-justify kilala-animation-item" data-animate>
            <?php
              if (!empty($sub_image)) {
                printf('<img class="region" alt="%1$s" title="%1$s" src="%2$s">', $current_term->name, $sub_image);
              }
              printf('<h1><i %s class="icon fa fa-map-marker mr-2"></i>%s</h1>%s', $color, $current_term->name, $content)
              ?>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php } ?>
<section class="no-banner">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 kilala-animation">
        <section class="block kilala-animation-item" data-animate>
          <h2 class="main-title-lg">
            <?php printf('%s <thin>%s %s</thin>', pll__('Post'), pll__('about'), $current_term->name); ?>
          </h2>
          <div class="row gallery-cards sm">
            <!-- <div class="gallery"> -->
            <!-- <div class="row align-items-stretch"> -->
            <?php while (have_posts()) : the_post();
              $img = get_the_post_thumbnail_url($post->ID, 'feature-image');
              $img = isset($img) && !empty($img) ? $img : no_img('8151', 'feature-image');
              $taxonomy_destination = get_term($current_term->term_id,'category');
              $color = get_field('color', $taxonomy_destination->taxonomy . '_' . $taxonomy_destination->term_id);
              $color = isset($color) && !empty($color) ? 'style="color:' . $color . '"'  : '';
              include(APP_PATH . '/template-parts/components/article_col_3.php');
            endwhile;
            ?>
            <!-- </div> -->
            <!-- </div> -->
          </div>
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