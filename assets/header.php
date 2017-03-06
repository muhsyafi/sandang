<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
$kueri = mysqli_query($link, "select * from cms");
while ($data = mysqli_fetch_array($kueri)) {
	?>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="Link" content="http://www.i2icustom.com"/>
<meta name="Description" content="Sublimation Apparel | FASTEST  turnaround for Custom Jerseys | shipped in 15 days or less"/>
<meta name="Keywords" content="<?php echo $data['keyword']?>"/>
  <title><?php echo $data['title']?></title>
<?php }?>
  <link rel='stylesheet' href='assets/css/main.css' />
    <link rel="stylesheet" href="assets/css/tinybox.css" type="text/css">
    <link rel="stylesheet" href="assets/css/roundabout.css" type="text/css">
    <link rel="stylesheet" href="assets/css/animate.min.css" type="text/css">
  <script src="assets/js/jquery.js"></script>
  <script type="text/javascript" src="assets/js/jquery.ui.min.js"></script>
</head>