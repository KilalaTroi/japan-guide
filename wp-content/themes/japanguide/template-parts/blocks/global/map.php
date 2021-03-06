<?php
if (empty($maps) || NULL === $maps) {
  $maps = get_map();
}
?>

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
                  $position = get_field('position', $destination->taxonomy . '_' . $destination->term_id);
                  $style_position = '';
                  if ( $position ) {
                    $style_position .= isset($position['top']) && $position['top'] ? 'top:'.$position['top'].'%;' : '';
                    $style_position .= isset($position['right']) && $position['right'] ? 'right:'.$position['right'].'%;' : '';
                    $style_position .= isset($position['bottom']) && $position['bottom'] ? 'bottom:'.$position['bottom'].'%;' : '';
                    $style_position .= isset($position['left']) && $position['left'] ? 'left:'.$position['left'].'%;' : '';
                  }
                  printf('<li><a href="%2$s" title="%1$s" id="%3$s" class="map-city" style="%5$s">%4$s</a></li>', $destination->name, get_term_link($destination->term_id), strtolower(str_replace(' ', '-', $destination->name)), ucfirst(str_replace(' ', '<br>', $destination->name)), $style_position);
                }
              } ?>
          </ul>
        </div>
      <?php } ?>
    </div>
  </div>

  <script type="text/javascript" charset="utf-8" async defer>
    var map = sessionStorage.getItem("svg-map");
    if (null === map) {
      jQuery(window).load(function() {
        jQuery.ajax({
          type: 'POST',
          url: '<?php echo admin_url('admin-ajax.php'); ?>',
          dataType: "html", // add data type
          data: {
            action: 'get_ajax_map'
          },
          success: function(response) {
            var map = sessionStorage.setItem("svg-map", response);
            jQuery('#svg-map').prepend(response);
          }
        });
      });
    } else {
      jQuery('#svg-map').prepend(map);
    }
  </script>
</my-map>