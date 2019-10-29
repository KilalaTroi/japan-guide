<section id="banner">
    <div class="container">
        <?php $listSlides = wpedu_get_option('option_slides');
        if (isset($listSlides) && !empty($listSlides)) : ?>
            <div id="myCarousel" class="carousel slide carousel-fade carousel-fade kilala-animation d-sm-block d-none" data-ride="carousel">
                <ol class="carousel-indicators kilala-animation-item" data-animate>
                    <?php for ($i = 0; $i < count($listSlides); $i++) :
                        printf('<li data-target="#myCarousel" data-slide-to="%s" class="%s"></li>', $i, $i === 0 ? 'active' : '');
                    endfor;
                    ?>
                </ol>
                <div class="carousel-inner kilala-animation-item" data-animate>
                    <?php
                    foreach ($listSlides as $k => $v) : ?>
                        <div class="carousel-item <?php echo $k === 0 ? 'active' : ''; ?>" data-interval="10000">
                            <a href="<?php echo $v['url']; ?>" class="carousel-link">
                                <?php if ($k === 0) { ?>
                                    <img class="img-fluid" src="<?= $v['image'] ?>" alt="<?php echo $v['title']; ?>">
                                <?php } else { ?>
                                    <img class="lazy img-fluid" data-src="<?= $v['image'] ?>" alt="<?php echo $v['title']; ?>">
                                <?php } ?>
                            </a>
                            <?php if ($k === 0) { ?>
                                <a class="btn play" href="<?php echo $v['url']; ?>" id="btn-discover" style="background-image: url(<?= ASSETS_PATH ?>images/svg/arrow-animation.svg)"></a>
                            <?php } ?>
                        </div>
                    <?php endforeach; ?>
                </div>

                <a class="carousel-control-prev kilala-animation-item" data-animate href="#myCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only"><?php echo pll__('Previous'); ?></span>
                </a>
                <a class="carousel-control-next kilala-animation-item" data-animate href="#myCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only"><?php echo pll__('Next'); ?></span>
                </a>
            </div>
        <?php endif; ?>

        <?php $listSlides = wpedu_get_option('option_slides_mb');
        if (isset($listSlides) && !empty($listSlides)) : ?>
            <div id="myCarouselMb" class="carousel slide carousel-fade kilala-animation d-sm-none d-block" data-ride="carousel">
                <div class="carousel-inner kilala-animation-item" data-animate>
                    <?php
                    foreach ($listSlides as $k => $v) : ?>
                        <div class="carousel-item <?php echo $k === 0 ? 'active' : ''; ?>" style="background-image: url('<?php echo $v['image']; ?>');">
                            <a href="<?php echo $v['url']; ?>" class="carousel-link"><?php echo $v['title']; ?></a>
                        </div>
                    <?php endforeach; ?>
                </div>

                <a class="carousel-control-prev kilala-animation-item" data-animate href="#myCarouselMb" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only"><?php echo pll__('Previous'); ?></span>
                </a>
                <a class="carousel-control-next kilala-animation-item" data-animate href="#myCarouselMb" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only"><?php echo pll__('Next'); ?></span>
                </a>
            </div>
        <?php endif; ?>
    </div>
</section>