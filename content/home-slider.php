<?php
include '../core/con.php';
$id=$_GET['id'];
 ?>
 <script type="text/javascript">
$(document).ready(function() {
	$('svg').hover(function() {
		cls=$(this).find('.fil0');
		cls.css('fill', '#999999');
	}, function() {
		cls.css('fill', 'white');
	});
});
 </script>
 <style type="text/css">
 .fil1{
 	fill:black !important;
 }
 .fil2{
 	fill:white !important;
 }
 </style>
<div class="slide-content">
<div class="tooltip"></div>
<?php 
						$kueri=mysqli_query($link, "select * from category_new where cat_parent_id='$id'");
						while ($data=mysqli_fetch_array($kueri)) {
							?>
							<div class="img-slide"><a href="?menu=product&detail=<?php echo($data['cat_parent_ID'])?>&item=<?php echo(str_replace('_', ' ',$data['cat_id'])) ?>"><div><?php include("../assets/img/home-product/".$data['path']."/".$data['cat_image'].".svg");?></div><h4 class="title-thumb"><?php echo $data['cat_name'] ?></h4></a></div>
					<?php
						} ?>
</div>
	