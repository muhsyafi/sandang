<?php
$id_img = $_GET['id'];
include '../core/con.php';
$kueri = mysqli_query($link, 'select * from house_design_img where id=' . $id_img . '');
while ($data = mysqli_fetch_array($kueri)) {
	$img_name = $data['img'];
	$img_name = 'img/house_design/' . $img_name;
}
?>
<script type="text/javascript" src="../assets/js/jquery.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		var id=$('.hd-box').attr('id');
			x=id;
			y=Number(x);
		if (x=='1') {
			$('#box-back').css('display', 'none');
		};
		if (x=='166') {
			$('#box-next').css('display', 'none');
		};
		//Back nav
		$('#box-back').click(function(event) {
			/* Act on the event */
			id_back=$('.hd-box').attr('id');
			$.ajax({
				url: 'house-img-load.php',
				type: 'GET',
				data: {id: id_back,'nav':'back'}
			})
			.done(function(data) {
				$('.img-f').attr('src','../assets/'+data);
				z=--y;
				$('.hd-box').attr('id',z);
				nama=data.substr(17);
				nama = nama.replace('.png','');
				$('#name-img').html(nama.toUpperCase());
				if (z=='1') {
				$('#box-back').fadeOut();
				$('#box-next').fadeIn();
				};
			});

			return false;
		});
		//Back

		//hover nav
		$('.hd-box').hover(function() {
			$('.btn-bk div').fadeIn();
		}, function() {
			$('.btn-bk div').fadeOut();
		});

		$('.hd-box').hover(function() {
			$('.btn-fw div').fadeIn();
		}, function() {
			$('.btn-fw div').fadeOut();
		});
		//End hover
		//Show nav
		$('.hd-box').click(function(event) {
			$('.btn-bk div, .btn-fw div').fadeIn();
		});

		//End show nav
		//Next nav
		$('#box-next').click(function(event) {
			/* Act on the event */
			id_next=$('.hd-box').attr('id');
			$.ajax({
				url: 'house-img-load.php',
				type: 'GET',
				data: {id: id_next,'nav':'next'}
			})
			.done(function(data) {
				$('.img-f').attr('src','../assets/'+data);
				nama=data.substr(17);
				nama = nama.replace('.png','');
				$('#name-img').html(nama.toUpperCase());
				z=++y;
				$('.hd-box').attr('id',z);
				$('#box-back').fadeIn();
			});

			return false;
		});
		//End next
	});
</script>
  <link rel='stylesheet' media='only screen and (min-width: 700px) and (max-width:4000px)' href='../assets/css/main.min.css' />
<!--  <link rel='stylesheet' media='only screen and (min-width: 256px) and (max-width:699px)' href='../assets/css/medium.min.css' /> -->
<div class="hd-box" id="<?php echo ($id_img)?>">
	<table width="100%">
		<tr>
				<a href="" class="btn-bk" id="box-back">
					<div>
						<img width="32px" src="../assets/img/web/bk.png">
					</div>
				</a>
			<td colspan="1" style="padding-left:0px" width="250px">
				<img class="img-f" height="350px" src="../assets/<?php echo ($img_name)?>">
			</td>
				<a href="" class="btn-fw" id="box-next">
					<div>
						<img width="32px" src="../assets/img/web/fw.png">
					</div>
				</a>
		</tr>
		<tr>
			<td colspan="8" align="center" id="name-img">
<?php echo (strtoupper(str_replace('.png', '', str_replace('img/house_design/', '', $img_name))))?>
			</td>
		</tr>
	</table>
</div>