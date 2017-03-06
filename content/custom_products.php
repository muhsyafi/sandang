<style type="text/css">
	.content table{
		font-size: 20px;
	}
	.content{
		font-size: 20px;
	}
	p table td{
		height: 32px;
	}
	.page{
		display:inline-block;
	}
	.page a{
		display: inline-block;
		vertical-align: middle;
		zoom: 1; /* Fix for IE7 */
		*display: inline; /* Fix for IE7 */
		width: 32px;
		text-align: center;
		padding-bottom: 0px;
	}
	#custom-content{
		height: 600px;
	}
	.putih{
		color: white;
	}
	h1{
		margin-bottom:0px; margin-top:-20px;
	}
</style>
<div id="custom-content">
<?php
	$id=$_GET['id']; 
	$kueri = mysqli_query($link,"select * from custom_products where id='$id'");
	while ($data=mysqli_fetch_array($kueri)) {
?>
<h1 align="center"><?php echo($data['title']) ?></h1>
<p class="content" style=""><?php echo(nl2br($data['content'])) ?></p>
<?php } ?>
</div>
<br>
<br>
<br>
<br>
<div class="page">
	<a href="#" id="1" class="btn putih">1</a>
	<a href="#" id="2" class="btn">2</a>
	<a href="#" id="3" class="btn">3</a>
	<a href="#" id="4" class="btn">4</a>
	<a href="#" id="5" class="btn">5</a>
	<a href="#" id="6" class="btn">6</a>
	<a href="#" id="7" class="btn">7</a>
	<a href="#" id="8" class="btn">8</a>
</div>
<script>
	$(document).ready(function() {//Ready
		$('.btn').click(function(event) {//Load
			/* Act on the event */
			id=$(this).attr('id');
			$.ajax({
				url: 'content/custom_products_load.php',
				type: 'GET',
				dataType: 'html',
				data: {id: id}
			})
			.done(function(data) {
				$('#custom-content').html(data);
				$('.btn').removeClass('putih');
				$('#'+id).addClass('putih');
			});
			return false;
		});//end load
	});//End ready
</script>