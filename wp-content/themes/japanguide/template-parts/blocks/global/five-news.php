<?php
$postHomeL = 'post_home_'.LANGUAGE_SLUG;
if (false === ($postHome = get_transient($postHomeL))) {
  $postHome = new WP_Query(
    array(
      'post_type'      => 'post',
      'posts_per_page' => 5,
    )
  );
  // Put the results in a transient. Expire after 12 hours.
  set_transient($postHomeL, $postHome, 30 * DAY_IN_SECONDS);
}
?>

<div class="album py-5 kilala-animation">
  <div class="container">
    <div class="row">
      <?php

      if ($postHome->have_posts()) {

        while ($postHome->have_posts()) { $postHome->the_post(); ?>
          <div class="col-md-4 kilala-animation-item" data-animate>
            <div class="card mb-4 shadow-sm">
              <?php the_post_thumbnail('feature-image') ?>
              <div class="card-body">
                <h4><?php the_title(); ?></h4>
                <p class="card-text"><?php the_excerpt(); ?></p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <a href="<?php the_permalink(); ?>" class="btn btn-sm btn-outline-secondary">View</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
      <?php }
        wp_reset_query();
      } ?>
    </div>
  </div>
</div>