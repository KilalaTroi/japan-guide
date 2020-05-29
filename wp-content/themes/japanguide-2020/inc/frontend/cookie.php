<?php if (!defined('APP_PATH')) die('Bad requested!');

function get_ajax_logo()
{
  get_template_part('template-parts/svgs/logo-animation');
  exit; // exit ajax call(or it will return useless information to the response)
}

// Fire AJAX action for both logged in and non-logged in users
add_action('wp_ajax_get_ajax_logo', 'get_ajax_logo');
add_action('wp_ajax_nopriv_get_ajax_logo', 'get_ajax_logo');

// first_load
add_action('progress_loading_script', 'progress_loading_func', 10, 3);

function progress_loading_func()
{ ?>
    <script type="text/javascript" charset="utf-8" async defer>
        var first_load = sessionStorage.getItem('first_load');
        if (first_load === null) {
            var body = jQuery('body');
            var js_progressLoading = jQuery('#js_progressLoading');
            var preloadSVG = jQuery('#preloadSVG');
            var svg_change = jQuery('#svg_change');
            var indexLoading = 0;

            body.addClass("disableScroll");
            js_progressLoading.css('display', 'block');
            
            var logoAnimation = localStorage.getItem("logo-animation");
            if (null === logoAnimation) {
                jQuery('body').removeClass('disableScroll');
                jQuery('#js_progressLoading').fadeOut();

                jQuery(window).load(function(){
                    jQuery.ajax({
                        type: 'POST',
                        url: '<?php echo admin_url('admin-ajax.php'); ?>',
                        dataType: "html", // add data type
                        data: {
                            action: 'get_ajax_logo'
                        },
                        success: function(response) {
                            var map = localStorage.setItem("logo-animation", response);
                            preloadSVG.append(response);
                        }
                    });
                });
                    
            } else {
                preloadSVG.append(logoAnimation);

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
            }
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
