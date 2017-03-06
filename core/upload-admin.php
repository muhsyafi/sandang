<?php
error_reporting(E_ALL & ~E_NOTICE);
$path = $_GET['path'];
$nama_file = $_FILES['gambar']['name'];
$status = FALSE;
if (!empty($_FILES['gambar']['tmp_name'])) {
	if (!file_exists($path)) {
		mkdir($path);
	}
	$upload = move_uploaded_file($_FILES['gambar']['tmp_name'], $path . '/' . $nama_file);
	if ($upload) {
		echo $path . '/' . $nama_file;
	}else{
		echo "0";
	}
}
?>