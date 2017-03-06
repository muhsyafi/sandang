<?php require_once('core/con.php'); 
$header_menu=$_GET['menu'];
if ($header_menu!='') {
	echo('<style>#'.$header_menu.'{color:black}</style>');
}else{
	echo('<style>#home{color:#black}</style>');
}
?>
<div class="menu-primary">
<div class="small">
	<div class="menu-logo">
	<a href="index.php">
		<img src="assets/img/web/logo.png" width="70px">
	</a>
	<h1>i2iCUSTOM</h1>
</div>
<div class="menu-caret">
	<a href="#" class=""><img src="assets/img/web/menu-caret.png"></a>
</div>
<ul>
		<?php 
			$kueri=mysqli_query($link,"select * from menu where status='1' order by id asc");
			while ($data=mysqli_fetch_array($kueri)) {
		 ?>
			<li id="td-<?php echo $data['menu_id'] ?>">
				<a id="<?php echo $data['menu_id'] ?>" href="<?php echo $data['url'] ?>">
				<?php echo $data['name']; ?>
				</a>
			</li>
		<?php } ?>
		</ul>
</div>
<div class="normal">
	<table>
		<tr>
		<td style="text-align:left; width:120px; ">
			<a href="index.php">
				<img src="assets/img/web/logo.png" width="70px">
			</a>
		</td>
		<?php 
			$kueri=mysqli_query($link,"select * from menu where status='1' order by id asc");
			while ($data=mysqli_fetch_array($kueri)) {
		 ?>
			<td id="td-<?php echo $data['menu_id'] ?>">
				<a id="<?php echo $data['menu_id'] ?>" href="<?php echo $data['url'] ?>">
				<?php echo $data['name']; ?>
				</a>
			</td>
		<?php } ?>
		</tr>
	</table>
</div>
</div>