<?php get_header(); ?>
<div class="container py-5">
    <div class="row">
        <div class="col-sm-8">
        <?php while ( have_posts() ) : the_post(); ?>
            <h1><?php the_title() ?></h1>
            <div class="content">
                <?php the_content(); ?>
            </div>
        <?php endwhile; ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>
