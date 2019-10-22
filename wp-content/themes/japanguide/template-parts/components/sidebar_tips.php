<section class="block kilala-animation">
  <h2 class="main-title kilala-animation-item" data-animate><?php echo pll__('Japan travel news'); ?></h2>
  <div class="row">
    <?php
    $postRight = new WP_Query(
      array(
        'post_type'      => 'post',
        'posts_per_page' => 5,
        'post_status' => 'publish',
        'lang'           => LANGUAGE_SLUG,
        'post__not_in' => $exlucdes,
        'orderby' => 'rand',
        'tax_query' => array(
          array(
            'taxonomy' => 'topics',
            'field' => 'term_id',
            'terms' => '1412',
          )
        )
      )
    );
    ?>
    <?php
    if ($postRight->have_posts()) {
      while ($postRight->have_posts()) : $postRight->the_post();
        $thumb = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail');
        $thumb = isset($thumb) && !empty($thumb) ? $thumb : no_img('8151', 'thumbnail');
        $taxonomy_destination = get_primary_taxonomy();
        $region_id = get_field('region_of', $taxonomy_destination->taxonomy . '_' . $taxonomy_destination->term_id);
        $color = get_field('color', 'regions_' . $region_id);
        $color = isset($color) && !empty($color) ? 'style="color:' . $color . '"'  : '';
        include(APP_PATH . '/template-parts/components/article_right.php');
      endwhile;
      wp_reset_query();
    } ?>
  </div>
</section>