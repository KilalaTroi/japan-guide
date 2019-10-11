</main>
<footer id="footer" class="block">
  <div class="container">
    <div class="row mb-3 mb-md-5">
      <img title="<?php bloginfo('name') ?>" class="main-logo" alt="<?php bloginfo('name') ?>"
       src="<?php echo wpedu_get_option('option_logo_footer')['url'] ?>">
    </div>
    <div class="row">
      <div class="col-lg-4 col-sm-12">
        <h4>Liên hệ</h4>
        <ul>
          <li><i class="fa fa-map-marker mr-2"></i>Lầu 9, tòa nhà Capital Place, <br>Số 6 Thái Văn Lung, Quận 1, TP. Hồ Chí Minh
          </li>
          <li><i class="fa fa-phone mr-2"></i><a href="tel:<?= str_replace([' ', ',', '.'], ['', '', ''], wpedu_get_option('option_phone')) ?>"><?= wpedu_get_option('option_phone') ?></a> Thứ 2 – Thứ 6 | 8:30 – 18:30</li>
          <li><i class="fa fa-envelope-o mr-2"></i><a href="mailto:<?= wpedu_get_option('option_email') ?>"><?= wpedu_get_option('option_email') ?></a></li>
        </ul>
      </div>
      <div class="col-lg-3 col-sm-4 mt-4 mt-lg-0">
        <ul>
          <li><img title="Cầu nói văn hóa Việt - Nhật" alt="Cầu nói văn hóa Việt - Nhật" src="<?php echo wpedu_get_option('option_logo_kilala')['url'] ?>"></li>
          <li><a href="http://www.kilala.com.vn/jp" target="_blank">www.kilala.com.vn</a></li>
          <li><a href="http://www.kilala.vn/ja" target="_blank">www.kilala.vn</a></li>
          <li><a href="http://www.feeljapan.vn/ja" target="_blank">www.feeljapan.vn</a></li>
          <li><a href="http://www.kilalashop.com" target="_blank">www.kilalashop.com</a></li>
          <li><a href="http://www.kilala.vn/awards.html" target="_blank">www.kilala.vn/awards.html</a></li>
        </ul>
      </div>
      <div class="col-lg-5 col-xl-4 offset-xl-1 col-sm-8 mt-4 mt-lg-0">
        <h4>Đăng ký bản tin</h4>
        <ul>
          <li>Đăng ký bản tin của Japan Guide để cập nhật những thông tin du lịch Nhật Bản mới nhất.</li>
          <li>
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Địa chỉ email của bạn">
              <div class="input-group-append">
                <button class="btn btn-primary" type="submit"><i class="fa fa-envelope-o"></i></button>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</footer>
<footer id="copyright" class="py-2 py-md-3">
  <div class="container">
    <div class="row copyright">
      <div class="col">
        <?php
        $copyrightFooter = str_replace('%y%', date('Y'), wpedu_get_option('option_text_copyright'));
        printf('<p class="m-0">%s</p>', $copyrightFooter); ?>
      </div>
    </div>
  </div>
</footer>
<?php wp_footer(); ?>
<?= wpedu_get_option('option_footer_code') ?>
</body>
</html>