<style type="text/css">
	.slide-wrapper{
		height: 180px;
		width: auto;
		margin-top: 300px !important;
		margin: 0 auto;
		text-align: center;
		overflow: hidden;
	}
	.inlineb{
		display: inline-block;
		vertical-align: top;
	}
	.main-wrapper{
		width: 100%;
		text-align: center;
	}

</style>
<div class="main">
	<div class="main-wrapper">
		<div class="slide-wrapper">
		<br>
		<br>
		<br>
		<br>
		<br>
		<h1></h1>
		</div>
	</div>

	<div id="carousel">
		<?php include 'content/slick.php'; ?>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() { // Ready
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
				$('.slide-wrapper').addClass('animated bounceIn');
			});
			$('.slide-wrapper').removeClass('animated bounceIn');			
			//loadImg(id);
		}
		loadImg(1);
	});//End ready
</script>