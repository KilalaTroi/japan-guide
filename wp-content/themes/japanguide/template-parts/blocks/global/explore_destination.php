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
    $taxonomy_destination = get_term($term->term_id,'category');
    $color = get_field('color', $taxonomy_destination->taxonomy . '_' . $taxonomy_destination->term_id);
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