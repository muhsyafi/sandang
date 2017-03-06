<?php 
$files=scandir('assets/img/gallery');
$num_files=count($files);
?>
<div class="contentImagesSmall">
		<div class="splash"><img src=""></div>
			<div>
				<?php for ($i=1; $i <=6; $i++) { 
				?>
				<img  src="assets/img/home-gallery-small/<?php echo($i)?>.jpg">
				<?php 
					}
				?>
			</div>
		<a href="?menu=gallery" class="gallery-more btn">View More...</a>
</div>
<div class="gallery-container">
<div class="nav">
						<a href="#" id="next">
							<img src="assets/img/web/arrow2.svg">
						</a>
						<a href="#" id="pause" class="pause">
							<img src="assets/img/web/pause.svg">
						</a>
						<a href="#" id="back">
							<img src="assets/img/web/arrow.svg">
						</a>
</div>


	<div class="contentImages">
				<div class="pics" id="slide" style="position:relative; overflow:hidden">
					<?php for ($i=1; $i <=10; $i++) { 
					?>
					<img src="assets/img/home-gallery/<?php echo($i)?>.jpg">
					<?php 
						}
					?>
				</div>
	</div>

</div>

<script>

	$(document).ready(function() {
$('.pics img').each(function(){
  $(this).wrap('<span />');
});


//Hover Back
$('.gallery-container').hover(function() {
	$('.nav').fadeIn();
}, function() {
	$('.nav').fadeOut();
});
//end hover

		$('#slide').cycle({ 
    	fx: 'scrollHorz', 
    	prev: '#back',
    	next : '#next',
    	delay:-4000,
    	rev : true
		});

		//Pause play
		$('#pause').click(function(event) {
			var kelas=$(this).attr('class');
			if (kelas=='pause') {
					$('#slide').cycle('pause');
					$('#pause img').attr('src', 'assets/img/web/play.svg');
					$(this).addClass('play');
					$(this).removeClass('pause');
			}else if (kelas=='play') {
					$('#slide').cycle('resume');
					$('#pause img').attr('src', 'assets/img/web/pause.svg');
					$(this).addClass('pause');
					$(this).removeClass('play');
			};

		});
		//end pause play

	});
</script>