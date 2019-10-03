<?php if (! defined('APP_PATH')) die ('Bad requested!');

function get_ajax_map() {
    ?>
    <my-map>
        <?php get_template_part('template-parts/svgs/map') ?>
        <div id="map-text">
            <a id="hokkaido-text" class="map-spot hokkaido">HOKKAIDO</a>
            <a id="tohoku-text" class="map-spot tohoku">TOHOKU</a>
            <a id="chubu-text" class="map-spot chubu">CHUBU</a>
            <a id="kanto-text" class="map-spot kanto">KANTO</a>
            <a id="chugoku-text" class="map-spot chugoku">CHUGOKU</a>
            <a id="kinki-text" class="map-spot kinki">KINKI</a>
            <a id="shikoku-text" class="map-spot shikoku">SHIKOKU</a>
            <a id="kyushu-okinawa-text" class="map-spot kyushu-okinawa">KYUSHU<br>OKINAWA</a>
        </div>
    </my-map>
    <?php
    exit; // exit ajax call(or it will return useless information to the response)
}

// Fire AJAX action for both logged in and non-logged in users
add_action('wp_ajax_get_ajax_map', 'get_ajax_map');
add_action('wp_ajax_nopriv_get_ajax_map', 'get_ajax_map');