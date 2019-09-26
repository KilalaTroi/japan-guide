import 'slick-carousel';

(function ($) {
    'use strict';
    $(document).ready(function () {
        createSlick();
    });

    $(window).on('resizeend', function () {
        createSlick();
    });

    function createSlick() {
        /* ########################################################################################### */
        /* -------------------------------------- K Slider  --------------------------------------- */
        /* ########################################################################################### */
        let slider = $('.kilala-slider');
        let slide = $('.kilala-slider .kilala-item');

        if (slide.length > 1) {
            slider.not('.slick-initialized').slick(
                {
                    infinite: false,
                    speed: 300,
                    slidesToShow: 4,
                    slidesToScroll: 1,
                    // variableWidth: true,
                    swipeToSlide: true,
                    prevArrow : slider.siblings('.slider-nav').find('.kilala-prev'),
                    nextArrow : slider.siblings('.slider-nav').find('.kilala-next'),
                    responsive: [
                        {
                            breakpoint: 1024,
                            settings: {
                                slidesToShow: 3,
                            }
                        },
                        {
                            breakpoint: 600,
                            settings: {
                                slidesToShow: 2,
                            }
                        },
                    ]
                }
            );
        }
    }

})(jQuery);