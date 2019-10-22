<?php
$current_term = get_queried_object();
get_header();
?>
<?php
if (isset($current_term->taxonomy)) {
  get_template_part(sprintf('template-parts/taxonomy/%s', $current_term->taxonomy));
} elseif (isset($current_term->name)) {
  get_template_part(sprintf('template-parts/archive/%s', $current_term->name));
} ?>
<?php get_footer(); ?>