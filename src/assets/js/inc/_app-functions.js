appFunctions = (function ($, window, undefined) {
    'use strict';
    let $win = $(window);
    const mybutton = $("#back-to-top");

    /*-----------------------------------------------------*/
    /*------------------------  init function  --------------------*/
    /*-----------------------------------------------------*/

    function _initFunction() {
        _handleNav2();
        _mapHover();
        _handleExploreNav();
        _clickScrollToTop();

        $(window).scroll(function () {
            _scrollToTop();
        });
    }

    function _handleNav2() {
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

    function _handleNav() {
        var scroll = $(window).scrollTop();
        if (scroll == 0) {
            $("header").removeClass("sticky");
        }
        if (scroll >= 30) {
            $("header").addClass("sticky");
        }
    }

    function _mapHover() {
        $(document).on('mouseenter mouseleave', '#area-mask path', function (e) {
            var _id = $(this).attr('id');
            var _idText = _id.replace('mask', 'text');
            $('#' + _id + ', #' + _idText).addClass('is-active').siblings().removeClass('is-active');
        });

        $(document).on('mouseenter mouseleave', '#map-text .map-spot', function (e) {
            var _id = $(this).attr('id');
            var _idMask = _id.replace('text', 'mask');
            $('#' + _id + ', #' + _idMask).addClass('is-active').siblings().removeClass('is-active');
        });

        $(document).on('click touch', '#area-mask path', function (e) {
            var _id = $(this).attr('id');
            var _idText = _id.replace('mask', 'text');
            $('#' + _idText).trigger('click');
        });
    }

    function _handleExploreNav() {
        $("#openExploreNav").click(function () {
            $("#exploreNav").addClass("show");
            $("#exploreCanvasNav").addClass("show");
        })
        $("#closeExploreNav, #exploreCanvasNav").click(function () {
            $("#exploreNav").removeClass("show");
            $("#exploreCanvasNav").removeClass("show");
        })
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