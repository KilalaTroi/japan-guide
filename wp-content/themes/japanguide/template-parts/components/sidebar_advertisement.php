<section class="block">
  <a href="/gioi-thieu.html/#datmuasach">
    <img class="img-fluid w-100 lazy" src="<?= ASSETS_PATH ?>images/advertisement/book.jpg" alt="Japan Guide book">
  </a>
</section>
<section id="ads">
</section>
<script type="text/javascript">
	jQuery.getScript('https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js');
	jQuery(window).on('load',function(){
	    jQuery.ajax({
	      type: "POST",
	      url: 'https://kilala.vn/api/ads.php',
	      dataType: "JSON",
	      data: {
				'url' : "https://kilala.vn/",
				'category_id': 2
			},
	      success: function(data)
	      {
	        var count = data.length;
			var html_1 = '';
			var html_g = '<style type="text/css"> .adslot_W1z { display:inline-block; width: 100%; height: 280px; }</style> ';
			var html_w = '';
			for (i=0; i< count; i++ ){
				if('sidebar_1' == data[i]['type']){
					html_1 += data[i]['html'];
				}else{
					if('Google' == data[i]['origin']){
						html_g += data[i]['html'];
					}else{
						html_w += data[i]['html'];
					}
				}
			}
			jQuery('#ads').html(html_1 + html_w + html_g);
			jQuery('#ads>a img').css({"max-width": "100%", "margin-bottom": "25px"});
	      }
	    });
  })
</script>