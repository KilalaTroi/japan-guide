<?php
if (empty($maps) || NULL === $maps) {
  $maps = get_map();
}
?>

<style>
  #svg-map {
    position: relative;
  }

  .city-list {
    list-style: none;
    padding: 0;
  }

  .city-list a {
    position: absolute;
    font-weight: 700;
    text-shadow: 0 0 5px #fff;
    transition: all .15s ease-in-out;
    font-size: 14px;
  }

  .city-list a:after {
    position: absolute;
    width: 10px;
    height: 10px;
    content: "";
    background-color: #FF1945;
    box-shadow: 0 0 5px #fff;
    left: 0;
    right: 0;
    bottom: -10px;
    margin: 0 auto;
    border-radius: 50%;
    border: 1px solid rgba(255, 255, 255, 0.5);
  }
</style>

<my-map>
  <div id="svg-map" style="min-height: 300px;" class="kilala-animation-item" data-animate>
    <div id="map-text">
      <?php
      foreach ($maps as $map) { ?>
        <div class="map-wrapper" data-region="<?php echo strtolower(str_replace(' ', '-', $map->name)); ?>">
          <?php printf('<a id="%3$s-text" title="%1$s" href="%2$s" class="region map-spot %3$s">%4$s</a>', $map->name, get_term_link($map->term_id), strtolower(str_replace(' ', '-', $map->name)), strtoupper(str_replace(' ', '<br>', $map->name))); ?>
          <ul class="city-list">
            <?php
              if (isset($map->destinations) && !empty($map->destinations) ) {
                foreach ($map->destinations as $destination) {
                  printf('<li><a href="%2$s" title="%1$s" id="%3$s" class="map-city">%4$s</a></li>', $destination->name, get_term_link($destination->term_id), strtolower(str_replace(' ', '-', $destination->name)), ucfirst(str_replace(' ', '<br>', $destination->name)));
                }
              } ?>
          </ul>
        </div>
      <?php } ?>
    </div>
    <!-- <div id="city-list">
      <a id="tokyo" class="map-city" href="<?= site_url() ?>/diem-du-lich/tokyo/">Tokyo</a>
      <a id="osaka" class="map-city top-point" href="<?= site_url() ?>/diem-du-lich/osaka/">Osaka</a>
      <a id="kyoto" class="map-city" href="<?= site_url() ?>/diem-du-lich/kyoto/">Kyoto</a>
      <a id="nagasaki" class="map-city" href="<?= site_url() ?>/diem-du-lich/nagasaki/">Nagasaki</a>
    </div> -->
  </div>

  <script type="text/javascript" charset="utf-8" async defer>
    var map = sessionStorage.getItem("svg-map");
    if (null === map) {
      jQuery(document).ready(function($) {
        $.ajax({
          type: 'POST',
          url: '<?php echo admin_url('admin-ajax.php'); ?>',
          dataType: "html", // add data type
          data: {
            action: 'get_ajax_map'
          },
          success: function(response) {
            var map = sessionStorage.setItem("svg-map", response);
            $('#svg-map').prepend(response);
          }
        });
      });
    }
    jQuery('#svg-map').prepend(map);
  </script>
</my-map>