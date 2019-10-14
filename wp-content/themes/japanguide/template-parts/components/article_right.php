<article class="col-md-6 col-lg-12 kilala-animation-item" data-animate>
  <div class="post-normal">
    <a href="<?php echo the_permalink(); ?>" title="<?php the_title(); ?>" class="feature-img d-block" style="background-image: url(<?php echo $thumb; ?>);">
    </a>
    <div class="entry">
      <?php
      if (isset($taxonomy_destination) && !empty($taxonomy_destination)) {
        printf('<a class="post-category d-block" title="%1$s" href="%2$s"><i %3$s class="fa fa-map-marker mr-1"></i>%1$s</a>', $taxonomy_destination->name, get_term_link($taxonomy_destination->term_id), $color);
      }
      printf('<a class="entry-title d-block" title="%1$s" href="%2$s">%1$s</a>', get_the_title(), get_the_permalink());
      ?>
    </div>
  </div>
</article>