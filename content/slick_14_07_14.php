	<link rel="stylesheet" type="text/css" href="assets/css/owl.carousel.css"/>
	<link rel="stylesheet" type="text/css" href="assets/css/theme.owl.carousel.css">
	<script>
$(document).ready(function() {
	var caro=$('#owl-demo');

	caro.owlCarousel({
	loop:true,
    items:7,
    center:true,
    	});

	$('.item a').click(function(event) {
		id=$(this).attr('class');
		caro.trigger('to.owl.carousel', id-2);
		$('.item a').removeClass('tengah');
		$(this).addClass('tengah');
		return false;
	});

	});
	</script>
	<style type="text/css">
	.content{
		width: 900px;
		margin: 0 auto;
	}
	.item{
		  text-transform: uppercase;
		  padding: 10px 0px;
		  margin: 5px;
		  color: #FFF;
		  text-align: center;
		  font-size: 14px;
		}
	.tengah{
		display: block;
		width: 100px;
		padding: 10px;
		top: -15px;
		left: -15px;
		position: relative;
		background-color:blue; 
		font-size: 25px !important;
		border: 1px solid black;
	}
	</style>
			<div class="content">
				<div id="owl-demo" class="owl-carousel owl-theme">
				<?php 
				$kueri=mysqli_query($link,"select * from category_new where cat_parent_ID='0'");
				while($data=mysqli_fetch_array($kueri)) { 
					?>
					<div class="item"><h4><a class="<?php echo $data['cat_id'] ?>" href="#"><?php echo $data['cat_name'] ?></a></h4></div>
				<?php } ?>
				</div>
				
			</div>
<script type="text/javascript" src="assets/js/owl.carousel.js"></script>