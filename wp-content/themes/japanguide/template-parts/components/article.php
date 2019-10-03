<?php
$img = get_the_post_thumbnail_url($post->ID,'feature-image');
$img = isset($img) && !empty($img) ? $img : no_img('8151', 'feature-image');
?>
<article>
    <a href="<?php the_permalink(); ?>" class="post post-md feature-img" style="background-image: url(<?php echo $img; ?>)">
        <div class="entry">
            <h3 class="entry-title"><?php the_title(); ?></h3>
        </div>
    </a>
</article>