<?php
global $current_term;
?>
<?php echo get_breadcrumb(); ?>
<section>
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <section class="block">
          <h1 class="main-title-lg">
            <?php printf('%s <thin>%s %s</thin>', pll__('Post'), pll__('about'), $current_term->name); ?>
          </h1>
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
            <?php foreach ($posts as $post) {
              setup_postdata($post);
              $img = get_the_post_thumbnail_url($post->ID, 'feature-image');
              $img = isset($img) && !empty($img) ? $img : no_img('8151', 'thumbnail');
              $taxonomy_destination = get_primary_taxonomy($post->ID);
              $color = get_field('color', $taxonomy_destination->taxonomy . '_' . $taxonomy_destination->term_id);
              $color = isset($color) && !empty($color) ? 'style="color:' . $color . '"'  : '';
              include(APP_PATH . '/template-parts/components/article_col_3.php');
            }
            wp_reset_postdata(); ?>
          </div>
        </section>
      </div>
      <div class="col-lg-4 pl-lg-4 has-border-top-sp">
        <?php get_template_part('template-parts/components/top_category_right') ?>
        <?php //get_template_part('template-parts/components/survey_right') ?>
      </div>
    </div>
  </div>
</section>