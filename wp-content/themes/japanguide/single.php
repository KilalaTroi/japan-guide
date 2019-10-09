<?php get_header();
$terms = wp_get_post_terms(get_the_ID(), 'destinations');
$term = isset($terms) && !empty($terms) ? array_shift($terms) : '';
$term_name = !empty($term) ? $term->name : '';
$term_id = !empty($term) ? $term->id : '';
?>
<div id="exploreNav" class="sidenav">
  <div class="text-center py-3 py-lg-4">
    <a id="closeExploreNav" href="javascript:void(0)" class="closebtn"><i class="fa fa-times"></i></a>
  </div>
  <h2 class="main-title"><?php echo $term_name; ?></h2>
  <?php
  $posts = get_posts(array(
    'post_type'      => 'post',
    'posts_per_page' => 5,
    'post_status' => 'publish',
    'exclude' => get_the_ID(),
    'tax_query' => array(
      array(
        'taxonomy' => 'destinations',
        'field' => 'term_id',
        'terms' => $term->term_id,
      )
    ),
  ));
  global $post;
  foreach ($posts as $post) {
    setup_postdata($post);
    $img = get_the_post_thumbnail_url($post->ID, 'thumbnail');
    $img = isset($img) && !empty($img) ? $img : no_img('8151', 'thumbnail');
    ?>
    <article-2>
      <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="post-normal">
        <div class="feature-img" style="background-image: url(<?php echo $img; ?>);">
        </div>
        <div class="entry">
          <p class="entry-title"><?php the_title(); ?></p>
        </div>
      </a>
    </article-2>
  <?php }
  wp_reset_postdata(); ?>
</div>
<div id="exploreCanvasNav" class="overlaynav"></div>

<?php echo get_breadcrumb(); ?>

<section>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <a id="openExploreNav" href="javascript:void(0)"><i class="fa fa-map-marker mr-2"></i>
          <?php printf('%s %s', pll__('Khám phá'), $term_name); ?></a>
      </div>
    </div>
  </div>
</section>
<section>
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <section class="article-content">
          <h1><?php the_title(); ?></h1>
          <div class="row">
            <div class="col-12 py-2 py-lg-3">
              <div class="fb-like pull-right fb_iframe_widget" data-href="<?php the_permalink(); ?>" data-width="" data-layout="button" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
            </div>
            <div class="col-12 content">
              <?php the_content(); ?>
            </div>
            <div class="col-12 py-2 py-lg-3 tags">
              <ul class="d-inline">
                <li class="main-label"><?php echo pll__('Tags'); ?></li>
                <?php
                $post_tags = get_the_tags();
                if (!empty($post_tags)) {
                  foreach ($post_tags as $tag) {
                    printf('<li><a title="%1$s" href="%2$s">%1$s</a>', $tag->name, get_tag_link($tag->term_id));
                  }
                }
                ?>
              </ul>
            </div>
            <div class="col-12 py-2 py-lg-3">
              <div class="fb-like pull-right fb_iframe_widget" data-href="<?php the_permalink(); ?>" data-width="" data-layout="button" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
            </div>
        </section>
        <?php $categories = wp_get_post_terms(get_the_ID(), 'category');
        foreach ($categories as $category) {
          $category_id[] =  $category->term_id;
        }
        $relate_category = new WP_Query(array(
          'post_type'      => 'post',
          'posts_per_page' => 3,
          'post_status' => 'publish',
          'exclude' => get_the_ID(),
          'tax_query' => array(
            array(
              'taxonomy' => 'category',
              'field' => 'term_id',
              'terms' => $category_id,
            )
          ),
        ));
        if ($relate_category->have_posts()) { ?>
          <section class="row py-4">
            <div class="col-12">
              <h2 class="main-title"><?php echo pll__('Bài viết cùng chủ đề'); ?></h2>
            </div>
            <div class="col-12">

              <div class="row gallery-cards sm">
                <?php
                  while ($relate_category->have_posts()) {
                    $relate_category->the_post();
                    $img = get_the_post_thumbnail_url($post->ID, 'feature-image');
                    $img = isset($img) && !empty($img) ? $img : no_img('8151', 'thumbnail');
                    $sort_excerpt = '';
                    $destinations = wp_get_post_terms(get_the_ID(), 'destinations');
                    if (NULL !== get_the_excerpt() && !empty(get_the_excerpt())) {
                      $sort_excerpt = explode('.', get_the_excerpt());
                      $sort_excerpt = $sort_excerpt[0] . '.';
                    }
                    ?>
                  <div class="col-sm-6 col-md-4 gallery">
                    <a class="link-gallery" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                      <div class="link-gallery-image">
                        <figure class="image">
                          <div class="image-mask" style="background: url(<?php echo $img; ?>)">
                          </div>
                        </figure>
                        <div class="link-gallery-image-text">
                          <div class="link-gallery-image-text-content">
                            <?php echo $sort_excerpt; ?>
                          </div>
                        </div>
                      </div>
                      <div class="link-gallery-desc">
                        <?php
                          if(isset($destinations) && !empty($destinations)){
                            printf('<h3><i class="fa fa-map-marker mr-2"></i>%s</h3>',array_shift($destinations)->name);
                          }
                        ?>
                        <p><?php the_title(); ?></p>
                      </div>
                    </a>
                  </div>
                <?php }
                  wp_reset_postdata(); ?>
              </div>
            </div>
          </section>
        <?php } ?>
      </div>
      <div class="col-lg-4 pl-lg-4">
        <?php get_template_part('template-parts/components/top_category_right') ?>
        <?php get_template_part('template-parts/components/survey_right') ?>
      </div>
    </div>
  </div>
</section>
<?php get_footer(); ?>