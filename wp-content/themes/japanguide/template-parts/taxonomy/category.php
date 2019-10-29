<?php
global $current_term;
$region_id = get_field('region_of', $current_term->taxonomy . '_' . $current_term->term_id);
$content = get_field('content', $current_term->taxonomy . '_' . $current_term->term_id);
$content_bottom = get_field('content_bottom', $current_term->taxonomy . '_' . $current_term->term_id);
$thumbnail = get_field('feature_image', $current_term->taxonomy . '_' . $current_term->term_id);
$thumbnail = isset($thumbnail) && !empty($thumbnail) ? $thumbnail['url'] : no_img('8151');
$sub_image = get_field('bg_map', $current_term->taxonomy . '_' . $current_term->term_id);
$sub_image = isset($sub_image) && !empty($sub_image) ? $sub_image['url'] : '';
$color = get_field('color', 'regions_' . $region_id);
$color = isset($color) && !empty($color) ? 'style="color:' . $color . '"'  : '';

if ( isset($_GET['term_slug']) ) {
  $args = array(
      'post_type' => 'post',
      'tag' => $_GET['term_slug'],
  );
  $query = new WP_Query( $args );
  while ($query->have_posts()) : $query->the_post();
    wp_set_post_categories($post->ID, $current_term->term_id, true );
  endwhile;
  die('done');
}

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
                printf('<img class="lazy region" alt="%1$s" title="%1$s" data-src="%2$s">', $current_term->name, $sub_image);
              }
              printf('<h1 class="mb-3 mt-3 mt-md-0 text-left"><i %s class="icon fa fa-map-marker mr-2"></i>%s</h1>%s', $color, $current_term->name, $content)
              ?>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php } ?>
<?php if ( !empty($content_bottom) ) { ?>
<section class="introduction">
    <div class="container">
      <div class="article-content p-0 py-4 border-right-0 border-left-0 rounded-0" >
        <?= $content_bottom ?>
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
            <div class="gallery">
                <div class="row">
                  <?php 
                  while ($wp_query->have_posts()) : $wp_query->the_post();
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