<!-- <?php get_header(); ?>
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
<?php get_footer(); ?> -->
<?php
$current_term = get_queried_object();
get_header();
?>
<!--Start Pull HTML here-->
  <?php
  if (isset($current_term->taxonomy)) {
    get_template_part(sprintf('template-parts/taxonomy/%s', $current_term->taxonomy));
  }elseif ( isset( $current_term->name ) ) {
    get_template_part( sprintf( 'template-parts/archive/%s.php', $current_term->name ) );
  } ?>
<!--END  Pull HTML here-->
<?php get_footer(); ?>