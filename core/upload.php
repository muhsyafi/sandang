<?php
$nama_file = $_FILES['gambar']['name'];
$status = FALSE;
	if(!empty($_FILES['gambar']['tmp_name']))
	{
		$upload = move_uploaded_file($_FILES['gambar']['tmp_name'], '../assets/img/upload/'.$nama_file);
		if($upload)
		{
			$status = TRUE;
		}
	}
	
if($status==TRUE)
{
 	echo "<input type='hidden' id='design-image-upload' value='assets/img/upload/".$nama_file."'>";
}
else
{
	echo "<h3>Cannot upload your image, please try again</h3>";
}
?>