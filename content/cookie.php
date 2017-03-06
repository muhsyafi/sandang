<?php 
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
$cookie_no=$_GET['order-no-cookie'];
$act=$_GET['act'];
$user_id=$_GET['user-id'];
if ($act=='set-no') {
	setcookie('order-no-cookie','30',time()+3600);
	echo $_COOKIE['order-no-cookie'];
};
if($act=='set-user-id') {
	setcookie('user_id',$user_id,time()+3600);
}
if ($act=='get-user-id') {
	echo $_COOKIE['user_id'];
}

 ?>