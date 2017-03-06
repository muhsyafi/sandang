<div style="padding-left:20px;">
<?php 
$kueri = mysqli_query($link,"select * from faq where id='$product'");
while ($data=mysqli_fetch_array($kueri)) {
?>

	<h1 align="left"><?php echo(strtoupper($data['title'])) ?></h1>
	<p align="left" style="font-size:20px"><?php echo(nl2br($data['content'])) ?></p>

<?php } ?>
</div>