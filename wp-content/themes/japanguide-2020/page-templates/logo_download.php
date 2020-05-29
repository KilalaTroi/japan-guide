<?php
/**
 * Template Name: Japan Guide Logo Download
 */
get_header();
?>
<style type="text/css" media="screen">
  .download-page h2{
    position: relative;
    padding-left: 40px;
  }
  .download-page h2::before {
    content: "";
    position: absolute;
    left:0;
    top:0;
    background-image: url('<?= ASSETS_PATH ?>images/icon');
    background-position: -6px -7px;
    width: 35px;
    height: 40px;
  }

  .download-page .content figure > img,
  .download-page .content > img,
  {
    margin: 40px 0;
  }

  .download-page .content{
    padding-left: 3rem;
  }

  .download-page .content h1,.download-page .content h2{
    margin-left: -3rem;
  }

  .download-page a{
    color: #ff1945;
  }
  .download-page a:hover{
    color: #860019;
  }

</style>
<?php echo get_breadcrumb(); ?>

<section id="contact" class="block no-banner">
  <div class="container download-page">
    <div class="content">
    <?php the_content(); ?>

    <p>Tệp dữ liệu logo nền trắng có 3 kích thước hình vuông và chữ nhật. Phông nền đen chỉ có 1 kích thước. Vui lòng thay đổi độ lớn cho phù hợp với kích thước cần dùng.</p>
    <div><img class="lazy img-fluid" data-src="<?= ASSETS_PATH ?>images/logo-download/img02.png" alt=""></div>
    <p>Để xem rõ nội dung logo, tại dữ liệu logo có thành lập một vùng Isolation (khu vực được bảo hộ). Xin đừng biểu thị các mục khác trong vùng Isolation.</p>
    <div><img class="lazy img-fluid" data-src="<?= ASSETS_PATH ?>images/logo-download/img03.png" alt=""></div>
    <p>Vui lòng không sử dụng dữ liệu logo nhỏ hơn kích thước tối thiểu được biểu thị trong hình.</p>
    <div><img class="lazy img-fluid" data-src="<?= ASSETS_PATH ?>images/logo-download/img04.png" alt=""></div>
    <p>Không được thay đổi hình dáng và màu sắc dữ liệu logo.</p>
    <div><img class="lazy img-fluid" data-src="<?= ASSETS_PATH ?>images/logo-download/img05.png" alt=""></div>
    <p>&nbsp;</p>
    <h2 class="main-title mb-4">Liên kết dữ liệu logo</h2>
    <p class="mb-2">Xin liên kết dữ liệu logo bằng cách cài đặt theo đường link bên dưới.</p>
    <p><a href="http://japanguide.kilala.vn/"><bold>http://japanguide.kilala.vn/</bold></a></p>
    </div>
  </div>
</section>
<!--END  Pull HTML here-->
<?php get_footer();
