<?php 
	$product=$_GET['detail'];
	if ($product!='') {
		echo('<style>#product-list-'.$product.'{background-color:#999999}#caqua-'.$product.'{color:white }</style>');
	}
?>
<div class="product-container">
	<table>
		<tr>
			<td class="product-td-list" valign="top">
			<?php $kueri=mysqli_query($link,"select * from category where cat_parent_ID='0'") ;
				while ($data=mysqli_fetch_array($kueri)) {
			?>
				<a id="caqua-<?php echo($data['cat_id']) ?>" class="caqua" href="?menu=product&detail=<?php echo $data['cat_id'] ?>">
				<div class="product-list" id="product-list-<?php echo($data['cat_id']) ?>">
					<span>
						<?php 
						$name=str_replace('_', ' ', $data['cat_name']);
						echo strtoupper($name);
						 ?>
					</span>
				</div>
				</a>
				<?php }?>
			</td>
			<td valign="top">
				<div class="product-img">
					<?php
						if ($product!='') {
							include('content/product-detail.php');
						}else{
							include ('content/product-info.php');
						}
					 ?>
				</div>
			</td>
		</tr>
	</table>
</div>