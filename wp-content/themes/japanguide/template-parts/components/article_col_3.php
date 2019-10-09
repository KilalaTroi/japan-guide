<article class="col-sm-6 col-md-4">
  <div class="post-normal post-normal-vertical">
    <a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>" class="feature-img d-block" style="background-image: url(<?php echo $img; ?>);">
    </a>
    <div class="entry">
    <?php if (isset($destinations) && !empty($destinations)) {
        printf('<a title="%1$s" href="%2$s" class="post-category d-block"><i class="fa fa-map-marker mr-1"></i>%1$s</a>', $destinations[0]->name, get_term_link($destinations[0]->term_id));
      }
      ?>
      <a class="d-block" title="<?php the_title(); ?>" href="<?php the_permalink(); ?>">
        <h3 class="entry-title"><?php the_title(); ?></h3>
      </a>
    </div>
  </div>
</article>