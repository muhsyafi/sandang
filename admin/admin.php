<?php
session_start();
$user = $_SESSION['user'];
include '../core/db.php';
$user = $_SESSION['user'];
$kueri = mysqli_query($link, "select * from user where username='$user' and status='1'");
$data = mysqli_num_rows($kueri);
if ($data == 0) {
	header('location:../index.php?menu=login');
}
?>
<div id="admin-area">
	<div class="admin-user rel">
		<strong>Change Admin picture</strong><br>
		<div id="upload-content" style="display:none"></div>
		<form name="admin-picture" id="admin-picture" action="../core/upload-admin.php?path=../assets/img/upload/" method="post" enctype="multipart/form-data">
			<input type="file" id="admin-file" name="gambar"><label id="admin-file-label">CHOOSE IMAGE</label>
		</form><br>
		<div class="au-wrapper full-w rel">
			<div class="change-user rel inline full-h mrgr5">
				<strong>Change <?php echo $user;?>&nbsp;password</strong><br>
				<input class="inline mrgb5" placeholder="Password" type="password" id="password"><br>
				<input class="inline mrgb5" placeholder="Type password again" type="password" id="password2"><br>
				<a href="#" class="btn" id="change-password"><div>CHANGE</div></a>
			</div>
			<div class="add-user rel inline full-h bordl pdl5">
				<strong>Add admin acount</strong><br>
				<input type="text" class="txt-create inline" placeholder="Username" id="txt-username"><label class="inline pdt5 no label-username pdl5" style="height:23px"></label><br>
				<input type="password" class="txt-create inline mrgt5" placeholder="Password" id="txt-password"><br>
				<input type="password" class="txt-create inline mrgt5" placeholder="Retype password" id="txt-password2">
				<div class="btn tab mrgt5 cp bordt" id="bt-create"><div class="tabc">CREATE</div></div>
			</div>
		</div>
	</div>
</div> <!-- End area -->

<div id="admin-general" class="rel">
	<strong>Change web title</strong><br>
<?php
$kueri = mysqli_query($link, "select * from cms");
while ($data = mysqli_fetch_array($kueri)) {
	?><strong>"<?php echo $data['title'];?>"</strong><br>
<?php }?>
<input type="text" placeholder="New title" id="web-title"><br><br>
	<a href="#" class="btn" id="change-web-title"><div>Change</div></a>
	<span class="divider"></span>
	<br>
	<strong>Statistics</strong>
	<div class="statistic full-w rel">
		<div class="">
				<label>Daily</label>
				<?php
				$kueri = mysqli_query($link, "select count(*) as total from statistic where date_add>=curdate()");
				while ($data = mysqli_fetch_array($kueri)) {
					?><h1><?php echo $data['total'];?></h1><br>
				<?php }?>
		</div>
		<div class="">
				<label>Monthly</label>
				<?php
				$kueri = mysqli_query($link, "select count(*) as total from statistic WHERE month(date_add) = EXTRACT(month FROM (NOW()))");
				while ($data = mysqli_fetch_array($kueri)) {
					?><h1><?php echo $data['total'];?></h1><br>
				<?php }?>
		</div>
		<div class="">
				<label>Yearly</label>
				<?php
				$kueri = mysqli_query($link, "select count(*) as total from statistic where year(date_add)=year(now())");
				while ($data = mysqli_fetch_array($kueri)) {
					?><h1><?php echo $data['total'];?></h1><br>
				<?php }?>
		</div>
		<div class="">
				<label>Total</label>
				<?php
				$kueri = mysqli_query($link, "select count(*) as total from statistic");
				while ($data = mysqli_fetch_array($kueri)) {
					?><h1><?php echo $data['total'];?></h1><br>
				<?php }?>
		</div>
	</div>
</div> <!-- End general -->

