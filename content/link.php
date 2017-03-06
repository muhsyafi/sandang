<script type="text/javascript">
	$(document).ready(function() {//Ready
		$(document).tooltip();
	});//End ready
</script>
<style type="text/css">
	.link-text{
		display: inlink-block;
		vertical-align: top;
		zoom: 1; /* Fix for IE7 */
		*display: inlink; /* Fix for IE7 */
		text-align: center;
		width: 100%;
		height: auto;
	}
	h2{
		text-align: left;
		margin: 0px;
	}
	.link-img{
		width: 100%;
		height: 80px;
		text-align: left;
	}
	.link-img a{
		display: inline-block;
		vertical-align: top;
		*display: inline; /* Fix for IE7 */
		background-color: #999999;
		border: 1px solid black;
		margin: 0px 5px 0px 5px;
	}
	.link-img a img{
		width: 64px;
		height: 64px;
	}
</style>
<div class="link-text">
<h2>Art</h2>
<div class="link-img">
	<?php $kueri = mysqli_query($link,"select * from link where id_parent='1'");
	while ($data=mysqli_fetch_array($kueri)) {
	?>
	<a href="<?php echo($data['url']) ?>" title="<?php echo($data['title']) ?>">
		<img src="assets/img/web/link/<?php echo($data['img'])?>.png">
	</a>
	<?php } ?>
</div>
<h2>Cool</h2>
<div class="link-img">
	<?php $kueri = mysqli_query($link,"select * from link where id_parent='2'");
	while ($data=mysqli_fetch_array($kueri)) {
	?>
	<a href="<?php echo($data['url']) ?>" title="<?php echo($data['title']) ?>">
		<img src="assets/img/web/link/<?php echo($data['img'])?>.png">
	</a>
	<?php } ?>
</div>
<h2>Sports</h2>
<div class="link-img">
	<?php $kueri = mysqli_query($link,"select * from link where id_parent='3'");
	while ($data=mysqli_fetch_array($kueri)) {
	?>
	<a href="<?php echo($data['url']) ?>" title="<?php echo($data['title']) ?>">
		<img src="assets/img/web/link/<?php echo($data['img'])?>.png">
	</a>
	<?php } ?>
</div></div>
<br>
<br>
<br>
<br>
<div class="home-thumbnail-bottom">
	<table>
		<tr>
			<td><a href="?menu=custom_products&id=1"><img src="assets/img/web/home_page_bot_img_1.jpg"></a></td>
			<td><a href="?menu=toronto"><img src="assets/img/web/home_page_bot_img_2.jpg"></a></td>
			<td><a href="?menu=trust"><img src="assets/img/web/home_page_bot_img_3.jpg"></a></td>
			<td><a href="?menu=line"><img src="assets/img/web/home_page_bot_img_4.jpg"></a></td>
			<td><a href="?menu=link"><img src="assets/img/web/home_page_bot_img_5.jpg"></a></td>
		</tr>
	</table>
</div>