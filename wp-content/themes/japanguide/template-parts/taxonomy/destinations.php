<?php
global $current_term;
$content = get_field('content', $current_term->taxonomy . '_' . $current_term->term_id);
?>
<section id="intro">
    <div class="container py-4" style="background: url('wp-content/themes/japanguide/assets/images/bg/bg_map_japan.png');background-size: contain;">
      <div class="row">
        <div class="col-md-6 media">
          <?php printf('<img alt="%1$s" title="%1$s" class="img-fluid" src="%2$s">',$current_term->name,'/html/wp-content/themes/japanguide/assets/images/thumb/img_hokkaido.jpg') ?>

        </div>
        <div class="col-md-6 content text-justify" style="
      position: relative;
  ">
          <img src="wp-content/themes/japanguide/assets/images/bg/bg_map_hokkaido.png" alt="" style="
      position: absolute;
      top: 0;
      right: 0;
      opacity: 0.8;
      z-index: -1;
      width: 70%;
  ">
          <h1 style="
        margin: 45px 0 40px;
        font-size: 48px;
        font-weight: 900;
    "><i class="fa fa-map-marker mr-3" style="
        color: #ff1043;
    "></i><?php echo $current_term->name; ?></h1>
          <?php echo $content ?>

        </div>
      </div>
    </div>
  </section>
  <section class="mt-3 mt-lg-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <section class="row gallery-small-cards">
            <div class="col-12 main-title">
              <h2 class="font-weight-light">
                <strong><?php echo pll__('Điểm đến'); ?></strong>
                <?php echo pll__('ở').' '.$current_term->name;?>
              </h2>
            </div>
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
            foreach ($posts as $post) { setup_postdata($post);
              $img = get_the_post_thumbnail_url($post->ID, 'feature-image');
              $img = isset($img) && !empty($img) ? $img : no_img('8151', 'feature-image');
          ?>
            <div class="col-sm-6 col-md-4 gallery">
              <a class="link-gallery" title="<?php the_title(); ?>" href="<?php the_permalink(); ?>">
                <div class="link-gallery-image">
                  <figure class="image">
                    <div class="image-mask" style="background: url(<?php echo $img; ?>)">
                    </div>
                  </figure>
                  <div class="link-gallery-image-text">
                    <div class="link-gallery-image-text-content">
                      <?php the_excerpt(); ?>
                    </div>
                  </div>
                </div>

                <div class="link-gallery-desc">
                  <h3><i class="fa fa-map-marker mr-2"></i><?php echo $current_term->name; ?></h3>
                  <p> <?php the_title(); ?></p>
                </div>
              </a>
            </div>
          <?php } wp_reset_postdata(); ?>
          </section>
        </div>
        <div class="col-lg-4 pl-lg-4">
          <?php get_template_part('template-parts/components/top_category_right') ?>
          <?php get_template_part('template-parts/components/survey_right') ?>
        </div>
      </div>
    </div>
  </section>