<?php
$destinationsL = 'destination_home_' . LANGUAGE_SLUG;
if (false === ($destinations  = get_transient($destinationsL))) {
$include_ja = array(1021, 1022, 1023, 1024, 1025, 1026, 1027, 1028);
$include_vi = array(1219, 1221, 1223, 1225, 1227, 1229, 1231, 1233);
$args = array(
  'hide_empty' => false,
  'orderby' => 'term_id',
  'order' => 'ASC',
  'include'       => array_merge($include_vi, $include_ja),
);
$destinations = get_terms('destinations', $args);
set_transient($destinationsL, $destinations, 30 * DAY_IN_SECONDS);
}
?>
<my-map>
    <div id="svg-map" style="min-height: 300px;" class="kilala-animation-item" data-animate></div>
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

    <div id="map-text">
      <?php
        printf('<a id="hokkaido-text" title="%1$s" href="%2$s" class="map-spot hokkaido">HOKKAIDO</a>', $destinations[0]->name, get_term_link($destinations[0]->term_id));
        printf('<a id="tohoku-text" title="%1$s" href="%2$s" class="map-spot tohoku">TOHOKU</a>', $destinations[1]->name, get_term_link($destinations[1]->term_id));
        printf('<a id="kanto-text" title="%1$s" href="%2$s" class="map-spot kanto">KANTO</a>', $destinations[3]->name, get_term_link($destinations[3]->term_id));
        printf('<a id="chubu-text" title="%1$s" href="%2$s" class="map-spot chubu">CHUBU</a>', $destinations[2]->name, get_term_link($destinations[2]->term_id));
        printf('<a id="chugoku-text" title="%1$s" href="%2$s" class="map-spot chugoku">CHUGOKU</a>', $destinations[5]->name, get_term_link($destinations[5]->term_id));
        printf('<a id="kinki-text" title="%1$s" href="%2$s" class="map-spot kinki">KINKI</a>', $destinations[4]->name, get_term_link($destinations[4]->term_id));
        printf('<a id="shikoku-text" title="%1$s" href="%2$s" class="map-spot shikoku">SHIKOKU</a>', $destinations[6]->name, get_term_link($destinations[6]->term_id));
        printf('<a id="kyushu-okinawa-text" title="%1$s" href="%2$s" class="map-spot kyushu-okinawa">KYUSHU<br>OKINAWA</a>', $destinations[7]->name, get_term_link($destinations[7]->term_id));
        ?>
    </div>
  </my-map>