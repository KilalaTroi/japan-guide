<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */
get_header(); ?>
<?php echo get_breadcrumb(); ?>
<section>
  <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <section class="block">
                    <h1 class="main-title-lg">
                        <?= pll__('search-results'); ?>
                        <thin><?php echo get_search_query(); ?></thin>
                    </h1>
                    <div class="row gallery-cards sm">
                        <div class="gallery">
                            <?php if ( have_posts() ) : ?>
                                <div class="row">
                                    <?php while (have_posts()) : the_post();
                                        $img = get_the_post_thumbnail_url($post->ID, 'feature-image');
                                        $img = isset($img) && !empty($img) ? $img : no_img('8151', 'feature-image');
                                        $taxonomies = get_the_terms($post->ID, 'category');
                                        include(APP_PATH . '/template-parts/components/article_col_4.php');
                                    endwhile;
                                    ?>
                                </div>
                            <?php else : get_template_part( 'template-parts/content/content', 'none' ); endif; ?>
                        </div>
                    </div>
                    <div class="div-pagination mt-4">
                        <?php
                            if (function_exists("fellowtuts_wpbs_pagination")) {
                                fellowtuts_wpbs_pagination();
                            }
                        ?>
                    </div>
                </section>
            </div>
            <!-- <div class="col-lg-4 pl-lg-4 has-border-top-sp">
                <?php // get_sidebar('right'); ?>
            </div> -->
        </div>
    </div>
</section>

<?php get_footer();