<script type="text/javascript">
	$(document).ready(function() { //Ready
		//Timer
			$('.trust-img').cycle({
				fx:'fade',
				rev:true,
				delay:-1000
			});
		//Timer end
	});//End ready
</script>
<style type="text/css">
	.trust-text{
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
	.trust-img{
		text-align: center;
		display: inline-block;
		vertical-align: top;
		zoom: 1; /* Fix for IE7 */
		*display: inline; /* Fix for IE7 */
		width: 35%;
		height: 500px;
	}
</style>
<div class="trust-text">
	<img src="assets/img/web/trust-1.png">
	<p>Trust and Respect are earned.
At i2i we understand this and will always do our very best to ensure your experience with us is thoroughly enjoyable and productive. If you are not satisfied with our products and/or services, please contact me directly and I will make sure the issue is dealt with and meets your standards.

To the right are testimonials and internationally recognized companies that have trusted us with their needs, I sincerely hope we have earned their respect.
<br>
Rey Eser rey@i2icustom.com
	</p>
</div>
<div class="trust-img">
	<?php for ($i=1; $i<=29 ; $i++) { 
		?>
		<img src="assets/img/web/Trust - <?php echo($i) ?>.png">
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