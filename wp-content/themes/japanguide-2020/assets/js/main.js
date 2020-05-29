Vue.component('back-to-top', {
    mounted() {
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
    }
})