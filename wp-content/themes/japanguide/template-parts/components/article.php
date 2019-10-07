<?php
$img = get_the_post_thumbnail_url($post->ID, 'feature-image');
$img = isset($img) && !empty($img) ? $img : no_img('8151', 'feature-image');
$taxonomy_destination = get_the_terms($post->ID, 'destinations');
?>
<article>
<a href="<?php the_permalink(); ?>" class="post post-md feature-img" style="background-image: url(<?php echo $img; ?>)">
<div class="entry">
<?php if (isset($taxonomy_destination) && !empty($taxonomy_destination)) { ?>
<label class="post-category">
<i class="fa fa-map-marker mr-1" style="color: #ff1945"></i><?php echo  array_shift($taxonomy_destination)->name; ?>
</label>
<?php } ?>
<h3 class="entry-title"><?php the_title(); ?></h3>
</div>
</a>
</article>