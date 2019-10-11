<?php get_header();
$term = get_primary_taxonomy();
$term_name = !empty($term) ? $term->name : '';
$term_id = !empty($term) ? $term->id : '';
$term_color = get_field('color', $term->taxonomy . '_' . $term->term_id);
$term_color = isset($term_color) && !empty($term_color) ? 'style="color:' . $term_color . '"'  : '';
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
        'taxonomy' => 'category',
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
    $destinations = get_primary_taxonomy($post->ID);
    $color = get_field('color', $destinations->taxonomy . '_' . $destinations->term_id);
    $color = isset($color) && !empty($color) ? 'style="color:' . $color . '"'  : '';
    ?>
    <article>
      <div class="post-normal">
        <?php
          printf('<a title="%1$s" href="%2$s" class="feature-img d-block" style="background-image: url(%3$s);"></a>', get_the_title(), get_the_permalink(), $img);
          ?>

        <div class="entry pr-0">
          <?php if (isset($destinations) && !empty($destinations)) {
              printf('<a title="%1$s" href="%2$s" class="post-category d-block"><i %3$s class="fa fa-map-marker mr-1"></i>%1$s</a>', $destinations->name, get_term_link($destinations->term_id), $color);
            }
            ?>
          <a class="d-block" title="<?php the_title(); ?>" href="<?php the_permalink(); ?>">
            <h3 class="entry-title"><?php the_title(); ?></h3>
          </a>
        </div>
      </div>
    </article>
  <?php }
  wp_reset_postdata(); ?>
</div>
<div id="exploreCanvasNav" class="overlaynav"></div>
<?php echo get_breadcrumb(); ?>
<section id="category" class="block pt-0">
  <div class="container">

  </div>
</section>
<section>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <?php printf(' <a id="openExploreNav" href="javascript:void(0)"><i %s class="fa fa-map-marker mr-2"></i>%s %s</a>', $term_color, pll__('Discover'), $term_name) ?>
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
          <div>
            <?php
            $interests = get_category_type(get_the_ID(), 'interest');
            if (isset($interests) && !empty($interests)) {
              foreach ($interests as $interest) {
                $sub_image = get_field('sub_image', $interest->taxonomy . '_' . $interest->term_id);
                $sub_image = isset($sub_image) && !empty($sub_image) ? $sub_image['sizes']['thumbnail']  : no_img('8218');
                $arr[] = sprintf('<a title="%1$s" class="pl-1" href="%2$s"><img width="20px" style="margin-top:-5px" height="20px" class="mw-100 mr-1 d-inline mb-0" src="%3$s">%1$s</a>', $interest->name, get_term_link($interest->term_id), $sub_image);
              }
              printf('<strong>Chủ đề:</strong>%s', implode(', ', !empty($arr) ? $arr : ''));
            }
            ?>
          </div>
          <div class="py-2 py-lg-3">
            <div class="fb-like" data-href="<?php the_permalink(); ?>" data-width="" data-layout="box_count" data-action="like" data-size="large" data-show-faces="true" data-share="false"></div>
          </div>
          <div class="row">

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
          if (in_array($category->parent, array(1238, 1258)) === false) {
            $category_id[] =  $category->term_id;
          }
        }
        $relate_category = new WP_Query(array(
          'post_type'      => 'post',
          'posts_per_page' => 3,
          'post_status' => 'publish',
          'orderby' => 'rand',
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
          <section class="block">
            <h2 class="main-title"><?php echo pll__('Posts same topic'); ?></h2>
            <div class="row">
              <div class="col-12">
                <div class="row gallery-cards sm">
                  <?php
                    while ($relate_category->have_posts()) {
                      $relate_category->the_post();
                      $img = get_the_post_thumbnail_url(get_the_ID(), 'feature-image');
                      $img = isset($img) && !empty($img) ? $img : no_img('8151', 'thumbnail');
                      $taxonomy_destination = get_primary_taxonomy(get_the_ID());
                      $color = get_field('color', $taxonomy_destination->taxonomy . '_' . $taxonomy_destination->term_id);
                      $color = isset($color) && !empty($color) ? 'style="color:' . $color . '"'  : '';
                      include(APP_PATH . '/template-parts/components/article_col_3.php');
                    }
                    wp_reset_postdata(); ?>
                </div>
              </div>
            </div>
          </section>
        <?php } ?>
      </div>
      <div class="col-lg-4 pl-lg-4 has-border-top-sp">
        <?php get_template_part('template-parts/components/top_category_right') ?>
        <?php get_template_part('template-parts/components/survey_right') ?>
      </div>
    </div>
  </div>
</section>
<?php get_footer(); ?>