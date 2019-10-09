<?php
$img = get_the_post_thumbnail_url($post->ID, 'medium');
$img = isset($img) && !empty($img) ? $img : no_img('8151', 'medium');
$taxonomy_destination = get_the_terms($post->ID, 'destinations');
?>
<article>
  <div class="post-top post-top-lg feature-img" style="background-image: url(<?php echo $img; ?>)">
    <div class="entry">
      <?php if (isset($taxonomy_destination) && !empty($taxonomy_destination)) {
        printf('<a title="%1$s" href="%2$s" class="post-category d-block"><i class="fa fa-map-marker mr-1"></i>%1$s</a>', $taxonomy_destination[0]->name, get_term_link($taxonomy_destination[0]->term_id));
      }
      ?>
      <a class="d-block" title="<?php the_title(); ?>" href="<?php the_permalink(); ?>">
        <h3 class="entry-title"><?php the_title(); ?></h3>
        <p class="entry-desc d-none d-md-block"><?php the_excerpt(); ?></p>
      </a>
    </div>
  </div>
</article>