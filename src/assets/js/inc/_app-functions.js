appFunctions = (function ($, window, undefined) {
    'use strict';
    let $win = $(window);

    /*-----------------------------------------------------*/
    /*------------------------  init function  --------------------*/
    /*-----------------------------------------------------*/

    function _initFunction() {
        _handleNav();
        $(window).scroll(function () {
            _handleNav();
        });
        _mapHover();
    }

    function _handleNav(){
        var scroll = $(window).scrollTop();
        if (scroll == 0) {
            $("header").removeClass("sticky");
        }
        if (scroll >= 30) {
            $("header").addClass("sticky");
        }
    }

    function _mapHover() {
        $(document).on('mouseenter mouseleave','#area-mask path',function (e) {
            var _id = $(this).attr('id');
            var _idText = _id.replace('mask', 'text');
            $('#' + _id + ', #' + _idText).addClass('is-active').siblings().removeClass('is-active');
        })
        
        $(document).on('mouseenter mouseleave','#map-text .map-spot',function (e) {
            var _id = $(this).attr('id');
            var _idMask = _id.replace('text', 'mask');
            $('#' + _id + ', #' + _idMask).addClass('is-active').siblings().removeClass('is-active');
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