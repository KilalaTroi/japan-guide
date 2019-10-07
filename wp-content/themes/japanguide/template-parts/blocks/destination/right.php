<section class="row py-4">
  <?php
  $postRight = new WP_Query(
    array(
      'post_type'      => 'post',
      'posts_per_page' => 5,
      'post_status' => 'publish',
    )
  );
  ?>
  <div class="col-12">
    <h2 class="main-title">Japan Travel News</h2>
  </div>
  <?php
  if ($postRight->have_posts()) {

    while ($postRight->have_posts()) : $postRight->the_post();
      $thumb = get_the_post_thumbnail_url(get_the_ID());
      $thumb = isset($thumb) && !empty($thumb) ? $thumb : no_img('8151');
      $taxonomy_destination = get_the_terms(get_the_ID(), 'destinations');
      ?>
      <article-2 class="col-md-6 col-lg-12">
        <a href="<?php echo the_permalink(); ?>" title="<?php the_title(); ?>" class="post-normal">
          <div class="feature-img" style="background-image: url(<?php echo $thumb; ?>);">
          </div>
          <div class="entry">
            <?php if (isset($taxonomy_destination) && !empty($taxonomy_destination)) { ?>
              <label class="post-category">
                <i class="fa fa-map-marker mr-1" style="color: #ff1945"></i><?php echo  array_shift($taxonomy_destination)->name; ?>
              </label>
            <?php } ?>
            <p class="entry-title"><?php the_title(); ?></p>
          </div>
        </a>
      </article-2>

  <?php endwhile;
  } ?>
</section>
<section class="row py-4">
  <div class="col-12">
    <h2 class="main-title">Chủ đề phổ biến</h2>
  </div>
  <div class="col-12 top-interest">
    <?php
    if (empty($categories) || NULL === $categories) {
      $categories = get_categories_top();
    }
    ?>
    <ul class="row">
      <?php
      foreach ($categories as $categorie) :
        $sub_image = get_field('sub_image', $categorie->taxonomy . '_' . $categorie->term_id);
        $sub_image = isset($sub_image) && !empty($sub_image) ? $sub_image['sizes']['thumbnail']  : no_img('8218');
        printf('<li class="col-6 col-sm-4 col-lg-12"><a title="%1$s" href="%2$s"><img class="top-interest-icon" src="%3$s">%1$s</a></li>', $categorie->name, get_term_link($categorie->term_id), $sub_image);
      endforeach; ?>
    </ul>
  </div>
</section>
<section class="row py-4">
  <div class="col-12">
    <h2 class="main-title">Bạn yêu thích điểm đến nào ở Nhật Bản?</h2>
  </div>
  <form class="col-12" action="" id="survey">
    <?php
    if (empty($destinations_top) || NULL === $destinations_top) {
      $destinations_top = get_destinations_top();
    }

    ?>
    <div class="row">
      <div class="col-12 d-flex flex-wrap justify-content-center">
        <?php foreach ($destinations_top as $v) :
          $thumbnail = get_field('feature_image', $v->taxonomy . '_' . $v->term_id);
          $thumbnail = isset($thumbnail) && !empty($thumbnail) ? $thumbnail['sizes']['thumbnail']  : no_img('8151');
          ?>
          <label style="background-image: url(<?php echo $thumbnail; ?>);">
            <input type="radio" value="<?php echo $v->term_id; ?>" name="selectdest">
            <span><i class="mr-1 fa fa-check-circle"></i><?php echo $v->name;  ?></span>
          </label>
        <?php endforeach; ?>
      </div>
    </div>
    <div class="row mt-3 p-1">
      <div class="col-6">
        <a href=""><i class="mr-1 fa fa-file-text-o"></i> Xem kết quả </a>
      </div>
      <div class="col-6 text-right"><button class="btn btn-primary">Bình chọn</button>
      </div>
    </div>
  </form>
</section>