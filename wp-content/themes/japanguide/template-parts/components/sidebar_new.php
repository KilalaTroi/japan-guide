<section id="right-article" class="block kilala-animation">
  <h2 class="main-title kilala-animation-item" data-animate><?php echo pll__('Japan travel news'); ?></h2>
  <div class="row">
    <?php
    if (empty($post_right) || NULL === $post_right) {
      $post_right = get_post_right();
    }
    if ($post_right->have_posts()) {
      while ($post_right->have_posts()) : $post_right->the_post();
        $thumb = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail');
        $thumb = isset($thumb) && !empty($thumb) ? $thumb : no_img('8151', 'thumbnail');
        $taxonomy_destination = get_primary_taxonomy();
        $color = get_field('color', $taxonomy_destination->taxonomy . '_' . $taxonomy_destination->term_id);
        $color = isset($color) && !empty($color) ? 'style="color:' . $color . '"'  : '';
        include(APP_PATH . '/template-parts/components/article_right.php');
      endwhile;
    } ?>
  </div>
</section>