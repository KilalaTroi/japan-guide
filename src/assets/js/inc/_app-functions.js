appFunctions = (function ($, window, undefined) {
    'use strict';
    let $win = $(window);

    /*-----------------------------------------------------*/
    /*------------------------  init function  --------------------*/
    /*-----------------------------------------------------*/

    function _initFunction() {
        handleNav();
        $(window).scroll(function () {
            handleNav();
        });
    }

    function handleNav(){
        var scroll = $(window).scrollTop();
        if (scroll == 0) {
            $("header").removeClass("sticky");
        }
        if (scroll >= 30) {
            $("header").addClass("sticky");
        }
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