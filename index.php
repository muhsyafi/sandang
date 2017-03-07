Fƒ<html>
<?php
error_reporting(E_ALL^(E_NOTICE|E_WARNING));
require_once 'core/db.php';
include 'assets/header.php';
$menu = $_GET['menu'];
?>
<body>
<div class="frame-wrapper fix full-w full-h no _99 rgba5">
	<div class="frame-content abs absc">
<?php include 'content/dialog-design.php';?>
</div>
</div>
	<div class="primary-menu">
<?php include 'assets/menu.php'
?>
</div>
	<div class="primary-container">
		<div class="primary-wrapper">
<?php

if ($menu != '') {
	include 'content/' . $menu . '.php';
} else if ($menu == 'home') {
	include 'content/' . $menu . '.php';
} else {
	include 'content/home.php';
}

?>
</div>
	</div>
	<div class="primary-footer">
<?php include 'assets/footer.php'?>
	</div>
</body>
</html>