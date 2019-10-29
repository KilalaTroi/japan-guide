require('resize-sensor');
import StickySidebar from 'sticky-sidebar';

const appFunctions = (function ($, window, undefined) {
    'use strict';
    let $win = $(window);
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

        $(window).scroll(function () {
            _scrollToTop();
        });
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