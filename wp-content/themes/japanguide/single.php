<?php get_header(); ?>
<div class="container py-5">
    <div class="row">
        <div class="col-sm-8">
            <h1><?= the_title() ?></h1>
            <div class="content">
                <?= the_content() ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