<div id="admin-user">
<strong>User list</strong><br>
<table cellspacing="0" cellspacing="0">
<tr><td>ID</td><td>Name</td><td>Email</td><td colspan="2">Action</td></tr>
<?php
$kueri = mysqli_query($link, "select * from customers order by cust_id asc");
while ($data = mysqli_fetch_array($kueri)) {
	?>
	<tr id="row-<?php echo $data['cust_id'];?>"><td><?php echo $data['cust_id'];?></td><td><?php echo $data['first_name'] . ' ' . $data['last_name'];?></td><td><?php echo $data['email_id'];?></td><td align="center"><a class="user-view btn" href="#" id="<?php echo $data['cust_id'];?>"><div>View</div></a></td><td align="center"><a class="user-delete btn" href="#" id="<?php echo $data['cust_id'];?>"><div>Delete</div></a></td></tr>

<?php }?>
</table>
</div> <!-- End user -->

<div id="admin-order">
<table class="table-order">
	<tr>
		<td>No.</td>
		<td>Customer ID</td>
		<td>Customer Name</td>
		<td>E-Mail Address</td>
		<td>Action</td>
	</tr>
	<?php
$kueri = mysqli_query($link, "select * from order_form  order by id desc");
$no=0;
while ($data = mysqli_fetch_array($kueri)) {
	$no++;
	?>
	<tr>
		<td><?php echo $no;?></td>
		<td><?php echo $data['cust_id'];?></td>
		<td><?php echo $data['contact_name'];?></td>
		<td><?php echo $data['email_address'];?></td>
		<td><a href="../core/pdf.php?id=<?php echo $data['cust_id'];?>" title="">View</a></td>
	</tr>
<?php }?>
</table>
</div> <!-- End order -->

<div id="admin-data">
	<strong>Select a product</strong><br>
	<select>
<?php
$kueri = mysqli_query($link, "select * from category_new where cat_parent_ID='0' order by cat_id asc");
while ($data = mysqli_fetch_array($kueri)) {
	?>
	<option value="<?php echo $data['cat_id'];?>" id="<?php echo $data['cat_id'];?>"><?php echo $data['cat_name'];?></option>
<?php }?>
</select>
<br><br>
<table id="data-data">
</table>
</div> <!-- End data -->

<div id="admin-hd">
<div class="hd-add-wrapper full-w">
	<div class="hd-upload ce bord gr rel cp"></div>
</div><br>
<?php
$kueri = mysqli_query($link, "select * from house_design_new order by id asc");
while ($data = mysqli_fetch_array($kueri)) {
	?>
<div class="admin-hd-box inline box-<?php echo $data['id'];?>" id="<?php echo $data['id'];?>" name="<?php echo $data['name'];?>">
	<img class="admin-hd-delete" src="../assets/img/web/cancel.png">
	<a href="#" class="btn"><div>Change</div></a>
	<div class="admin-hd-label"><?php echo $data['name'];?></div>
	<img class="admin-hd-img" src="../assets/img/house_design_small/<?php echo $data['name'] . '/' . $data['img'];?>">
</div>
<?php }?>
</div><!-- End hd -->

<div id="admin-gallery">
	<div class="ag-wrapper cp gr inline rel">
		<form name="ag-picture" id="ag-picture" action="../core/upload-admin.php?path=../assets/img/gallery" method="post" enctype="multipart/form-data">
			<input type="file" id="ag-file" name="gambar"><label id="ag-label" class="abs absc"></label>
		</form><br>
	</div><div class="inline rel pd5">
		<strong style="font-size:30px;">Attention</strong><br>
		<label>Image resolution must be (900 x 550)px</label>
	</div>
	<br>
<div class="ag-all">
<?php
$kueri = mysqli_query($link, "select * from gallery order by date_add desc limit 0,15");
while ($data = mysqli_fetch_array($kueri)) {
	?>
<div class="gallery-wrapper bord rel inline mrg5" id="<?php echo $data['id'];?>">
<img class="ag-delete cp abs" src="../assets/img/web/cancel.png">
<img class="ag-content rel full-w full-h" src="../assets/img/gallery/<?php echo $data['img'];?>">
</div>
<?php }?>
</div>
<div class="ag-more cp rel mrgl5 tab"><div class="tabc ce"><?php include '../assets/img/web/button/more.svg';?></div></div>
</div> <!-- End gallery -->

