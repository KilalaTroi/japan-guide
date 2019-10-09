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