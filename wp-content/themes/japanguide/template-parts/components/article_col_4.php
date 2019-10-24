<?php
  $first_taxo = array_shift($taxonomies);
?>
<article class="col-md-4 col-lg-3">
  <div class="border-top py-3 pt-md-0">
    <div class="row post-normal-custom">
      <div class="col-5 col-md-12">
        <a class="feature-img" style="background-image: url(<?php echo $img; ?>);" title="<?php the_title(); ?>" href="<?php the_permalink(); ?>">
          <img src="<?php echo no_img('8151', 'feature-image'); ?>" alt="<?php the_title(); ?>" class="w-100 img-fluid">
        </a>
      </div>

      <div class="col-7 col-md-12 pl-0 pl-md-4">
        <div class="entry">
            <a class="d-block mt-1" title="<?php the_title(); ?>" href="<?php the_permalink(); ?>">
              <h3 class="entry-title"><?php the_title(); ?></h3>
            </a>
            <div class="d-flex flex-wrap">
              <?php if (isset($first_taxo) && !empty($first_taxo)) {
              printf('<a title="%1$s" href="%2$s" class="post-category d-block"><i %3$s class="fa fa-map-marker mr-1"></i>%1$s</a>', $first_taxo->name, get_term_link($first_taxo->term_id),$color);
              }; ?>
              <?php if ( count($taxonomies) > 0 ) {
                foreach ($taxonomies as $value) {
                  printf(', <a title="%1$s" href="%2$s" class="post-category d-block ml-2">%1$s</a>', $value->name, get_term_link($value->term_id));
                }
              } ?>
            </div>
        </div>
      </div>
    </div>
  </div>
</article>