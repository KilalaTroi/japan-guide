<article class="col-sm-6 col-md-4">
  <div class="post-normal post-normal-vertical">
    <a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>" class="feature-img d-block" style="background-image: url(<?php echo $img; ?>);">
    </a>
    <div class="entry">
    <?php if (isset($taxonomy_destination) && !empty($taxonomy_destination)) {
        printf('<a title="%1$s" href="%2$s" class="post-category d-block"><i %3$s class="fa fa-map-marker mr-1"></i>%1$s</a>', $taxonomy_destination->name, get_term_link($taxonomy_destination->term_id),$color);
      }
      ?>
      <a class="d-block" title="<?php the_title(); ?>" href="<?php the_permalink(); ?>">
        <h3 class="entry-title"><?php the_title(); ?></h3>
      </a>
    </div>
  </div>
</article>