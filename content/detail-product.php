<style type="text/css">
	.product-detail-img{
		position: relative;
		left: 20px;
		text-align: center;
	}
	.product-detail{
		background-color: blue;
		color: #999999;
		display: inline-block;
		text-align: center;
		margin-top: -10px;
		margin-right: 0px;
		margin-bottom: 70px;
		width: 170px;
		height: 121px;
		background: url('assets/img/web/brackets.gif') no-repeat;
		position: relative;
	}

	.product-detail-text{
		position: relative;
		left: 100px;
	
	}
	.product-detail .buy{
		position: absolute;
		bottom: 20;left: 10;
		display: none;
	}
	.product-detail .design{
		position: absolute;
		bottom: 20;right: 10;
		display: none;
	}
	.product-detail:hover  .design, .product-detail:hover  .buy {
		display: block;
	}

</style>
<div class="product-detail-img">
	<?php
		$kueri=mysqli_query($link,"select * from category_new where cat_parent_id='$product_detail'");
		while ( $data=mysqli_fetch_array($kueri)) {
	 ?>
	<div class="product-detail" id="<?php echo($data['cat_id'])?>">
		<a id="product-a" href="?menu=product&detail=<?php echo($data['cat_parent_ID'])?>&item=<?php echo(str_replace('_', ' ',$data['cat_id'])) ?>">
			<input type="hidden" class="path" value="<?php echo($data['cat_id']) ?>">
			<div class="img-bg" style="width: 110px;height: 130px;margin-left: 30px;" svg="<?php echo("assets/img/home-product/".$data['path']."/".$data['cat_image'].".svg") ?>">
				<?php include("assets/img/home-product/".$data['path']."/".$data['cat_image'].".svg");?>
			</div>
			
		</a>
		<p><?php echo(strtoupper($data['cat_name']))?></p>
		<a href="#" title="Buy this product"><img src="assets/img/web/buy.png" class="buy" width="32px"></a>
		<a href="?menu=design" title="Custom design this product"><img src="assets/img/web/design.png" class="design" width="32px"></a>
	</div>
		<?php
		 } ?>
</div>
<script type="text/javascript">
$(document).ready(function() { //Ready
	$('svg').hover(function() {
		cls=$(this).find('.fil0');
		cls.css('fill', '#999999');
	}, function() {
		cls.css('fill', 'white');
	});

	//Send data to design
	$('.design').click(function(){
		var svg = $(this).parents('.product-detail').find('.img-bg').attr('svg');
		alert(svg);
	});
	//End send
}); //End ready
</script>