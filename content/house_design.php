<script type="text/javascript">
	$(document).ready(function() { //Ready
//Load Img
	a=25;
	$('#btn-load').click(function(event) {
		$.ajax({
			url: 'content/load-img.php',
			type: 'GET',
			dataType: 'html',
			data: {'start': a}
		})
		.done(function(data) {
			$('.house-design-container').append(data);
			$('.house-design-container-small').append(data);
			a=(a+20);
			$('html,body').animate({
				scrollTop:$('#btn-load').offset().top
			}, 1500, 'easeInOutExpo');
		});
		return false;
	});
//end load imd

	});//End ready
</script>
<div class="house-design-container">
<?php
$kueri = mysqli_query($link, "select * from house_design_new order by id asc limit 0,25");
while ($data = mysqli_fetch_array($kueri)) {
	?>

 	<a href="#" class="hd-img" id="<?php echo ($data['id'])?>">
	<div class="house-design-img-wrapper">
		<div class="house-design-img">
			<img width="60px" height="100px"  src="assets/img/house_design_small/<?php echo ($data['name'] . '/' . $data['img'])?>">
		</div>
		<div class="house-design-text">
			<p><?php echo ($data['name'])?></p>
		</div>
	</div>
	</a>
<?php }?>
</div>
<div style="margin:0px auto; width:100px; text-align:center">
	<a href="#" class="btn tab btn-load" id="btn-load"><div class="tabc full-w full-h"><?php include 'assets/img/web/button/more.svg';?></div></a>
</div>
<br>
<br>
<br>
<br>
