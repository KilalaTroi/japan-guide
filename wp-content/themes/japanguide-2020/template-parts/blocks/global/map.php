<div is="map-svg" inline-template>
  	<div id="svg-map" style="min-height: 300px;">
    	<div v-if="mapSVG" v-html="mapSVG"></div>

		<div id="map-text" v-if="maps">
			<div v-for="(item, index) in maps" :key="index" class="map-wrapper" :data-region="item.slug">
				<a :id="item.slug + '-text'" :title="item.name" :href="item.url" :class="'region map-spot ' + item.slug" v-html="item.name.toUpperCase().replace(' ', '<br>')"></a>
				<ul class="city-list">
					<li v-if="item.destinations" v-for="(ps, ps_index) in item.destinations" :key="ps_index">
						<a :href="ps.url" :title="ps.name" :id="ps.slug" class="map-city" :style="ps.style" v-html="ps.uname"></a>
					</li>
				</ul>
			</div>
		</div>
  	</div>
</div>