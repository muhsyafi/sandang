<?php 
$id = $_GET['id'];
$to = $_GET['mail'];
$mail=	'<style>
			.container{
				width:900px;margin:0px auto;
				height:300;
				text-align:center;
				border:2px solid #999999;
				background-color:grey;
			}
			img{
				margin:50px 0px 50px 0px;
			}
			.btn{
				line-height:30px;
				display:block;
				margin:0px auto;
				text-decoration:none;
				color:black;
				width:250px;
				text-transform:uppercase;
				height:32px;
				background-color:#999999;
			}
			.btn:hover{
				color:white;
			}
		</style>
		<div class="container">
		<img src="http://www.i2icustom.com/assets/logo.png">
		<a class="btn" href="http://www.i2icustom.com/beta/core/pdf.php?id='.$id.'">Click to download form</a>
		</div>';

echo $mail;
$subject = 'Download Form';
$headers = 'From: sales@i2icustom.com' . "\r\n" .
		   'Content-type: text/html';
$masuk=mail($to, $subject, $mail, $headers);
if ($masuk) {
	echo "1";
}else{
	echo "0";
}