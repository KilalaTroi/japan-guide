<!-- Scroll Top button -->
<div is="back-to-top" inline-template>
<a id="back-to-top" href="javascript:void(0)"><i class="fa fa-chevron-up" aria-hidden="true"></i></a>
</div>
</main>
<?php get_template_part('footer_'.LANGUAGE_SLUG) ?>
<?php wp_footer(); ?>
<?php get_template_part( 'template-parts/components/scripts', get_post_type() ); ?>
<script type="text/javascript">
    let app = new Vue({
        el: '#main-content',
    });
</script>
<?= wpedu_get_option('option_footer_code') ?>
</body>
</html>