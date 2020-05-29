<section id="banner" is="vue-banner" inline-template>
    <div class="container">
        <div v-if="sliders" id="myCarousel" class="carousel slide carousel-fade d-sm-block d-none" data-ride="carousel">
            <ol class="carousel-indicators">
                <li v-for="(item, index) in sliders" :key="index" data-target="#myCarousel" :data-slide-to="index" :class="index === 0 ? 'active' : ''"></li>
            </ol>

            <div class="carousel-inner">
                <div v-for="(item, index) in sliders" :key="index" :class="index === 0 ? 'active carousel-item' : ''" data-interval="10000">
                    <a :href="item.url" class="carousel-link">
                        <img class="img-fluid" :src="item.image" :alt="item.title">
                    </a>
                    <a v-if="index === 0" class="btn play" :href="item.url" id="btn-discover" style="background-image: url(<?= ASSETS_PATH ?>images/svg/arrow-animation.svg)"></a>
                </div>
            </div>

            <a class="carousel-control-prev kilala-animation-item" href="#myCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only"><?php echo pll__('Previous'); ?></span>
            </a>

            <a class="carousel-control-next kilala-animation-item" href="#myCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only"><?php echo pll__('Next'); ?></span>
            </a>
        </div>
    </div>
</section>