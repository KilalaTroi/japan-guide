<?php
$img = get_the_post_thumbnail_url($post->ID, 'feature-image');
$img = isset($img) && !empty($img) ? $img : no_img('8151', 'feature-image');
$taxonomy_destination = get_primary_taxonomy($post->ID);
$color = get_field('color', $taxonomy_destination->taxonomy . '_' . $taxonomy_destination->term_id);
$color = isset($color) && !empty($color) ? 'style="color:' . $color . '"'  : '';
?>
<article>
  <div class="post-top post-top-md feature-img" style="background-image: url(<?php echo $img; ?>)">
    <div class="entry">
      <?php if (isset($taxonomy_destination) && !empty($taxonomy_destination)) {
        printf('<a title="%1$s" href="%2$s" class="post-category"><i %3$s class="fa fa-map-marker mr-1"></i>%1$s</a>', $taxonomy_destination->name, get_term_link($taxonomy_destination->term_id), $color); }  ?>
      <h3 class="entry-title"><?php the_title(); ?></h3>
    </div>
    <?php printf('<a title="%1$s" href="%2$s" class="box-click">%1$s</a>', get_the_title(), get_the_permalink()); ?>
  </div>
</article>