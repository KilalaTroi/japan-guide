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

<section id="top-category" class="block kilala-animation">
  <h2 class="main-title"><?php echo pll__('Popular topic'); ?></h2>
  <div class="row">
    <div class="col-12 top-interest">
      <?php
      if (empty($categories) || NULL === $categories) {
        $categories = get_categories_top();
      }
      ?>
      <ul class="row">
        <?php
        foreach ($categories as $categorie) :
          $sub_image = get_field('sub_image', $categorie->taxonomy . '_' . $categorie->term_id);
          $sub_image = isset($sub_image) && !empty($sub_image) ? $sub_image['sizes']['thumbnail']  : no_img('8218');
          printf('<li class="col-6 col-sm-4 col-lg-12 kilala-animation-item" data-animate><a title="%1$s" href="%2$s"><img class="top-interest-icon" src="%3$s">%1$s</a></li>', $categorie->name, get_term_link($categorie->term_id), $sub_image);
        endforeach; ?>
      </ul>
    </div>
  </div>
</section>

<?php /*
<section id="top-category" class="block kilala-animation">
  <h2 class="main-title"><?php echo pll__('Popular topic'); ?></h2>
  <div class="row">
    <div class="col-12 top-interest">
      <?php
      if (empty($categories) || NULL === $categories) {
        $categories = get_categories_top();
      }
      ?>
      <ul class="row">
        <?php
        foreach ($categories as $categorie) :
          $sub_image = get_field('sub_image', $categorie->taxonomy . '_' . $categorie->term_id);
          $sub_image = isset($sub_image) && !empty($sub_image) ? $sub_image['sizes']['thumbnail']  : no_img('8218');
          printf('<li class="col-6 col-sm-4 col-lg-12 kilala-animation-item" data-animate><a title="%1$s" href="%2$s"><img class="top-interest-icon" src="%3$s">%1$s</a></li>', $categorie->name, get_term_link($categorie->term_id), $sub_image);
        endforeach; ?>
      </ul>
    </div>
  </div>
</section>

*/ ?>