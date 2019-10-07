<?php
$img = get_the_post_thumbnail_url($post->ID, 'medium');
$img = isset($img) && !empty($img) ? $img : no_img('8151', 'medium');
$taxonomy_destination = get_the_terms($post->ID, 'destinations');
?>
<article>
<a href="<?php the_permalink(); ?>" class="post post-lg feature-img" style="background-image: url(<?php echo $img; ?>)">
<div class="entry">
<h3 class="entry-title"><?php the_title(); ?></h3>
<label class="post-category">
<i class="fa fa-map-marker mr-1" style="color: #ff1945"></i><?php echo array_shift($taxonomy_destination)->name; ?>
</label>
<p class="entry-desc d-none d-md-block"><?php echo get_the_excerpt(); ?></p>
</div>
</a>
</article>