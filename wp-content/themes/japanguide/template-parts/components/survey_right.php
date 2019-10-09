<section id="survey" class="block kilala-animation">
  <h2 class="main-title"><?php echo pll__('What is your favorite destination in Japan?'); ?></h2>
  <form action="" id="frm-survey">
    <?php
    if (empty($destinations_top) || NULL === $destinations_top) {
      $destinations_top = get_destinations_top();
    }

    ?>
    <div class="d-flex flex-wrap justify-content-center">
      <?php foreach ($destinations_top as $v) :
        $thumbnail = get_field('feature_image', $v->taxonomy . '_' . $v->term_id);
        $thumbnail = isset($thumbnail) && !empty($thumbnail) ? $thumbnail['sizes']['thumbnail']  : no_img('8151');
        ?>
        <label style="background-image: url(<?php echo $thumbnail; ?>);" class="kilala-animation-item" data-animate>
          <input type="radio" value="<?php echo $v->term_id; ?>" name="selectdest">
          <span><i class="mr-1 fa fa-check-circle"></i><?php echo $v->name;  ?></span>
        </label>
      <?php endforeach; ?>
    </div>
    <div class="row mt-3 p-1 kilala-animation-item" data-animate>
      <div class="col-6">
        <a href="" class="extra-link"><i class="mr-1 fa fa-file-text-o"></i> Xem kết quả </a>
      </div>
      <div class="col-6 text-right"><button class="btn btn-primary">Bình chọn</button>
      </div>
  </form>
  </div>
</section>