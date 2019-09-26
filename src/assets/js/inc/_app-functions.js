appFunctions = (function ($, window, undefined) {
    'use strict';
    let $win = $(window);

    /*-----------------------------------------------------*/
    /*------------------------  init function  --------------------*/
    /*-----------------------------------------------------*/

    function _initFunction() {
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