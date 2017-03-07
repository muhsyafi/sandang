<?php
$id_img = $_GET['id'];
$id_nav = $_GET['nav'];
$id_img_b = ($id_img - 1);
$id_img_n = ($id_img + 1);
include '../core/db.php';
if ($id_nav == 'back') {
	$kueri = mysqli_query($link, 'select * from house_design_img where id=' . $id_img_b . '');
	while ($data = mysqli_fetch_array($kueri)) {
		$img_name = $data['img'];
		$img_name = 'img/house_design/' . $img_name;
		echo ($img_name);
	}
} else if ($id_nav == 'next') {
	$kueri = mysqli_query($link, 'select * from house_design_img where id=' . $id_img_n . '');
	while ($data = mysqli_fetch_array($kueri)) {
		$img_name = $data['img'];
		$img_name = 'img/house_design/' . $img_name;
		echo ($img_name);
	}
}
?>