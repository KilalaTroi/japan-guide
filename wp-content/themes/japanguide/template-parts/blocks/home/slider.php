<section id="banner">
<div class="container">
<?php $listSlides = wpedu_get_option('option_slides');
if (isset($listSlides) && !empty($listSlides)) : ?>
<div id="myCarousel" class="carousel slide carousel-fade kilala-animation" data-ride="carousel">
<ol class="carousel-indicators kilala-animation-item" data-animate>
<?php for ($i = 0; $i < count($listSlides); $i++) :
printf('<li data-target="#myCarousel" data-slide-to="%s" class="%s"></li>', $i, $i === 0 ? 'active' : '');
endfor;
?>
</ol>
<div class="carousel-inner kilala-animation-item" data-animate>
<?php
foreach ($listSlides as $k => $v) : ?>
<div class="carousel-item <?php echo $k === 0 ? 'active' : ''; ?>"><?php printf('<img class="d-block w-100" src="%s" alt="%s">', $v['image'], $v['title']); ?></div>
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
</div>
</section>