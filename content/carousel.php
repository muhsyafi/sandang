<style type="text/css">
</style>
<div class="main">
	<div class="main-wrapper">
			<div class="slide-margin"></div>
		<div class="slide-wrapper">
		<h1></h1>
		</div>
	</div>

	<div id="carouse">
		<?php include 'content/slick.php'; ?>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() { // Ready
		$('.slide-wrapper').html('<img src="assets/img/web/preload.gif">');
		function loadImg(id)
		{	
			$.ajax({
				url: 'content/home-slider.php',
				type: 'GET',
				dataType: 'html',
				data:{'id':id},
			})
			.done(function(data) {
				$('.slide-wrapper').html(data);
			})		
			//loadImg(id);
		};

		loadImg(4);
		$('.carousel-small #carousel').find('div').eq(0).addClass('active');
		$('#carousel').find('div').eq(3).addClass('active');

		$('#carousel').find('div').click(function(event) {
			$('.slide-wrapper').html('<img src="assets/img/web/preload.gif">');
			_id=$(this).attr('id');
			$('#carousel').find('div').removeClass('active');
			$(this).addClass('active');
			loadImg(_id);
		});
		$('.carousel-small #carousel').find('div').click(function(event) {
			$('.slide-wrapper').html('<img src="assets/img/web/preload.gif">');
			_id=$(this).attr('id');
			loadImg(_id);
			$('.carousel-small #carousel').find('div').removeClass('active');
			$(this).addClass('active');
		});

	});//End ready
</script>