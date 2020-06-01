<?php
if (empty($topics) || NULL === $topics) {
	$topics = get_topics_top();
}
?>
<section id="interests" class="block kilala-animation-2">
	<div class="container">
		<h2 class="main-title-lg kilala-animation-item" data-animate>
			<?php printf('%s <thin>%s</thin>', pll__('Topic'), pll__('popular')); ?>
		</h2>
		<div class="row galleries">
			<?php
			foreach ($topics as $topic) :
				$thumbnail = get_field('bg_map', $topic->taxonomy . '_' . $topic->term_id);
				$thumbnail = isset($thumbnail) && !empty($thumbnail) ? $thumbnail['sizes']['feature-image']  : no_img('8151', 'feature-image');
				?>
				<div class="col-6 col-md-3 gallery kilala-animation-item" data-animate>
					<a class="link-gallery" title="<?php echo $topic->name; ?>" href="<?php echo get_term_link($topic->term_id); ?>">
						<div class="link-gallery-image">
							<figure class="image">
								<div class="image-mask"><?php printf('<img class="lazy img-fluid" alt="%1$s" title="%1$s" data-src="%2$s">', $topic->name, $thumbnail); ?></div>
							</figure>
						</div>
						<div class="link-gallery-text">
							<div class="link-gallery-label"><?php echo $topic->name ?></div>
						</div>
					</a>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>