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
        $taxonomy_destination = get_the_terms(get_the_ID(), 'destinations');
        ?>
        <article class="col-md-6 col-lg-12 kilala-animation-item" data-animate>
          <div class="post-normal">
            <a href="<?php echo the_permalink(); ?>" title="<?php the_title(); ?>" class="feature-img d-block" style="background-image: url(<?php echo $thumb; ?>);">
            </a>
            <div class="entry">
              <?php
                if (isset($taxonomy_destination) && !empty($taxonomy_destination)) {
                  printf('<a class="post-category d-block" title="%1$s" href="%2$s"><i class="fa fa-map-marker mr-1"></i>%1$s</a>', $taxonomy_destination[0]->name, get_term_link($taxonomy_destination[0]->term_id));
                }
                printf('<a class="entry-title d-block" title="%1$s" href="%2$s">%1$s</a>', get_the_title(), get_the_permalink());
                ?>
            </div>
          </div>
        </article>
    <?php endwhile;
    } ?>
  </div>
</section>
<?php get_template_part('template-parts/components/top_category_right') ?>
<?php get_template_part('template-parts/components/survey_right') ?>