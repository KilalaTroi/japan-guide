require('resize-sensor');
import StickySidebar from 'sticky-sidebar';

const appFunctions = (function ($, window, undefined) {
    'use strict';
    const $win = $(window);
    const _windowWidth = $win.width();
    const mybutton = $("#back-to-top");

    /*-----------------------------------------------------*/
    /*------------------------  init function  --------------------*/
    /*-----------------------------------------------------*/

    function _initFunction() {
        _handleNav();
        _mapHover();
        _handleExploreNav();
        _clickScrollToTop();
        _sticky();
        _breadcrumbsScroll();
        _addNewsletterToKilala();

        $win.scroll(function () {
            _scrollToTop();
        });

        $win.resize(function () {
            let _newWidth = $win.width();
            if ( _windowWidth !== _newWidth ) {
                _breadcrumbsScroll();
            }
        });
    }

    function _breadcrumbsScroll() {
        let _brb = $('.breadcrumb>span');
        let _brb_inner = $('.breadcrumb>span>span');

        if(_windowWidth < 576) {
            _brb_inner.css('white-space', 'nowrap');
            let breadcrumbsWidth = _brb.outerWidth() + 40;
            if(breadcrumbsWidth > _windowWidth) {
                _brb.css('overflow-x','scroll');
                _brb.css('width',_windowWidth - 40);
                _brb_inner.css('white-space', 'nowrap');
            } else {
                _brb.css('overflow-x','');
                _brb.css('width','');
                _brb_inner.css('white-space', 'normal');
            }
        } else {
            _brb.css('overflow-x','');
            _brb.css('width','');
            _brb_inner.css('white-space', 'normal');
        }
    }

    function _sticky() {
        if ( $('#sidebar').length > 0 ) {
            let sidebar = document.getElementById('sidebar');

            let stickySidebar = new StickySidebar(sidebar, {
                topSpacing: 100,
                containerSelector: '.sticky-container',
                resizeSensor: true,
                minWidth: 991
            });
        }
    }

    function _handleNav() {
        let navbar = $("#header-menu");
        let sticky = navbar.offset().top;

        $(window).scroll(function () {
            if (window.pageYOffset >= (sticky + 100)) {
                navbar.addClass("sticky")
            } else {
                navbar.removeClass("sticky");
            }
        });
    }

    function _scrollToTop() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            mybutton.fadeIn();
        } else {
            mybutton.fadeOut();
        }
    }

    function _clickScrollToTop() {
        mybutton.on('click touch', function (e) {
            e.preventDefault();
            $('html,body').animate({ scrollTop: 0 }, 400);
            return false;
        })
    }

    function _mapHover() {
        $(document).on('mouseenter', '#map-text .map-spot', function (e) {
            let _id = $(this).attr('id');
            let _idMask = _id.replace('text', 'mask');
            $('#' + _id + ', #' + _idMask).addClass('is-active').siblings().removeClass('is-active');
        });

        $(document).on('mouseleave', '#map-text .map-spot', function (e) {
            let _id = $(this).attr('id');
            let _idMask = _id.replace('text', 'mask');
            $('#' + _id + ', #' + _idMask).removeClass('is-active');
        });
    }

    function _handleExploreNav() {
        $(document).on('click', '[id^="openExploreNav"], [id^="openTopic"]', function (e) {
            e.preventDefault();
            $($(this).attr('data-sidebar')).addClass("show");
            $($(this).attr('data-overlay')).addClass("show");
        });
        $(document).on('click', '[id^="closeExploreNav"], [id^="exploreCanvasNav"], [id^="closeTopic"], [id^="exploreTopicOV"]', function (e) {
            e.preventDefault();
            $($(this).attr('data-sidebar')).removeClass("show");
            $($(this).attr('data-overlay')).removeClass("show");
        })
    }

    function _addNewsletterToKilala() {
        document.addEventListener( 'wpcf7mailsent', function( event ) {
            if ( '8352' == event.detail.contactFormId ) {
                $.ajax({
                    url : "https://kilala.vn/api/add_newsletter.php",
                    type : "post", 
                    data : {
                         email : $('#footer .wpcf7-email').val()
                    },
                    success : function (result){}
                });
            }
        }, false );
    }

    /*-----------------------------------------------------*/
    /*------------------------  export function  ---------------------*/
    /*-----------------------------------------------------*/

    function _exportFunction() {
        console.log('export function');
    }


    return {
        init: function () {
            _initFunction();
        },
        exportFunction: _exportFunction,
    };

}(jQuery, window));

jQuery(document).ready(function () {
    appFunctions.init();
});