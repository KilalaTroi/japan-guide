<div id="exploreTopic_<?= $topic_term->slug ?>_<?= $single_id ?>" class="sidenav">
  <div class="text-center py-3 py-lg-4">
    <a id="closeTopic_<?= $topic_term->slug ?>_<?= $single_id ?>" href="javascript:void(0)" class="closebtn" data-sidebar="#exploreTopic_<?= $topic_term->slug ?>_<?= $single_id ?>" data-overlay="#exploreTopicOV_<?= $topic_term->slug ?>_<?= $single_id ?>"><i class="fa fa-times"></i></a>
  </div>
  <h2 class="main-title"><?php echo $topic_term->name; ?></h2>
  <?php
  if ( !isset($exlucdes) ) {
    $exlucdes[] = $single_id;
  }
  if ( isset($_POST['postID']) ) {
    $exlucdes = array_merge($exlucdes, explode(',', $_POST['postID']));
  }

  $posts = new WP_Query(array(
    'post_type'      => 'post',
    'posts_per_page' => 5,
    'post_status' => 'publish',
    'post__not_in' => $exlucdes,
    'tax_query' => array(
      array(
        'taxonomy' => 'topics',
        'field' => 'term_id',
        'terms' => $topic_term->term_id,
      )
    ),
  ));
  
  while ( $posts->have_posts() ) : $posts->the_post();
    $img = get_the_post_thumbnail_url($post->ID, 'thumbnail');
    $img = isset($img) && !empty($img) ? $img : no_img('8151', 'thumbnail');
    ?>
    <article>
      <div class="border-top py-3">
        <div class="row post-normal-custom">
          <div class="col-5">
            <a class="feature-img" style="background-image: url(<?php echo $img; ?>);" title="<?php the_title(); ?>" href="<?php the_permalink(); ?>">
              <img class="lazy w-100 img-fluid m-0" data-src="<?php echo no_img('8151', 'feature-image'); ?>" alt="<?php the_title(); ?>">
            </a>
          </div>

          <div class="col-7 pl-0">
            <div class="entry">
                <a class="d-block" title="<?php the_title(); ?>" href="<?php the_permalink(); ?>">
                  <h3 class="entry-title"><?php the_title(); ?></h3>
                </a>
            </div>
          </div>
        </div>
      </div>
    </article>
  <?php 
    endwhile;
    wp_reset_query();
  ?>

  <div class="border-top pt-3"></div>
  <?php if ( $posts->found_posts === 0 ) : ?>
    <p><?= pll__('Hiện tại chưa có thêm bài viết về chủ đề này.') ?></p>
  <?php endif; ?>
  <?php if ( $posts->found_posts > 5 ) : ?>
    <a href="<?= get_term_link($topic_term->term_id) ?>" class="btn btn-primary"><?= pll__('Khám phá thêm') ?></a>
  <?php endif; ?>
</div>
<div id="exploreTopicOV_<?= $topic_term->slug ?>_<?= $single_id ?>" data-sidebar="#exploreTopic_<?= $topic_term->slug ?>_<?= $single_id ?>" data-overlay="#exploreTopicOV_<?= $topic_term->slug ?>_<?= $single_id ?>" class="overlaynav"></div>