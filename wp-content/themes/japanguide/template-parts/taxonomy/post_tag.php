<?php
global $current_term;
?>
<section class="mt-3 mt-lg-5">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <h2 class="main-title-lg">
          <?php printf('%s <thin>%s %s</thin>', pll__('Bài viết'), pll__('về'), $current_term->name); ?>
        </h2>
        <?php
        $posts = get_posts(array(
          'post_type'      => 'post',
          'posts_per_page' => 9,
          'post_status' => 'publish',
          'tax_query' => array(
            array(
              'taxonomy' => 'post_tag',
              'field' => 'term_id',
              'terms' => $current_term->term_id,
            )
          ),
        ));
        global $post;
        ?>
        <div class="row gallery-cards sm">
          <?php foreach ($posts as $post) :
            setup_postdata($post);
            $img = get_the_post_thumbnail_url($post->ID, 'thumbnail');
            $img = isset($img) && !empty($img) ? $img : no_img('8151', 'thumbnail');
            $sort_excerpt = '';
            if (NULL !== get_the_excerpt() && !empty(get_the_excerpt())) {
              $sort_excerpt = explode('.', get_the_excerpt());
              $sort_excerpt = $sort_excerpt[0] . '.';
            }
            ?>
            <div class="col-sm-6 col-md-4 gallery">
              <a class="link-gallery" title="<?php the_title(); ?>" href="<?php the_permalink(); ?>">
                <div class="link-gallery-image">
                  <figure class="image">
                    <div class="image-mask" style="background-image: url('<?php echo $img; ?>')">
                    </div>
                  </figure>
                  <div class="link-gallery-image-text">
                    <div class="link-gallery-image-text-content">
                      <?php echo $sort_excerpt; ?>
                    </div>
                  </div>
                </div>
                <div class="link-gallery-desc">
                  <p><?php the_title(); ?></p>
                </div>
              </a>
            </div>
          <?php endforeach; wp_reset_postdata(); ?>
        </div>
      </div>
      <div class="col-lg-4 pl-lg-4">
        <?php get_template_part('template-parts/components/top_category_right') ?>
        <?php get_template_part('template-parts/components/survey_right') ?>
      </div>
    </div>
  </div>
</section>