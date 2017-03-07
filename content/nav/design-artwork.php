<!--
	<div class="accordion acr-product" id="<?php //echo $data['cat_id']; ?>"><?php //echo $data['cat_name']; ?><span></span></div>
	<div class="container">
		<div class="content arc-content">
			<div class="acr-product-svg-<?php //echo $data['cat_id']; ?>">
				<img src="assets/img/web/preload.gif">
			</div>
		</div>
	</div>
-->

<style type="text/css">
	.artwork-wrapper{
		width: 412px;
		height: 256px;
	}
	.artwork-wrapper img{
		width: 100px;
	}
</style>
<div class="artwork-wrapper">
<?php 
require_once('../../core/db.php');
$kueri=mysqli_query($link,"select * from artwork_new");
while ($data=mysqli_fetch_array($kueri)) {
	?>
	<a class="design-artwork-image-wrapper" href="#" id="<?php echo $data['art_name'] ?>">
 		<img src="<?php echo $data['design']?>" svg="<?php echo $data['design']?>">
	</a>
<?php 
}
?>
</div>
<script>
	$(document).ready(function() {//Ready
	//Load image artwork
	$('.design-artwork-image-wrapper').click(function(event) {
		img=$(this).children('img').attr('src');
		$('#design-artwork #design-artwork-img').attr('src', img).show().removeClass().addClass('animated fadeInDown').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', 
			function(event) {
			$(this).removeClass();
		});
		$('#design-artwork').draggable().fadeIn();
		$('#design-artwork').resizable({
			resize:function(e){
				x=$(e.target).width();
				y=$(e.target).height();
				$(this).children('img').css({
					width: x,
					height: y
				});
			}
		});
		//$('#design-artwork img').resizable();
	});
	//End load image
	//Tooltip
	$(document).tooltip();
	//End tooltip
	});//End ready
</script>