<div id="admin-content"> 
	<strong>Select menu</strong><br>
	<select>
	<option selected>Filter</option>
		<option value="data-fabric" id="">Fabric</option>
		<option value="data-size" id="">Size</option>
		<option value="data-faq" id="">Faq's</option>
		<option value="data-contact" id="">Contact</option>
	</select>
	<br><br>
	<div class="loader"></div>
	<table class="text-content no" id="data-fabric"> <!-- Fabric -->
		<?php 
			$kueri = mysqli_query($link,"select * from fabric_detail order by id asc");
			while ($data = mysqli_fetch_array($kueri)) {
				?>
				<tr class="fabric_detail" id="<?php echo $data['id'];?>"><td class="<?php echo $data['id'];?>"><?php echo $data['id'];?></td><td class="title" align="right"><?php echo $data['title'];?></td><td class="content"><?php echo $data['content'];?></td><td class="compos"><?php echo $data['compos'];?></td><td class="weight"><?php echo $data['weight'];?></td><td class="feel"><?php echo $data['feel'];?></td><td class="durab"><?php echo $data['durab'];?></td><td class="impact"><?php echo $data['impact'];?></td><td class="thick"><?php echo $data['thick'];?></td><td class="breat"><?php echo $data['breat'];?></td></tr>
		<?php	}
		?>
	</table> <!-- End fabric -->
	<table class="text-content no" id="data-size"> <!-- Size -->
	<?php 
		$kueri = mysqli_query($link,"select * from size_text order by id asc");
		while ($data = mysqli_fetch_array($kueri)) {
			?>
			<tr class="size_text" id="1" ><td>Title</td><td>:</td><td class="title" align="right"><?php echo $data['title'];?></td></tr>
			<tr class="size_text" id="1" ><td>Content</td><td>:</td><td style="width:500px;" class="content"><?php echo $data['content'];?></td></tr>
	<?php	}
	?>
	<tr>
		<td colspan="3" class="size-tables">
			<?php 
				$kueri = mysqli_query($link,"select * from size_tables order by id asc");
				while ($data = mysqli_fetch_array($kueri)) { ?>
				<div>
					<?php echo $data['content'];?>
				</div>
				<?php } ?>
		</td>
	</tr>
	</table> <!-- End size -->
	<table class="text-content no" id="data-faq"> <!-- Faq -->
	<?php 
		$kueri = mysqli_query($link,"select * from faq order by id asc");
		while ($data = mysqli_fetch_array($kueri)) {
			?>
			<tr class="faq" id="<?php echo $data['id'];?>"><td class="<?php echo $data['id'];?>"><?php echo $data['id'];?></td><td class="title" align="right"><?php echo $data['title'];?></td><td class="content"><?php echo htmlentities($data['content']);?></td></tr>
	<?php	}
	?>
	</table> <!-- End faq -->
	<table class="text-content no" id="data-contact"> <!-- Contact -->
	<?php 
		$kueri = mysqli_query($link,"select * from contact_us order by id asc");
		while ($data = mysqli_fetch_array($kueri)) {
			?>
			<tr class="contact_us" id="1" ><td>Address</td><td>:</td><td style="width:500px;" class="address" align="right"><?php echo $data['address'];?></td></tr>
			<tr class="contact_us" id="1" ><td>Phone</td><td>:</td><td class="phone"><?php echo $data['phone'];?></td></tr>
			<tr class="contact_us" id="1" ><td>E-mail</td><td>:</td><td class="email"><?php echo $data['email'];?></td></tr>
	<?php	}
	?>
	</table> <!-- End contact -->
</div> <!-- End fabric -->
