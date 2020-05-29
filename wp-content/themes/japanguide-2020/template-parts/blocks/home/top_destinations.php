<section id="destination" class="block kilala-animation-3 show-after-load" style="display: none;">
	<div class="container">
		<h2 class="main-title-lg kilala-animation-item mb-2" data-animate>
			<?php printf('%s', pll__('Destination')); ?>
		</h2>
		<h2 class="main-title-lg kilala-animation-item" data-animate><thin><?= pll__('8 khu vực địa lý Nhật Bản') ?></thin></h2>
		<div class="row">
			<div class="col-12 col-md-8 col-lg-7 mx-auto">
				<!-- map -->
				<?php get_template_part('template-parts/blocks/global/map') ?>
			</div>
		</div>
		<?php
		if (empty($destinations_top) || NULL === $destinations_top) {
			$destinations_top = get_destinations_top();
		}
		?>

		<h2 class="main-title-lg kilala-animation-item my-3" data-animate>
			<?= pll__('Điểm đến') ?>
			<thin><?= pll__('được yêu thích nhất') ?></thin>
		</h2>
		<div class="row gallery-cards">
			<?php foreach ($destinations_top as $k => $v) :
				if (7 < $k) break;
				$thumbnail = get_field('feature_image', $v->taxonomy . '_' . $v->term_id);
				$thumbnail = isset($thumbnail) && !empty($thumbnail) ? $thumbnail['url']  : no_img('8151');
				$content = get_field('content', $v->taxonomy . '_' . $v->term_id);
				$description_cotnent = get_short_text($content, 345);

				?>
				<div class="col-6 col-lg-3 gallery kilala-animation-item<?= (3 < $k) ? ' d-none d-sm-block' : '' ?>" data-animate>
					<a class="link-gallery" title="<?php echo $v->name ?>" href="<?php echo get_term_link($v->term_id) ?>">
						<div class="link-gallery-image">
							<figure class="image">
								<div class="image-mask js-bg-img" data-img="<?php echo $thumbnail; ?>"></div>
							</figure>
							<div class="link-gallery-image-text">
								<div class="link-gallery-image-text-content"><?php echo $description_cotnent; ?></div>
							</div>
						</div>
						<div class="link-gallery-desc">
							<h3><?php echo $v->name; ?></h3>
							<?php if (isset($v->description) && !empty($v->description)) {
								printf("<p class='d-none d-sm-block'>%s</p>", $v->description);
							} ?>
						</div>
					</a>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>