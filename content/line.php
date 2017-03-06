<script type="text/javascript">
	$(document).ready(function() { //Ready
		//Timer
			$('.line-img').cycle({
				fx:'fade',
				rev:true,
				delay:-1000
			});
		//Timer end
	});//End ready
</script>
<style type="text/css">
	.line-text{
		display: inline-block;
		vertical-align: top;
		zoom: 1; /* Fix for IE7 */
		*display: inline; /* Fix for IE7 */
		text-align: center;
		width: 60%;
		height: auto;
	}
	p{
		line-height: 40px;
		font-size: 30px;
	}
	.line-img{
		text-align: center;
		display: inline-block;
		vertical-align: top;
		zoom: 1; /* Fix for IE7 */
		*display: inline; /* Fix for IE7 */
		width: 35%;
		height: 500px;
	}
</style>
<div class="line-text">
	<img src="assets/img/web/line-1.png">
	<p>Not only can we create almost anything artistically, we can design a garment that is perfect for your application.

So if you require specialized Corporate Wear, Exercise Outfits or even something a little unusual, feel free to contact us.
	</p>
</div>
<div class="line-img">
	<?php for ($i=1; $i<=29 ; $i++) { 
		?>
		<img src="assets/img/web/Custom Line - <?php echo($i) ?>.png">
	<?php } ?>
</div>
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