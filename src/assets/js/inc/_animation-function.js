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

		let $kAnimation = ['.hkt-animation .hkt-animation-title', '.hkt-animation .hkt-animation-des', '.hkt-animation .hkt-animation-img'];
        let $kAnimationItem = '.hkt-animation .hkt-animation-item';

        if($('.hkt-animation').length) {
			_tweenStepByStep($kAnimation,'.hkt-animation', 1.5, 0.15);
            _tweenStepByStep($kAnimationItem,'.hkt-animation', 1.5, 0.35);
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
