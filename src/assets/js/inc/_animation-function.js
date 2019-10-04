import * as ScrollMagic from "scrollmagic"; // Or use scrollmagic-with-ssr to avoid server rendering problems
import { TweenMax, TimelineMax } from "gsap"; // Also works with TweenLite and TimelineLite
import { ScrollMagicPluginGsap } from "scrollmagic-plugin-gsap";

ScrollMagicPluginGsap(ScrollMagic, TweenMax, TimelineMax);

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
            _tweenStepByStep($kAnimationItem1,'.kilala-animation-1', 1.5, 0.25);
		}

		if($('.kilala-animation-2').length) {
            _tweenStepByStep($kAnimationItem2,'.kilala-animation-2', 1.5, 0.25);
		}

		if($('.kilala-animation-3').length) {
            _tweenStepByStep($kAnimationItem3,'.kilala-animation-3', 1.5, 0.25);
		}

		if($('.kilala-animation-4').length) {
            _tweenStepByStep($kAnimationItem4,'.kilala-animation-4', 1.5, 0.25);
		}

		if($('.kilala-animation-5').length) {
            _tweenStepByStep($kAnimationItem5,'.kilala-animation-5', 1.5, 0.25);
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
