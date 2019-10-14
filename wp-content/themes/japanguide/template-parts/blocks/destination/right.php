<section class="block kilala-animation">
  <h2 class="main-title kilala-animation-item" data-animate><?php echo pll__('Japan travel news'); ?></h2>
  <div class="row">
    <?php
    $postRight = new WP_Query(
      array(
        'post_type'      => 'post',
        'posts_per_page' => 5,
        'post_status' => 'publish',
      )
    );
    ?>
    <?php
    if ($postRight->have_posts()) {
      while ($postRight->have_posts()) : $postRight->the_post();
        $thumb = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail');
        $thumb = isset($thumb) && !empty($thumb) ? $thumb : no_img('8151', 'thumbnail');
        $taxonomy_destination = get_primary_taxonomy();
        $color = get_field('color', $taxonomy_destination->taxonomy . '_' . $taxonomy_destination->term_id);
        $color = isset($color) && !empty($color) ? 'style="color:'.$color.'"'  : '';
        include(APP_PATH . '/template-parts/components/article_right.php');
       endwhile;
    } ?>
  </div>
</section>
<?php get_template_part('template-parts/components/top_category_right') ?>
<?php //get_template_part('template-parts/components/survey_right') ?>