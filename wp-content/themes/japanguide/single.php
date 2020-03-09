<?php get_header();

$term = get_primary_taxonomy();
$term_name = !empty($term) ? $term->name : '';
$term_id = !empty($term) ? $term->id : '';
$region_id = get_field('region_of', $term->taxonomy . '_' . $term->term_id);
$term_color = get_field('color', 'regions_' . $region_id);
$term_color = isset($term_color) && !empty($term_color) ? 'style="color:' . $term_color . '"'  : '';
$single_id = get_the_ID();
$exlucdes[] = $single_id;
$interests = get_the_terms($single_id,'topics');

$postTags = get_the_tags($single_id);
$postTagsID = array();
if ( ! empty( $postTags ) ) {
    foreach( $postTags as $postTag ) {
        $postTagsID[] = $postTag->term_id;
    }
}
?>
<?php echo get_breadcrumb(); ?>

<section class="pb-0 pb-lg-5 no-banner block">
  <div class="container sticky-container">
    <div class="row">
      <div class="col-lg-8">
        <section class="article-content">
          <?php if ( is_array($interests) && count($interests) > 0 ) {
            foreach ( $interests as $key => $value ) {
              $topic_term = get_term($value, 'topics');
              include(APP_PATH . '/template-parts/blocks/global/explore_topic.php');
            }
          } ?>
          <?php include(APP_PATH . '/template-parts/blocks/global/explore_destination.php'); ?>
          <?php include(APP_PATH . '/template-parts/components/content.php'); ?>
          <div id="loadmore"></div>
        </section>
        <?php // include(APP_PATH . '/template-parts/blocks/global/post_same_topic.php'); ?>
      </div>
      <div class="col-lg-4 pl-lg-4 has-border-top-sp sidebar align-self-start" id="sidebar">
        <div id="stk-sidebar">
          <?php get_template_part('template-parts/components/sidebar_advertisement'); ?>
          <?php include(APP_PATH . '/template-parts/components/sidebar_tips.php'); ?>
          <?php get_template_part('template-parts/components/sidebar_topic') ?>
        </div>
      </div>
    </div>
  </div>
</section>

<script type="text/javascript" charset="utf-8" async defer>
  jQuery(function($) {
    var canBeLoaded = true, // this param allows to initiate the AJAX call only if necessary
      offset = 0,
      exluces = '<?= implode(',', $exlucdes); ?>',
      tags_id = '<?= implode(',', (array) $postTagsID); ?>',
      bottomOffset = $('#footer').height() + $('#copyright').height() + $('#relate_category').height() + 2500; // the distance (in px) from the page bottom when you want to load more posts
    $(window).scroll(function() {
      var data = {
        'action': 'loadmore',
        'postID': exluces,
        'offset': offset,
        'tags': tags_id,
        'lang': '<?= LANGUAGE_SLUG ?>'
      };

      if ($(document).scrollTop() > ($(document).height() - bottomOffset) && canBeLoaded == true) {
        if (offset < 2) {
          $.ajax({
            url: script_loc.ajax_url,
            data: data,
            type: 'POST',
            beforeSend: function(xhr) {
              // you can also add your own preloader here
              // you see, the AJAX call is in process, we shouldn't run it again until complete
              canBeLoaded = false;
            },
            success: function(data) {
              if (data) {
                $('#loadmore').append(data); // where to insert posts
                FB.XFBML.parse(document.getElementById('content-offset-' + offset));
                // the ajax is completed, now we can run it again
                canBeLoaded = true;
                offset++;
              }
            }
          });
        }
      }
    });
  });
</script>
<?php get_footer(); ?>