<?php 
			if ($product_item==188) {
				header('location:index.php');
			}
	$nama=mysqli_query($link,"select * from category_new where cat_id='$product_item'");
	$options=mysqli_query($link,"select * from category_option where cat_id='$product_item'and cat_opt_type='options'");
	$pricing=mysqli_query($link,"select * from category_option where cat_id='$product_item'and cat_opt_type='pricing'");
	$fabric=mysqli_query($link,"select * from category_option where cat_id='$product_item'and cat_opt_type='fabric'");
	$sizes=mysqli_query($link,"select * from category_option where cat_id='$product_item'and cat_opt_type='sizes'");
?>
<style type="text/css">
	.item-container{
		height: 550px;
	}
	.info{
		float: left;
		width: 250px;
		height: 500px;
	}
	.info .isi1{
		width: 170px;
		font-size: 18px;
	}
	.info .isi2{
		width: 50px;
		font-size: 18px;
	}
	.name{
		float: left;
		width: 440px;
		height: 500px;
	}
	h1{
		font-size: 18px;
		padding: 0px;
		margin: 0px;
		text-align: center;
	}
	h2{
		font-size: 30px;
		margin: 0px;
		text-align: center;
	}
	.cat td{
		width: 100px;
		text-align: center;
		font-size: 18px;
	}
	.info p{
		margin: 0px;
	}
	.image-detail{
		text-align: center;
	}
	.image-detail img{
		height: 300px;
	}
</style>
<div class="item-container" >
	<div class="info">
		<h1 class="opt">Options</h1>
		<table align="center">
		<?php
			while ($data=mysqli_fetch_array($options)) {
		 ?>
			<tr><td class="isi1"><?php echo($data['cat_opt_name']) ?></td><td class="isi2">$<?php echo($data['price']) ?></td></tr>
			<?php } ?>
		</table>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<h1>Fabric :</h1>
		<?php while ($data=mysqli_fetch_array($fabric)) {
			?>
		<h1><?php echo($data['cat_opt_name']) ?>&nbsp;+&nbsp;$<?php echo($data['price']) ?></h1>
		<?php } ?>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<h1>Available Sizes :</h1>
		<?php while ($data=mysqli_fetch_array($sizes)) {
			?>
		<h1><?php echo($data['cat_opt_name']) ?>&nbsp;+&nbsp;<?php echo($data['size']) ?></h1>
		<?php } ?>

	</div>
	<div class="name">
		<?php while ($data=mysqli_fetch_array($nama)) {
		 ?>
		<h2><?php echo($data['pro_name']) ?></h2>
		<?php } ?>
		<div class="cat">
			<h1>Pricing</h1>
			<table align="center">
			<?php while ($data=mysqli_fetch_array($pricing)) {
				?>
				<tr><td><?php echo($data['cat_opt_name']) ?></td><td>$<?php echo($data['price']) ?></td></tr>
				<?php } ?>
			</table>
		</div>
		<p>&nbsp;</p>
		<div class="image-detail">
			<img src="assets/img/house_design/accused/a.JPG">
		</div>
	</div>
</div>