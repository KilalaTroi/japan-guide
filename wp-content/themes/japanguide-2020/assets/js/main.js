Vue.component('back-to-top', {
    data () {
        return {
            screenW: window.screen.width
        }
    },
    mounted() {
        let _this = this;

        jQuery('#back-to-top').on('click touch', function (e) {
            e.preventDefault();
            jQuery('html,body').animate({ scrollTop: 0 }, 400);
            return false;
        });

        jQuery(window).scroll(function () {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                jQuery('#back-to-top').fadeIn();
            } else {
                jQuery('#back-to-top').fadeOut();
            }
        });

        jQuery(window).resize(function(){
            _this.screenW = window.screen.width;
        });

        jQuery(window).load(function () {
            _this.jsBgImg();
        });
    },
    methods: {
        jsBgImg() {
            let jsBgImg = jQuery('.js-bg-img'); 
            if ( jsBgImg.length > 0 ) {
                jsBgImg.each(function() {
                    jQuery(this).css('background', 'url("'+ jQuery(this).attr('data-img') +'") no-repeat center');
                });
            }
        }
    },
    watch: {
        screenW: [{
            handler: 'jsBgImg'
        }],
    }
})