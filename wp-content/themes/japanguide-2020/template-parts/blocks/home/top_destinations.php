<div is="destination" inline-template>
	<section id="destination" class="block">
		<div class="container">
			<h2 class="main-title-lg mb-2" v-html="title"></h2>
			<h2 class="main-title-lg" v-html="subTitle"></h2>
			<div class="row">
				<div class="col-12 col-md-8 col-lg-7 mx-auto">
					<!-- map -->
					<?php get_template_part('template-parts/blocks/global/map') ?>
				</div>
			</div>
			
			<h2 class="main-title-lg my-3" v-html="titleChild"></h2>
			<div class="row gallery-cards" v-if="destinations">
				<div v-for="(item, index) in destinations" :key="index" :class="(3 < index) ? 'col-6 col-lg-3 gallery d-none d-sm-block' : 'col-6 col-lg-3 gallery'">
					<a class="link-gallery" :title="item.name" :href="item.url">
						<div class="link-gallery-image">
							<figure class="image">
								<div class="image-mask" :style="setBackground(item.img_url)"></div>
							</figure>
							<div class="link-gallery-image-text">
								<div class="link-gallery-image-text-content" v-html="item.description"></div>
							</div>
						</div>
						<div class="link-gallery-desc">
							<h3>{{ item.name }}</h3>
							<p class='d-none d-sm-block' v-html="item.short_description"></p>
					</a>
				</div>
			</div>
		</div>
	</section>
</div>