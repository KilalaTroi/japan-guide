<?php
$args = array(
  'hide_empty' => false,
  'number'            => '8',
  'exclude'       => array(7,12),
);
$categories = get_terms('category', $args);
echo '<pre>';
  var_dump($categories);
echo '</pre>';
?>

<section id="interests" class="py-3 py-md-5 kilala-animation-2">
  <div class="container">
    <div class="row main-title">
      <h1 class="kilala-animation-item">
        <bold>Chủ đề</bold>
        <thin> phổ biến</thin>
      </h1>
    </div>
    <div class="row galleries">
      <?php
        foreach($categories as $category):
        $thumbnail = get_field('feature_image', $category->taxonomy . '_' . $category->term_id);
        echo '<pre>';
          var_dump($thumbnail);
        echo '</pre>';
      ?>
      <div class="col-6 col-md-3 gallery kilala-animation-item">
        <a class="link-gallery" href="">
          <div class="link-gallery-image">
            <figure class="image">
              <div class="image-mask">
                <img class="img-fluid" src="<?php echo  $category->name ?>">
              </div>
            </figure>
          </div>
          <div class="link-gallery-text">
            <div class="link-gallery-label"><?php echo $category->name ?></div>
          </div>
        </a>
      </div>
      <?php endforeach; ?>

      <div class="col-6 col-md-3 gallery kilala-animation-item">
        <a class="link-gallery" href="">
          <div class="link-gallery-image">
            <figure class="image">
              <div class="image-mask">
                <img class="img-fluid" src="wp-content/themes/japanguide/assets/images/category/interest_02.jpg">
              </div>
            </figure>
          </div>
          <div class="link-gallery-text">
            <div class="link-gallery-label">LÁ ĐỎ</div>
          </div>
        </a>
      </div>
      <div class="col-6 col-md-3 gallery kilala-animation-item">
        <a class="link-gallery" href="">
          <div class="link-gallery-image">
            <figure class="image">
              <div class="image-mask">
                <img class="img-fluid" src="wp-content/themes/japanguide/assets/images/category/interest_03.jpg">
              </div>
            </figure>
          </div>
          <div class="link-gallery-text">
            <div class="link-gallery-label">SUỐI<br class="d-block hidden-md"> NƯỚC NÓNG</div>
          </div>
        </a>
      </div>
      <div class="col-6 col-md-3 gallery kilala-animation-item">
        <a class="link-gallery" href="">
          <div class="link-gallery-image">
            <figure class="image">
              <div class="image-mask">
                <img class="img-fluid" src="wp-content/themes/japanguide/assets/images/category/interest_04.jpg">
              </div>
            </figure>
          </div>
          <div class="link-gallery-text">
            <div class="link-gallery-label">ĐỀN CHÙA</div>
          </div>
        </a>
      </div>
      <div class="col-6 col-md-3 gallery kilala-animation-item">
        <a class="link-gallery" href="">
          <div class="link-gallery-image">
            <figure class="image">
              <div class="image-mask">
                <img class="img-fluid" src="wp-content/themes/japanguide/assets/images/category/interest_05.jpg">
              </div>
            </figure>
          </div>
          <div class="link-gallery-text">
            <div class="link-gallery-label">ẨM THỰC</div>
          </div>
        </a>
      </div>
      <div class="col-6 col-md-3 gallery kilala-animation-item">
        <a class="link-gallery" href="">
          <div class="link-gallery-image">
            <figure class="image">
              <div class="image-mask">
                <img class="img-fluid" src="wp-content/themes/japanguide/assets/images/category/interest_06.jpg">
              </div>
            </figure>
          </div>
          <div class="link-gallery-text">
            <div class="link-gallery-label">SHOPPING</div>
          </div>
        </a>
      </div>
      <div class="col-6 col-md-3 gallery kilala-animation-item">
        <a class="link-gallery" href="">
          <div class="link-gallery-image">
            <figure class="image">
              <div class="image-mask">
                <img class="img-fluid" src="wp-content/themes/japanguide/assets/images/category/interest_07.jpg">
              </div>
            </figure>
          </div>
          <div class="link-gallery-text">
            <div class="link-gallery-label">XE ĐIỆN</div>
          </div>
        </a>
      </div>
      <div class="col-6 col-md-3 gallery kilala-animation-item">
        <a class="link-gallery" href="">
          <div class="link-gallery-image">
            <figure class="image">
              <div class="image-mask">
                <img class="img-fluid" src="wp-content/themes/japanguide/assets/images/category/interest_08.jpg">
              </div>
            </figure>
          </div>
          <div class="link-gallery-text">
            <div class="link-gallery-label">FUN FACT</div>
          </div>
        </a>
      </div>
    </div>
  </div>
</section>