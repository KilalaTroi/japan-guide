<?php 
$categories = get_the_category(get_the_ID());

foreach ($categories as $category) {
  if (in_array($category->category_parent, array(7, 12)) === false && in_array($category->term_id, array(7, 12)) === false) {
    $category_id[] =  $category->term_id;
  }
}

$relate_category = new WP_Query(array(
  'post_type'      => 'post',
  'posts_per_page' => 3,
  'lang'           => LANGUAGE_SLUG,
  'post_status' => 'publish',
  'orderby' => 'rand',
  'post__not_in' => $exlucdes,
  'tax_query' => array(
    array(
      'taxonomy' => 'category',
      'field' => 'term_id',
      'terms' => $category_id,
    )
  ),
));

if ($relate_category->have_posts()) { ?>
  <section id="relate_category" class="block">
    <h2 class="main-title"><?php echo pll__('Posts same topic'); ?></h2>
    <div class="row gallery-cards sm">
      <div class="gallery">
        <div class="row">
          <?php
          while ($relate_category->have_posts()) {
            $exlucdes[] = get_the_ID();
            $relate_category->the_post();
            $img = get_the_post_thumbnail_url(get_the_ID(), 'feature-image');
            $img = isset($img) && !empty($img) ? $img : no_img('8151', 'thumbnail');
            $taxonomy_destination = get_primary_taxonomy(get_the_ID());
            $color = get_field('color', $taxonomy_destination->taxonomy . '_' . $taxonomy_destination->term_id);
            $color = isset($color) && !empty($color) ? 'style="color:' . $color . '"'  : '';
            include(APP_PATH . '/template-parts/components/article_col_3.php');
          }
          wp_reset_query(); ?>
        </div>
      </div>
    </div>
  </section>
<?php } ?>