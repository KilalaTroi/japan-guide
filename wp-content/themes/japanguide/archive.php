<?php
$current_term = get_queried_object();
get_header();
?>
<!--Start Pull HTML here-->
<?php
if (isset($current_term->taxonomy)) {
  if ($current_term->taxonomy !== 'category') {
    get_template_part(sprintf('template-parts/taxonomy/%s', $current_term->taxonomy));
  } else {
    if ($current_term->category_parent !== 0) {
      if (in_array($current_term->category_parent, array(7, 1258)) === true) {
        get_template_part('template-parts/taxonomy/destination');
      } else {
        get_template_part('template-parts/taxonomy/category');
      }
    } else {
      if (in_array($current_term->term_id, array(7, 1258)) === true) {
        get_template_part('page-templates/destination');
      } else {
        get_template_part('template-parts/taxonomy/category');
      }
    }
  }
} elseif (isset($current_term->name)) {
  get_template_part(sprintf('template-parts/archive/%s', $current_term->name));
} ?>
<!--END  Pull HTML here-->
<?php get_footer(); ?>