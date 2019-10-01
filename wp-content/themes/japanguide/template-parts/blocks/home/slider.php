<?php $listSlides = wpedu_get_option('option_slides');
if (isset($listSlides) && !empty($listSlides)) : ?>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <?php for ($i = 0; $i < count($listSlides); $i++) :
                    printf('<li data-target="#myCarousel" data-slide-to="%s" class="%s"></li>', $i, $i === 0 ? 'active' : '');
                endfor;
            ?>
        </ol>
        <div class="carousel-inner">
            <?php
                foreach ($listSlides as $k => $v) : ?>
                <div class="carousel-item <?php echo $k === 0 ? 'active' : ''; ?>">
                    <?php printf('<img src="%s" alt="%s">', $v['image'], $v['title']); ?>
                    <div class="container">
                        <div class="carousel-caption text-left">
                            <h3><?php echo $v['title']; ?></h3>
                            <p><?php echo $v['description']; ?></p>
                            <p><a class="btn btn-lg btn-primary" href="<?php echo $v['url']; ?>" role="button">Read more</a></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
<?php endif; ?>