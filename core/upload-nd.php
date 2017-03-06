<?php
$nama_file = $_FILES['image-nd']['name'];
$status = FALSE;
	if(!empty($_FILES['image-nd']['tmp_name']))
	{
		$upload = move_uploaded_file($_FILES['image-nd']['tmp_name'], '../assets/img/upload/'.$nama_file);
		if($upload)
		{
			$status = TRUE;
		}
	}
	
if($status==TRUE)
{
 	echo "<input type='hidden' id='order-continue-nd-image-upload' value='assets/img/upload/".$nama_file."'>";
}
else
{
	echo "<h3 style='color:red'>Cannot upload your image, please try again</h3>";
}
?>