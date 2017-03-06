<script type="text/javascript">
	$(document).ready(function() { //Ready
		//Timer
			$('.toronto-img').cycle({
				fx:'fade',
				rev:true,
				delay:-1000
			});
		//Timer end
	});//End ready
</script>
<style type="text/css">
	.toronto-text{
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
	.toronto-img{
		text-align: center;
		display: inline-block;
		vertical-align: top;
		zoom: 1; /* Fix for IE7 */
		*display: inline; /* Fix for IE7 */
		width: 35%;
		height: 500px;
	}
</style>
<div class="toronto-text">
	<br>
	<br>
	<img src="assets/img/web/toronto-1.png">
	<p>
	Every job has some special perks, this happens to be one of them lol. We are the "Official Supplier" to the Toronto Argos Cheerleaders. Our local football team. They have chosen our company because of our product, service and dedication.
	<br>
	Official website: www.argonauts.ca	
	</p>
	<img src="assets/img/web/toronto-2.png">
</div>
<div class="toronto-img">
	<?php for ($i=1; $i<=29 ; $i++) { 
		?>
		<img src="assets/img/web/Toronto - <?php echo($i) ?>.png">
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