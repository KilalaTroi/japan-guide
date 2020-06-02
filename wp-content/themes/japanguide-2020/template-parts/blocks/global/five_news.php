<div is="five-news" inline-template>
    <section id="new-article" class="block">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <article v-if="articles.first_article && screenW >= 576">
                        <div class="post-top post-top-lg feature-img" :style="setBackground(articles.first_article.img_url)">
                            <div class="entry">
                                <a v-if="articles.first_article.taxonomy && articles.first_article.taxonomy_link" :title="articles.first_article.taxonomy.name" 
                                    :href="articles.first_article.taxonomy_link" 
                                    class="post-category">
                                    <i :style="articles.first_article.color" class="fa fa-map-marker mr-1"></i>{{ articles.first_article.taxonomy.name }}
                                </a>
                                <h3 class="entry-title" v-html="articles.first_article.title"></h3>
                                <p class="entry-desc d-none d-md-block" v-html="articles.first_article.excerpt"></p>
                            </div>
                            <a :title="articles.first_article.title" :href="articles.first_article.url" class="box-click" v-html="articles.first_article.title"></a>
                        </div>
                    </article>

                    <article v-if="articles.first_article && screenW < 576" class="article-mb">
                        <div class="row">
                            <div class="col-5">
                                <a :href="articles.first_article.url">
                                    <img class="img-fluid" :src="articles.first_article.img_sp_url" :alt="articles.first_article.title">
                                </a>
                                </div>
                                <div class="col-7 pl-0">
                                <a v-if="articles.first_article.taxonomy && articles.first_article.taxonomy_link" :title="articles.first_article.taxonomy.name" 
                                    :href="articles.first_article.taxonomy_link" 
                                    class="post-category">
                                    <i :style="articles.first_article.color" class="fa fa-map-marker mr-1"></i>{{ articles.first_article.taxonomy.name }}
                                </a>
                                <h3 class="entry-title">
                                    <a :href="articles.first_article.url" v-html="articles.first_article.title"></a>
                                </h3>
                            </div>
                        </div>
                    </article>
                </div>

                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-sm-6" v-if="articles.articles && screenW >= 576" v-for="(item, index) in articles.articles" :key="index">
                            <article>
                                <div class="post-top post-top-md feature-img" :style="setBackground(item.img_url)">
                                    <div class="entry">
                                        <a v-if="item.taxonomy && item.taxonomy_link" :title="item.taxonomy.name" 
                                            :href="item.taxonomy_link" 
                                            class="post-category">
                                            <i :style="item.color" class="fa fa-map-marker mr-1"></i>{{ item.taxonomy.name }}
                                        </a>
                                        <h3 class="entry-title" v-html="item.title"></h3>
                                    </div>
                                    <a :title="item.title" :href="item.url" class="box-click" v-html="item.title"></a>
                                </div>
                            </article>
                        </div>

                        <div class="col-sm-6" v-if="articles.articles && screenW < 576" v-for="(item, index) in articles.articles" :key="index">
                            <article class="article-mb mt-3 pt-3 border-top">
                                <div class="row">
                                    <div class="col-5">
                                        <a :href="item.url">
                                            <img class="img-fluid" :src="item.img_url" :alt="item.title">
                                        </a>
                                    </div>
                                    <div class="col-7 pl-0">
                                        <a v-if="item.taxonomy && item.taxonomy_link" :title="item.taxonomy.name" 
                                            :href="item.taxonomy_link" 
                                            class="post-category">
                                            <i :style="item.color" class="fa fa-map-marker mr-1"></i>{{ item.taxonomy.name }}
                                        </a>
                                        <h3 class="entry-title">
                                            <a :href="item.url" v-html="item.title"></a>
                                        </h3>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
