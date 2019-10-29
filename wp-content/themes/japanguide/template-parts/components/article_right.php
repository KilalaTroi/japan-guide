<article class="col-md-4 col-lg-12 kilala-animation-item" data-animate>
  <div class="border-top py-3 pt-md-0 pt-lg-3">
    <div class="row post-normal-custom">
      <div class="col-5 col-md-12 col-lg-6 col-xl-5">
        <a class="feature-img" style="background-image: url(<?php echo $thumb; ?>);" title="<?php the_title(); ?>" href="<?php the_permalink(); ?>">
          <img class="lazy w-100 img-fluid" data-src="<?php echo no_img('8151', 'feature-image'); ?>" alt="<?php the_title(); ?>">
        </a>
      </div>

      <div class="col-7 col-md-12 col-lg-6 col-xl-7 pl-0 pl-md-4 pl-lg-0">
        <div class="entry">
          <?php // if (isset($taxonomy_destination) && !empty($taxonomy_destination)) {
            // printf('<a title="%1$s" href="%2$s" class="post-category d-block"><i %3$s class="fa fa-map-marker mr-1"></i>%1$s</a>', $taxonomy_destination->name, get_term_link($taxonomy_destination->term_id),$color);
            //}; ?>

            <a class="d-block" title="<?php the_title(); ?>" href="<?php the_permalink(); ?>">
              <h3 class="entry-title"><?php the_title(); ?></h3>
            </a>
        </div>
      </div>
    </div>
  </div>
</article>