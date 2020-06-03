<?php if ( is_front_page() ) { ?>
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
Vue.component('interests', {
    data () {
        return {
            topics: [],
            topicTitle: "<?= pll__('Topic') ?>" + " <thin>" + "<?= pll__('popular') ?>" + "</thin>"
        }
    },
    mounted() {
        let _this = this;

        _this.getTopics();
    },
    methods: {
        getTopics() {
            let _this = this;

            jQuery.ajax({
                type: 'POST',
                url: script_loc.ajax_url,
                dataType: "json", // add data type
                data: {
                    action: 'get_topics_top_ajax'
                },
                success: function(response) {
                    _this.topics = response;
                }
            });
        }
    }
});
Vue.component('destination', {
    data () {
        return {
            destinations: [],
            title: "<?= pll__('Destination') ?>",
            subTitle: "<thin>" + "<?= pll__('8 khu vực địa lý Nhật Bản') ?>" + "</thin>",
            titleChild: "<?= pll__('Điểm đến') ?>" + " <thin>" + "<?= pll__('được yêu thích nhất') ?>" + "</thin>"
        }
    },
    mounted() {
        let _this = this;

        _this.getDestinations();
    },
    methods: {
        getDestinations() {
            let _this = this;

            jQuery.ajax({
                type: 'POST',
                url: script_loc.ajax_url,
                dataType: "json", // add data type
                data: {
                    action: 'get_destinations_top_ajax'
                },
                success: function(response) {
                    _this.destinations = response;
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

Vue.component('map-svg', {
    data () {
        return {
            maps: [],
            mapSVG: sessionStorage.getItem("svg-map"),
        }
    },
    mounted() {
        let _this = this;

        _this.getSVG();
        _this.getMaps();
    },
    methods: {
        getMaps() {
            let _this = this;

            jQuery.ajax({
                type: 'POST',
                url: script_loc.ajax_url,
                dataType: "json", // add data type
                data: {
                    action: 'get_map_ajax'
                },
                success: function(response) {
                    _this.maps = response;
                }
            });
        },
        getSVG() {
            let _this = this;

            if ( ! _this.mapSVG ) {
                jQuery.ajax({
                    type: 'POST',
                    url: script_loc.ajax_url,
                    dataType: "html", // add data type
                    data: {
                        action: 'get_ajax_map'
                    },
                    success: function(response) {
                        sessionStorage.setItem("svg-map", response);
                        _this.mapSVG = sessionStorage.getItem("svg-map");
                    }
                });
            }
        }
    }
});
</script>
<?php }
