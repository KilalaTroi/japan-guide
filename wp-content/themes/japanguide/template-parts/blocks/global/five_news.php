<?php
$postHomeL = 'post_home_' . LANGUAGE_SLUG;
if (false === ($postHome  = get_transient($postHomeL))) {
$postHome = get_posts(
array(
'post_type'      => 'post',
'posts_per_page' => 5,
'post_status' => 'publish',
'meta_query'	=> array(
array(
'key'	 	=> 'top',
'value'	  	=> true,
'compare' 	=> '=',
),
),
)
);
set_transient($postHomeL, $postHome, 30 * DAY_IN_SECONDS);
}
global $post;
?>
<?php if (isset($postHome) && !empty($postHome) ) { ?>
<section id="new-article" class="py-3 py-md-5 kilala-animation-1">
<div class="container">
<div class="row">
<div class="col-md-6  kilala-animation-item" data-animate>
<?php
$post = array_shift($postHome);
setup_postdata($post);
get_template_part('template-parts/components/article_big');
wp_reset_postdata();
?>
</div>
<div class="col-md-6">
<div class="row">
<?php foreach ($postHome as $post) { setup_postdata($post); ?>
<div class="col-sm-6 kilala-animation-item" data-animate>
<?php get_template_part('template-parts/components/article'); ?>
</div>
<?php } wp_reset_postdata(); ?>
</div>
</div>
</div>
</div>
</section>
<?php } ?>