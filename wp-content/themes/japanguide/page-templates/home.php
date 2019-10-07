<?php

/**
 * Template Name: Home Page
 */
get_header();
?>
<!--Start Pull HTML here-->
    <?php get_template_part('template-parts/blocks/home/slider') ?>
    <?php get_template_part('template-parts/blocks/global/five-news') ?>
    <?php get_template_part('template-parts/blocks/home/interests') ?>
    <?php get_template_part('template-parts/blocks/home/top-destinations') ?>
<!--END  Pull HTML here-->
<?php get_footer();
