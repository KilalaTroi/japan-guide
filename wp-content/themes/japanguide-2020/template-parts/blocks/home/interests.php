<div is="interests" inline-template>
	<section id="interests" class="block" v-if="topics">
		<div class="container">
			<h2 class="main-title-lg" v-html="topicTitle"></h2>
			<div class="row galleries">
				<div class="col-6 col-md-3 gallery" v-for="(item, index) in topics" :key="index">
					<a class="link-gallery" :title="item.name" :href="item.url">
						<div class="link-gallery-image">
							<figure class="image">
								<div class="image-mask">
									<img class="img-fluid" :alt="item.name" title="item.name" :src="item.img_url">
								</div>
							</figure>
						</div>
						<div class="link-gallery-text">
							<div class="link-gallery-label">{{ item.name }}</div>
						</div>
					</a>
				</div>
			</div>
		</div>
	</section>
</div>