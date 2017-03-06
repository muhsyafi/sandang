<?php
session_start();
error_reporting(E_ALL^(E_NOTICE|E_WARNING));
include '../core/con.php';
$user = $_SESSION['user'];
$kueri = mysqli_query($link, "select * from user where username='$user' and status='1'");
$data = mysqli_num_rows($kueri);
if ($data == 0) {
	header('location:../index.php?menu=login');
}
?>
<script type="text/javascript" src="../assets/js/jquery.js"></script>
<script type="text/javascript" src="../assets/js/jquery.form.min.js"></script>
<link rel="stylesheet" type="text/css" href="../assets/css/admin.css">
<title>Admin Area</title>
<div class="alert">
	<div class="alert-content-wrapper"><p class="alert-content"></p></div>
	<a href="#" class="btn alert-btn"><div>OKE</div></a>
</div>
<div class="confirm">
	<div class="confirm-content-wrapper"><p class="confirm-content"></p></div>
	<div class="confirm-button">
		<a href="#" class="btn inline confirm-oke"><div>OKE</div></a>
		<a href="#" class="btn inline confirm-cancel"><div>CANCEL</div></a>
	</div>
</div>
<div class="admin-wrapper">
<div class="dialog">
	<div class="dialog-wrapper"></div>
</div>
	<div class="admin-panel inline">
		<div class="admin-dasboard">
<?php $kueri = mysqli_query($link, "select img from cms");
while ($data = mysqli_fetch_array($kueri)) {
	?>
<div class="admin-img-wrapper"><img src="<?php echo $data['img'];?>"><br></div>
<?php }?>
			<strong><?php echo $user;?></strong>
		</div>
		<div class="admin-item">
			<div class="admin-item-menu" data="admin-general" id="item-general">&nbsp;&nbsp;&nbsp;General</div>
			<div class="admin-item-menu" data="admin-user" id="item-user">&nbsp;&nbsp;&nbsp;User</div>
			<div class="admin-item-menu" data="admin-order" id="item-user">&nbsp;&nbsp;&nbsp;Order</div>
			<div class="admin-item-menu" data="admin-data" id="item-data">&nbsp;&nbsp;&nbsp;Data</div>
			<div class="admin-item-menu" data="admin-hd" id="item-data">&nbsp;&nbsp;&nbsp;House Design</div>
			<div class="admin-item-menu" data="admin-gallery" id="item-data">&nbsp;&nbsp;&nbsp;Gallery</div>
			<div class="admin-item-menu" data="admin-content" id="item-content">&nbsp;&nbsp;&nbsp;Text Content</div>
			<div class="admin-item-menu" id="item-logout">&nbsp;&nbsp;&nbsp;Logout</div>
		</div>
	</div>
	<div class="admin-content inline"><div class="content"></div></div>
</div>
<script type="text/javascript" src="../assets/js/admin.js"></script>
<script type="text/javascript" src="../assets/js/jquery.accordion.js"></script>