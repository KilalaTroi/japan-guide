<!-- Scroll Top button -->
<div is="back-to-top" inline-template>
<a id="back-to-top" href="javascript:void(0)"><i class="fa fa-chevron-up" aria-hidden="true"></i></a>
</div>
</main>
<?php get_template_part('footer_'.LANGUAGE_SLUG) ?>
<?php wp_footer(); ?>
<script type="text/javascript">
Vue.component('vue-banner', {
    data () {
        return {
            sliders: <?= json_encode(wpedu_get_option('option_slides')) ?>,
            slidersMB: <?= json_encode(wpedu_get_option('option_slides_mb')) ?>,
            screenW: window.screen.width
        }
    },
    mounted() {
        let _this = this;

        jQuery('#myCarousel .carousel-inner, #myCarouselMb .carousel-inner').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: true,
            fade: true,
        });

        jQuery(window).resize(function(){
            _this.screenW = window.screen.width;
        });
    }
});

Vue.component('five-news', {
    data () {
        return {
            articles: [],
            screenW: window.screen.width
        }
    },
    mounted() {
        let _this = this;

        _this.getArticles();

        jQuery(window).resize(function(){
            _this.screenW = window.screen.width;
        });
    },
    methods: {
        getArticles() {
            let _this = this;

            jQuery.ajax({
                type: 'POST',
                url: script_loc.ajax_url,
                dataType: "json", // add data type
                data: {
                    action: 'get_five_articles'
                },
                success: function(response) {
                    _this.articles = response;
                }
            });
        },
        setBackground(url) {
            return {
                background: 'url("'+ url +'") no-repeat center/cover'
            };
        }
    }
});
</script>
<script type="text/javascript">
    let app = new Vue({
        el: '#main-content',
    });
</script>
<?= wpedu_get_option('option_footer_code') ?>
</body>
</html>