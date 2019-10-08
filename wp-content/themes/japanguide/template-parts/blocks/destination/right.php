<section class="py-4">
  <h2 class="main-title"><?php echo pll__('Japan Travel News'); ?></h2>
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
        $taxonomy_destination = get_the_terms(get_the_ID(), 'destinations');
        ?>
        <article-2 class="col-md-6 col-lg-12">
          <a href="<?php echo the_permalink(); ?>" title="<?php the_title(); ?>" class="post-normal">
            <div class="feature-img" style="background-image: url(<?php echo $thumb; ?>);">
            </div>
            <div class="entry">
              <?php if (isset($taxonomy_destination) && !empty($taxonomy_destination)) { ?>
                <label class="post-category">
                  <i class="fa fa-map-marker mr-1" style="color: #ff1945"></i><?php echo  array_shift($taxonomy_destination)->name; ?>
                </label>
              <?php } ?>
              <p class="entry-title"><?php the_title(); ?></p>
            </div>
          </a>
        </article-2>
    <?php endwhile;
    } ?>
  </div>
</section>
<?php get_template_part('template-parts/components/top_category_right') ?>
<?php get_template_part('template-parts/components/survey_right') ?>