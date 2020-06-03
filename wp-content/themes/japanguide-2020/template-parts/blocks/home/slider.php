<div is="vue-banner" inline-template>
    <section id="banner">
        <div class="container">
            <div v-if="sliders && screenW >= 576" id="myCarousel">
                <div class="carousel-inner">
                    <div v-for="(item, index) in sliders" :key="index" :class="index === 0 ? 'active carousel-item' : 'carousel-item'">
                        <a :href="item.url" class="carousel-link">
                            <img class="img-fluid" :src="item.image" :alt="item.title">
                        </a>
                        <a v-if="index === 0" class="btn play" :href="item.url" id="btn-discover" style="background-image: url(<?= ASSETS_PATH ?>images/svg/arrow-animation.svg)"></a>
                    </div>
                </div>
            </div>

            <div v-if="slidersMB && screenW < 576" id="myCarouselMb">
                <div class="carousel-inner">
                    <div v-for="(item, index) in slidersMB" :key="index" :class="index === 0 ? 'active carousel-item' : 'carousel-item'" :style="setBackground(item.image)">
                        <a :href="item.url" class="carousel-link">
                            {{ item.title }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>