<?php get_header();
$term = get_primary_taxonomy();
$term_name = !empty($term) ? $term->name : '';
$term_id = !empty($term) ? $term->id : '';
$term_color = get_field('color', $term->taxonomy . '_' . $term->term_id);
$term_color = isset($term_color) && !empty($term_color) ? 'style="color:' . $term_color . '"'  : '';
$exlucdes[] = get_the_ID();
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
        <section class="article-content mt-lg-4">
          <?php get_template_part('template-parts/components/content'); ?>
          <div id="loadmore" class="mt-3"></div>
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
          'lang'           => LANGUAGE_SLUG,
          'post_status' => 'publish',
          'orderby' => 'rand',
          'post__not_in' => $exlucdes,
          'tax_query' => array(
            array(
              'taxonomy' => 'category',
              'field' => 'term_id',
              'terms' => $category_id,
            )
          ),
        ));
        if ($relate_category->have_posts()) { ?>
          <section id="relate_category" class="block">
            <h2 class="main-title"><?php echo pll__('Posts same topic'); ?></h2>
            <div class="row gallery-cards sm">
              <div class="gallery">
                <div class="row">
                  <?php
                    while ($relate_category->have_posts()) {
                      $exlucdes[] = get_the_ID();
                      $relate_category->the_post();
                      $img = get_the_post_thumbnail_url(get_the_ID(), 'feature-image');
                      $img = isset($img) && !empty($img) ? $img : no_img('8151', 'thumbnail');
                      $taxonomy_destination = get_primary_taxonomy(get_the_ID());
                      $color = get_field('color', $taxonomy_destination->taxonomy . '_' . $taxonomy_destination->term_id);
                      $color = isset($color) && !empty($color) ? 'style="color:' . $color . '"'  : '';
                      include(APP_PATH . '/template-parts/components/article_col_3.php');
                    }
                    wp_reset_query(); ?>
                </div>
              </div>
            </div>
          </section>
        <?php } ?>
      </div>
      <div class="col-lg-4 pl-lg-4 has-border-top-sp">
        <section class="block kilala-animation">
          <h2 class="main-title kilala-animation-item" data-animate><?php echo pll__('Japan travel news'); ?></h2>
          <div class="row">
            <?php
            $postRight = new WP_Query(
              array(
                'post_type'      => 'post',
                'posts_per_page' => 5,
                'post_status' => 'publish',
                'lang'           => LANGUAGE_SLUG,
                'post__not_in' => $exlucdes,
                'orderby' => 'rand',
              )
            );
            ?>
            <?php
            if ($postRight->have_posts()) {
              while ($postRight->have_posts()) : $postRight->the_post();
                $thumb = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail');
                $thumb = isset($thumb) && !empty($thumb) ? $thumb : no_img('8151', 'thumbnail');
                $taxonomy_destination = get_primary_taxonomy();
                $color = get_field('color', $taxonomy_destination->taxonomy . '_' . $taxonomy_destination->term_id);
                $color = isset($color) && !empty($color) ? 'style="color:' . $color . '"'  : '';
                include(APP_PATH . '/template-parts/components/article_right.php');
              endwhile;
              wp_reset_query();
            } ?>
          </div>
        </section>
        <?php get_template_part('template-parts/components/sidebar_category') ?>
        <?php // get_template_part('template-parts/components/sidebar_survey')
        ?>
      </div>
    </div>
  </div>
</section>
<script type="text/javascript" charset="utf-8" async defer>
  jQuery(function($) {
    var canBeLoaded = true, // this param allows to initiate the AJAX call only if necessary
      offset = 0,
      exluces = '<?= implode(',', $exlucdes); ?>',
      category_id = '<?= implode(',', (array) $category_id); ?>',
      bottomOffset = $('#footer').height() + $('#copyright').height() + $('#relate_category').height() + 2500; // the distance (in px) from the page bottom when you want to load more posts
    $(window).scroll(function() {
      var data = {
        'action': 'loadmore',
        'postID': exluces,
        'offset': offset,
        'categories': category_id,
        'lang': '<?= LANGUAGE_SLUG ?>'
      };

      if ($(document).scrollTop() > ($(document).height() - bottomOffset) && canBeLoaded == true) {
        if (offset < 3) {
          $.ajax({
            url: script_loc.ajax_url,
            data: data,
            type: 'POST',
            beforeSend: function(xhr) {
              // you can also add your own preloader here
              // you see, the AJAX call is in process, we shouldn't run it again until complete
              canBeLoaded = false;
            },
            success: function(data) {
              if (data) {
                $('#loadmore').append(data); // where to insert posts
                FB.XFBML.parse(document.getElementById('content-offset-' + offset));
                // the ajax is completed, now we can run it again
                canBeLoaded = true;
                offset++;
              }
            }
          });
        }
      }
    });
  });
</script>
<?php get_footer(); ?>