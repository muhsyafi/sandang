<?php
	include '../core/con.php';
	$id=$_GET['id']; 
	$kueri = mysqli_query($link,"select * from custom_products where id='$id'");
	while ($data=mysqli_fetch_array($kueri)) {
?>
<h1 align="center"><?php echo($data['title']) ?></h1>
<p class="content" style=""><?php echo(nl2br($data['content'])) ?></p>
<?php } ?>