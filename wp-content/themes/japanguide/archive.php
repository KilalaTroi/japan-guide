<?php
$current_term = get_queried_object();
get_header();
?>
<!--Start Pull HTML here-->
<main id="main-content" class="main taxonomy">
  <?php
  if (isset($current_term->taxonomy)) {
    get_template_part(sprintf('template-parts/taxonomy/%s', $current_term->taxonomy));
  }elseif ( isset( $current_term->name ) ) {
    get_template_part( sprintf( 'template-parts/archive/%s.php', $current_term->name ) );
  } ?>
</main>
<!--END  Pull HTML here-->
<?php get_footer(); ?>