<section id="top-category" class="block">
  <h2 class="main-title"><?php echo pll__('Popular topic'); ?></h2>
  <div class="row">
    <div class="col-12 top-interest">
      <?php
      if (empty($topics1) || NULL === $topics1) {
        $topics1 = get_topics_top();
      }
      ?>
      <ul class="row">
        <?php
        foreach ($topics1 as $topic) :
          $sub_image = get_field('sub_image', $topic->taxonomy . '_' . $topic->term_id);
          $sub_image = isset($sub_image) && !empty($sub_image) ? $sub_image['sizes']['thumbnail']  : no_img('8218');
          printf('<li class="col-6 col-sm-4 col-lg-12"><a style="background-image: url(%3$s)" title="%1$s" href="%2$s">%1$s</a></li>', $topic->name, get_term_link($topic->term_id), $sub_image);
        endforeach; ?>
      </ul>
    </div>
  </div>
</section>