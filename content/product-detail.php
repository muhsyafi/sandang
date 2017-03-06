<?php 
$product_detail=$_GET['detail'];
$files1=scandir('assets/img/product/'.$product_detail);
$num_files=count($files1);
$product_item=$_GET['item'];

if ($product_item=='') {
	include('detail-product.php');
}else{
	include ('item-product.php');
}
?>
