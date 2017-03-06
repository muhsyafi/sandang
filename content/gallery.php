<?php
//$files=scandir('assets/img/gallery');
//$num_files=count($files);
?>
<style type="text/css">
.contentImages{
    padding:10px;
    margin:-50px auto 0 !important;
    position:relative;
    width: 900px !important;
    height:550px;
    overflow:hidden;
}
.pics{
    position:relative;
    display:block;
    float:left;
    width:900px !important;
    height:550px;
}
.pics img {
    position:relative;
    vertical-align:bottom;
    height: 550px;
    width: 900px !important;
}
.pics span{
    cursor:pointer;
    position:absolute;
    margin-left:0px;
    height:550px;
    width:100%;
    text-align:center;
    background:white;
    line-height:196px;
}

.nav{
	display: none;
	position: absolute;
	z-index: 9999;
	width: 100%;
	height: 105%;
	top: 80px;
}
.nav #next, #back{
	width: 50px;
	height: 620px;
	display: inline-block;
	vertical-align: top;
	zoom: 1; /* Fix for IE7 */
	*display: inline; /* Fix for IE7 */
}
.nav img{
	height: 50px;
}
#next{
	position: absolute;
	left: 30px;
}
#back{
	position: absolute;
	right: 0px;
}
#pause{
	position: absolute;
	top: -35px;
	left: 45%;
}
#pause img{
	width: 64px;
	height: 50px;
}

</style>
<div class="gallery-container">
	<div class="contentImages">
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
				<div class="pics" id="slide" style="position:relative; overflow:hidden">
<?php
$kueri = mysqli_query($link, "select * from gallery order by date_add desc");
while ($data = mysqli_fetch_array($kueri)) {

	?>
					<img src="assets/img/gallery/<?php echo $data['img']?>">
<?php
}
?>
</div>
	</div>

</div>
	<div class="contentImagesSmall">
		<div class="splash"><img src=""></div>
				<div>
<?php for ($i = 1; $i <= 153; $i++) {

	?>
					<img src="assets/img/gallery/<?php echo ($i)?>.jpg">
<?php
}
?>
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