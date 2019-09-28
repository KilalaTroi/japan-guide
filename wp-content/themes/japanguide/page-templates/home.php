<?php
/**
 * Template Name: Home Page
 */
get_header();
?>
    <!--Start Pull HTML here-->
    <main id="main-content" class="main">
        <?php get_template_part('template-parts/blocks/home/slider') ?>
        <?php get_template_part('template-parts/blocks/home/appointments') ?>
        <?php get_template_part('template-parts/blocks/home/information') ?>
        <?php get_template_part('template-parts/blocks/global/five-events') ?>
    </main>
    <!--END  Pull HTML here-->
<?php get_footer();

