</main>
<footer id="footer" class="block-footer py-3 py-md-5">
  <div class="container">
    <div class="text-center mb-3 mb-md-5">
      <img title="<?php bloginfo('name') ?>" alt="<?php bloginfo('name') ?>" class="mx-auto" style="max-width: 110px;"
        src="<?php echo wpedu_get_option('option_logo_footer')['url'] ?>">
    </div>
    <div class="row">
      <div class="col-lg-4">
        <h4>Contact</h4>
        <ul>
          <li><i class="fa fa-map-marker mr-2"></i>9th Floor, Capital Place Bldg., No.6, Thai Van Lung St., Dist 1, HCMC, VietNam
            </li>
          <li><i class="fa fa-phone mr-2"></i>(+84)28 3827 7722 Monday – Friday | 8:30 – 18:30</li>
        </ul>
      </div>
      <div class="col-lg-3">
        <ul>
          <li><img alt="Cầu nối Văn hóa Việt - Nhật" title="Cầu nối Văn hóa Việt - Nhật" src="/wp-content/uploads/2019/10/logo-kilala.png"></li>
          <li><a href="http://www.kilala.com.vn/jp/" target="_blank">www.kilala.com.vn</a></li>
          <li><a href="http://www.kilala.vn/ja/" target="_blank">www.kilala.vn</a></li>
          <li><a href="http://www.feeljapan.vn/ja/" target="_blank">www.feeljapan.vn</a></li>
          <li><a href="http://www.kilalashop.com" target="_blank">www.kilalashop.com</a></li>
          <li><a href="http://www.kilala.vn/awards.html" target="_blank">www.kilala.vn/awards.html</a></li>
        </ul>
      </div>
      <div class="col-lg-5">
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
<footer id="copyright" class="block-footer py-3">
  <div class="container">
    <div class="row copyright">
      <div class="col">
        <?php
          $copyrightFooter = str_replace('%y%',date('Y'),wpedu_get_option('option_text_copyright'));
        ?>
        <p class="m-0"><?php echo $copyrightFooter; ?></p>
      </div>
    </div>
  </div>
</footer>
<?php wp_footer(); ?>
<?= wpedu_get_option('option_footer_code') ?>
</body>
</html>