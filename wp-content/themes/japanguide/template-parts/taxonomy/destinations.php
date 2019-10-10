<?php
global $current_term;
$content = get_field('content', $current_term->taxonomy . '_' . $current_term->term_id);
$thumbnail = get_field('feature_image', $current_term->taxonomy . '_' . $current_term->term_id);
$thumbnail = isset($thumbnail) && !empty($thumbnail) ? $thumbnail['url'] : no_img('8151');
$sub_image = get_field('sub_image', $current_term->taxonomy . '_' . $current_term->term_id);
$sub_image = isset($sub_image) && !empty($sub_image) ? $sub_image['url'] : '';
?>
<?php echo get_breadcrumb(); ?>
<section id="intro">
      <div class="container">
        <div class="intro-wrapper py-4">
          <div class="row">
            <div class="col-md-6 media d-flex align-items-center">
            <?php printf('<img class="mw-100" alt="%1$s" title="%1$s" class="img-fluid" src="%2$s">', $current_term->name, $thumbnail) ?>
            </div>
            <div class="col-md-6 content text-justify">
            <?php printf('<img class="region" alt="%1$s" title="%1$s" src="%2$s">', $current_term->name, $sub_image) ?>
              <h1><i class="icon fa fa-map-marker mr-2"></i><?php echo $current_term->name; ?></h1>
              <?php echo $content ?>
            </div>
          </div>
        </div>
      </div>
    </section>
<section>
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
      <section class="block">
        <h2 class="main-title-lg">
          <?php printf('%s <thin>%s %s</thin>', pll__('Post'), pll__('about'), $current_term->name); ?>
        </h2>
        <?php
        $posts = get_posts(array(
          'post_type'      => 'post',
          'posts_per_page' => 9,
          'post_status' => 'publish',
          'tax_query' => array(
            array(
              'taxonomy' => 'destinations',
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
            $img = get_the_post_thumbnail_url($post->ID, 'feature-image');
            $img = isset($img) && !empty($img) ? $img : no_img('8151', 'thumbnail');
            $destinations = array(
              $current_term
            );
            include(APP_PATH.'/template-parts/components/article_col_3.php');
           endforeach;
          wp_reset_postdata(); ?>
        </div>
      </section>
      </div>
      <div class="col-lg-4 pl-lg-4 has-border-top-sp">
        <?php get_template_part('template-parts/components/top_category_right') ?>
        <?php get_template_part('template-parts/components/survey_right') ?>
      </div>
    </div>
  </div>
</section>