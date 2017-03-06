<?php 
	$product=$_GET['detail'];
	if ($product!='') {
		echo('<style>#product-list-'.$product.'{ background-color:#999999}#caqua-'.$product.'{color:white }</style>');
	}
?>
<div class="product-container">
	<table>
		<tr>
			<td class="product-td-list" valign="top">
			<?php $kueri=mysqli_query($link,"select * from fabric") ;
				while ($data=mysqli_fetch_array($kueri)) {
			?>
				<a id="caqua-<?php echo($data['id']) ?>" class="caqua" href="?menu=fabric&detail=<?php echo $data['id'] ?>">
				<div class="product-list" id="product-list-<?php echo($data['id']) ?>">
					<span>
						<?php echo strtoupper($data['fabric_type']);
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
							include('content/fab-detail.php');
						}
					 ?>
				</div>
			</td>
		</tr>
	</table>
</div>