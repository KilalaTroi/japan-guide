<section id="destination" class="py-3 py-md-5 kilala-animation-3">
  <div class="container">
    <div class="row main-title">
      <h1 class="kilala-animation-item" data-animate>
        <bold>Điểm đến</bold>
        <thin> được yêu thích nhất</thin>
      </h1>
    </div>
    <div class="row">
      <div class="col-12 col-md-8 col-lg-7 mx-auto">
        <!-- map -->
        <div id="svg-map" class="kilala-animation-item" data-animate></div>
        <script type="text/javascript" charset="utf-8" async defer>
          jQuery(document).ready(function($) {
            $.ajax({
              type: 'POST',
              url: '<?php echo admin_url('admin-ajax.php');?>',
              dataType: "html", // add data type
              data: { action : 'get_ajax_map' },
              success: function( response ) {
                $('#svg-map').append( response );
              }
            });
          });
        </script>
      </div>
    </div>
    <div class="row gallery-cards">
      <div class="col-md-6 col-lg-3 gallery kilala-animation-item" data-animate>
        <a class="link-gallery" href="">
          <div class="link-gallery-image">
            <figure class="image">
              <div class="image-mask"
                style="background: url('wp-content/themes/japanguide/assets/images/destination/destination_01.jpg')">
              </div>
            </figure>
            <div class="link-gallery-image-text">
              <div class="link-gallery-image-text-content">
                Tokyo (東京, Tōkyō) is Japan's capital and the world's most populous metropolis. It is also one of
                Japan's 47 prefectures, consisting of 23 central city wards and multiple cities, towns and villages
                west of the city center. The Izu and Ogasawara Islands are also part of Tokyo...
              </div>
            </div>
          </div>

          <div class="link-gallery-desc">
            <h3><i class="fa fa-map-marker mr-2"></i>Kanto</h3>
            <p>Tokyo - Thủ đô Nhật Bản.</p>
          </div>
        </a>
      </div>
      <div class="col-md-6 col-lg-3 gallery kilala-animation-item" data-animate>
        <a class="link-gallery" href="">
          <div class="link-gallery-image">
            <figure class="image">
              <div class="image-mask"
                style="background: url('wp-content/themes/japanguide/assets/images/destination/destination_02.jpg')">
              </div>
            </figure>
            <div class="link-gallery-image-text">
              <div class="link-gallery-image-text-content">
                Kyoto (京都, Kyōto) served as Japan's capital and the emperor's residence from 794 until 1868. It is
                one of the country's ten largest cities with a population of 1.5 million people and a modern face...
              </div>
            </div>
          </div>

          <div class="link-gallery-desc">
            <h3><i class="fa fa-map-marker mr-2"></i>Kinki</h3>
            <p>Kyoto - Cố đô nghìn năm.</p>
          </div>
        </a>
      </div>
      <div class="col-md-6 col-lg-3 gallery kilala-animation-item" data-animate>
        <a class="link-gallery" href="">
          <div class="link-gallery-image">
            <figure class="image">
              <div class="image-mask"
                style="background: url('wp-content/themes/japanguide/assets/images/destination/destination_03.jpg')">
              </div>
            </figure>
            <div class="link-gallery-image-text">
              <div class="link-gallery-image-text-content">
                Osaka (大阪, Ōsaka) is Japan's second largest metropolitan area after Tokyo. It has been the economic
                powerhouse of the Kansai Region for many centuries. Osaka was formerly known as Naniwa. Before the
                Nara Period, when the capital used to be moved with the reign of each new emperor, Naniwa was once
                Japan's capital city, the first one ever known....
              </div>
            </div>
          </div>

          <div class="link-gallery-desc">
            <h3><i class="fa fa-map-marker mr-2"></i>Kinki</h3>
            <p>Osaka - Thành phố lớn nhất vùng Kinki.</p>
          </div>
        </a>
      </div>
      <div class="col-md-6 col-lg-3 gallery kilala-animation-item" data-animate>
        <a class="link-gallery" href="">
          <div class="link-gallery-image">
            <figure class="image">
              <div class="image-mask"
                style="background: url('wp-content/themes/japanguide/assets/images/destination/destination_04.jpg')">
              </div>
            </figure>
            <div class="link-gallery-image-text">
              <div class="link-gallery-image-text-content">
                Mount Fuji (富士山, Fujisan) is with 3776 meters Japan's highest mountain. It is not surprising that
                the nearly perfectly shaped volcano has been worshiped as a sacred mountain and experienced big
                popularity among artists and common people throughout the centuries...
              </div>
            </div>
          </div>
          <div class="link-gallery-desc">
            <h3><i class="fa fa-map-marker mr-2"></i>Chubu</h3>
            <p>Núi Phú Sĩ - Biểu tượng Nhật Bản được cả thế giới biết đến</p>
          </div>
        </a>
      </div>
    </div>
  </div>
</section>