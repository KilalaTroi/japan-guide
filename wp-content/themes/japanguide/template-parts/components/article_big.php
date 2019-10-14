<?php
$img = get_the_post_thumbnail_url($post->ID, 'medium');
$img = isset($img) && !empty($img) ? $img : no_img('8151', 'medium');
$img_feature = get_the_post_thumbnail_url($post->ID, 'feature-image');
$img_feature = isset($img_feature) && !empty($img_feature) ? $img_feature : no_img('8151', 'feature-image');
$taxonomy_destination = get_primary_taxonomy($post->ID);
$color = get_field('color', $taxonomy_destination->taxonomy . '_' . $taxonomy_destination->term_id);
$color = isset($color) && !empty($color) ? 'style="color:' . $color . '"'  : '';
?>
<article class="d-none d-sm-block">
  <div class="post-top post-top-lg feature-img" style="background-image: url(<?php echo $img; ?>)">
    <div class="entry">
      <?php if (isset($taxonomy_destination) && !empty($taxonomy_destination)) {
        printf('<a title="%1$s" href="%2$s" class="post-category"><i %3$s class="fa fa-map-marker mr-1"></i>%1$s</a>', $taxonomy_destination->name, get_term_link($taxonomy_destination->term_id), $color);
      }
      ?>
      <h3 class="entry-title"><?php the_title(); ?></h3>
      <p class="entry-desc d-none d-md-block"><?php the_excerpt(); ?></p>
    </div>
    <?php printf('<a title="%1$s" href="%2$s" class="box-click">%1$s</a>', get_the_title(), get_the_permalink()); ?>
  </div>
</article>
<article class="d-block d-sm-none article-mb">
  <div class="row">
    <div class="col-5">
      <a href="<?= get_the_permalink() ?>">
        <img class="img-fluid" src="<?php echo $img_feature; ?>" alt="<?php the_title(); ?>">
      </a>
    </div>
    <div class="col-7 pl-0">
      <?php if (isset($taxonomy_destination) && !empty($taxonomy_destination)) {
        printf('<a title="%1$s" href="%2$s" class="post-category"><i %3$s class="fa fa-map-marker mr-1"></i>%1$s</a>', $taxonomy_destination->name, get_term_link($taxonomy_destination->term_id), $color);
      }
      ?>
      <h3 class="entry-title">
        <a href="<?= get_the_permalink() ?>"><?php the_title(); ?></a>
      </h3>
    </div>
  </div>
</article>