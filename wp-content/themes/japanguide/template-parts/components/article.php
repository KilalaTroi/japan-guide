<?php
$img = get_the_post_thumbnail_url($post->ID, 'feature-image');
$img = isset($img) && !empty($img) ? $img : no_img('8151', 'feature-image');
$taxonomy_destination = get_primary_taxonomy($post->ID);
$region_id = get_field('region_of', $taxonomy_destination->taxonomy . '_' . $taxonomy_destination->term_id);
$color = get_field('color', 'regions_' . $region_id);
$color = isset($color) && !empty($color) ? 'style="color:' . $color . '"'  : '';
?>
<article class="d-none d-sm-block">
  <div class="post-top post-top-md feature-img" style="background-image: url(<?php echo $img; ?>)">
    <div class="entry">
      <?php if (isset($taxonomy_destination) && !empty($taxonomy_destination)) {
        printf('<a title="%1$s" href="%2$s" class="post-category"><i %3$s class="fa fa-map-marker mr-1"></i>%1$s</a>', $taxonomy_destination->name, get_term_link($taxonomy_destination->term_id), $color);
      }  ?>
      <h3 class="entry-title"><?php the_title(); ?></h3>
    </div>
    <?php printf('<a title="%1$s" href="%2$s" class="box-click">%1$s</a>', get_the_title(), get_the_permalink()); ?>
  </div>
</article>
<article class="d-block d-sm-none article-mb mt-3 pt-3 border-top">
  <div class="row">
    <div class="col-5">
      <a href="<?= get_the_permalink() ?>">
        <img class="lazy img-fluid" data-src="<?php echo $img; ?>" alt="<?php the_title(); ?>">
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