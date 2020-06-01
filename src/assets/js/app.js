/* ============================================================
  JavaScriptファイルを連結
============================================================ */
//@prepros-prepend ./lib/lodash/lodash.js
//@prepros-prepend ./lib/popper.min.js
//@prepros-prepend ./lib/bootstrap.js
//@prepros-prepend ./lib/slick-carousel/slick/slick.js

// ------- animation-function ------------- // 
(function ($) {
    'use strict';

	function sectionAnim() {
		let controller = new ScrollMagic.Controller();
		let scene;

		/* ########################################################################################### */
		/* ---------------------------------- Animate || fadeInUp ------------------------------------ */
		/* ########################################################################################### */

		let $kAnimation = ['.kilala-animation .kilala-animation-title', '.kilala-animation .kilala-animation-des', '.kilala-animation .kilala-animation-img'];
        let $kAnimationItem = '.kilala-animation .kilala-animation-item';
        let $kAnimationItem1 = '.kilala-animation-1 .kilala-animation-item';
        let $kAnimationItem2 = '.kilala-animation-2 .kilala-animation-item';
        let $kAnimationItem3 = '.kilala-animation-3 .kilala-animation-item';
        let $kAnimationItem4 = '.kilala-animation-4 .kilala-animation-item';
        let $kAnimationItem5 = '.kilala-animation-5 .kilala-animation-item';

        if($('.kilala-animation').length) {
			_tweenStepByStep($kAnimation,'.kilala-animation', 1.5, 0.15);
            _tweenStepByStep($kAnimationItem,'.kilala-animation', 1.5, 0.15);
		}

		if($('.kilala-animation-1').length) {
            _tweenStepByStep($kAnimationItem1,'.kilala-animation-1', 1, 0.15);
		}

		if($('.kilala-animation-2').length) {
            _tweenStepByStep($kAnimationItem2,'.kilala-animation-2', 1, 0.15);
		}

		if($('.kilala-animation-3').length) {
            _tweenStepByStep($kAnimationItem3,'.kilala-animation-3', 1, 0.15);
		}

		if($('.kilala-animation-4').length) {
            _tweenStepByStep($kAnimationItem4,'.kilala-animation-4', 1, 0.15);
		}

		if($('.kilala-animation-5').length) {
            _tweenStepByStep($kAnimationItem5,'.kilala-animation-5', 1, 0.15);
		}

		function _tweenStepByStep(blockList, blockParent, duration, delay) {
			let tweenLM = new TimelineMax();

			$(blockList).each(function (index) {
				let _this = this;
				if($(this).length) {
					tweenLM.from($(_this), duration, {
						autoAlpha: 0,
						y: 40,
						ease: Expo.easeOut,
						delay: delay*(index+1)
					}, 0.1);
				}
			});

			scene = new ScrollMagic.Scene({
				triggerElement: blockParent,
				reverse: false,
				triggerHook: '1',
			})
				.setTween(tweenLM)
				.addTo(controller)
			;
		}

		/* ########################################################################################### */
		/* ------------------------------------------------------------------------------------------- */
		/* ########################################################################################### */
	}

	$(document).ready(function () {
		sectionAnim();
	});
	
})(jQuery);
// ------- end animation-function ------------- //

// ------- Slider ------------- //
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
// ------- end Slider ------------- //

// ------- Main Functions ------------- //
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
        _breadcrumbsScroll();
        _addNewsletterToKilala();
        _jsBgImg();
        _lazyCustom();
        _showAfterLoad();

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

    function _jsBgImg() {
        let jsBgImg = $('.js-bg-img'); 
        if ( jsBgImg.length > 0 ) {
            jsBgImg.each(function() {
                $(this).css('background', 'url("'+ $(this).attr('data-img') +'") no-repeat center');
            });
        }
    }

    function _lazyCustom() {
        let lazyCustom = $('.lazy-custom'); 
        if ( lazyCustom.length > 0 ) {
            lazyCustom.each(function() {
                $(this).attr('src', $(this).attr('data-src'));
            });
        }
    }
    
    function _showAfterLoad() {
        let showAfterLoad = $('.show-after-load'); 
        if ( showAfterLoad.length > 0 ) {
            showAfterLoad.each(function() {
                $(this).css('display', 'block');
            });
        }
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

jQuery(window).load(function () {
    appFunctions.init();
});
// ------- End Main Functions ------------- //
