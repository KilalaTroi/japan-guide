<?php
global $current_term;
$region_id = get_field('region_of', $current_term->taxonomy . '_' . $current_term->term_id);
$content = get_field('content', $current_term->taxonomy . '_' . $current_term->term_id);
$thumbnail = get_field('feature_image', $current_term->taxonomy . '_' . $current_term->term_id);
$thumbnail = isset($thumbnail) && !empty($thumbnail) ? $thumbnail['url'] : no_img('8151');
$sub_image = get_field('bg_map', $current_term->taxonomy . '_' . $current_term->term_id);
$sub_image = isset($sub_image) && !empty($sub_image) ? $sub_image['url'] : '';
$color = get_field('color', 'regions_' . $region_id);
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
      <div class="col-lg-12 kilala-animation">
        <section class="block kilala-animation-item" data-animate>
          <h2 class="main-title-lg">
            <?php printf('%s <thin>%s %s</thin>', pll__('Post'), pll__('about'), $current_term->name); ?>
          </h2>
          <div class="row gallery-cards sm">
            <?php 
            while ($wp_query->have_posts()) : $wp_query->the_post();
              $img = get_the_post_thumbnail_url($post->ID, 'feature-image');
              $img = isset($img) && !empty($img) ? $img : no_img('8151', 'feature-image');
              $taxonomies = get_the_terms($post->ID, 'category');
              $taxo_primary = get_primary_taxonomy($post->ID);
              $region_id = get_field('region_of', $taxo_primary->taxonomy . '_' . $taxo_primary->term_id);
              $color = get_field('color', 'regions_' . $region_id);
              $color = isset($color) && !empty($color) ? 'style="color:' . $color . '"'  : '';
              include(APP_PATH . '/template-parts/components/article_col_4.php');
            endwhile;
            ?>
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