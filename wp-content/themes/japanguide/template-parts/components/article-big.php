<?php
$img = get_the_post_thumbnail_url($post->ID,'medium');
$img = isset($img) && !empty($img) ? $img : no_img('8151','medium');
?>
<article>
    <a href="<?php the_permalink(); ?>" class="post post-lg feature-img" style="background-image: url(<?php echo $img; ?>)">
      <div class="entry">
        <h3 class="entry-title"><?php the_title(); ?></h3>
        <p class="entry-desc d-none d-md-block"><?php the_excerpt(); ?></p>
      </div>
    </a>
</article>