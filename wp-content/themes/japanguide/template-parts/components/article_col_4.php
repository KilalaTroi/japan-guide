<article class="col-md-4 col-lg-3">
  <div class="border-top py-3 pt-md-0">
    <div class="row post-normal-custom">
      <div class="col-5 col-md-12">
        <a class="feature-img" style="background-image: url(<?php echo $img; ?>);" title="<?php the_title(); ?>" href="<?php the_permalink(); ?>">
          <img data-src="<?php echo no_img('8151', 'feature-image'); ?>" alt="<?php the_title(); ?>" class="lazy w-100 img-fluid">
        </a>
      </div>

      <div class="col-7 col-md-12 pl-0 pl-md-4">
        <div class="entry">
            <a class="d-block mt-md-1" title="<?php the_title(); ?>" href="<?php the_permalink(); ?>">
              <h3 class="entry-title"><?php the_title(); ?></h3>
            </a>
            <div class="d-flex flex-wrap">
              <?php 
              $current_term_slug = isset($current_term) ? $current_term->slug : false;
              $check_slug = $current_term_slug === 'bi-kip-du-lich' ? false : true;
              if ( count($taxonomies) > 0 && $check_slug ) {
                foreach ($taxonomies as $value) {
                  $region_id = get_field('region_of', $value->taxonomy . '_' . $value->term_id);
                  $color = get_field('color', 'regions_' . $region_id);
                  $color = isset($color) && !empty($color) ? 'style="color:' . $color . '"'  : '';
                  printf('<a title="%1$s" href="%2$s" class="mr-2 post-category d-block"><i %3$s class="fa fa-map-marker mr-1"></i>%1$s</a>', $value->name, get_term_link($value->term_id), $color);
                }
              } ?>
            </div>
        </div>
      </div>
    </div>
  </div>
</article>