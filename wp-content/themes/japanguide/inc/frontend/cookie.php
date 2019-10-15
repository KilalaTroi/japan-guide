<?php if (!defined('APP_PATH')) die('Bad requested!');

// first_load
add_action('progress_loading_script', 'progress_loading_func', 10, 3);

function progress_loading_func()
{
    /*
     function createCookie(name,value,days) {
            if (days) {
                var date = new Date();
                date.setTime(date.getTime()+(days*24*60*60*1000));
                var expires = "; expires="+date.toGMTString();
            }
            else var expires = "";
            document.cookie = name+"="+value+expires+"; path=/";
        }

        function readCookie(name) {
            var nameEQ = name + "=";
            var ca = document.cookie.split(';');
            for(var i=0;i < ca.length;i++) {
                var c = ca[i];
                while (c.charAt(0)==' ') c = c.substring(1,c.length);
                if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
            }
            return null;
        }

        function eraseCookie(name) {
            createCookie(name,"",-1);
        }
    */
    ?>
    <script type="text/javascript" charset="utf-8" async defer>
        var first_load = sessionStorage.getItem('first_load');
        if (first_load === null) {
            var body = jQuery('body');
            var js_progressLoading = jQuery('#js_progressLoading');
            // var preloadSVG = jQuery('#preloadSVG');
            var svg_change = jQuery('#svg_change');
            body.addClass("disableScroll");
            js_progressLoading.css('display', 'block');
            var indexLoading = 0;
            js_progressLoading.removeAttr('style');
            var tid = setInterval(function() {
                index_10 = indexLoading;
                if (indexLoading < 100) {
                    index_10 = ('0' + indexLoading).slice(-2);
                    index_10 = ('0' + index_10).slice(-3);
                }
                svg_change.attr("xlink:href", "#frame" + index_10);
                if (indexLoading == 120) {
                    clearInterval(tid);
                    jQuery(document).ready(function() {
                        jQuery('body').removeClass('disableScroll');
                        jQuery('#js_progressLoading').fadeOut();
                    });
                }

                indexLoading++;
            }, 15);
            sessionStorage.setItem("first_load", 1);
        } else {
            jQuery('body').addClass('loading');
            setTimeout(function() {
                if (jQuery('body').hasClass('loading')) {
                    jQuery('body').removeClass('loading');
                }
            }, 3000);
            jQuery(window).on("load", function() {
                if (jQuery('body').hasClass('loading')) {
                    jQuery('body').removeClass('loading');
                }
            });
        }
    </script>
<?php
}
