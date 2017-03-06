<?php 
error_reporting(E_ALL);
require_once("pdf/dompdf_config.inc.php");
$message ='
<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css">
	.bord{border:2px solid white;}
	.vam{vertical-align:middle;}
	.right{text-align:right;}
	.full-w{width:100%;}
	.table-1 td:nth-child(2n+2){width:35%;height:20px;padding:2px;border:2px solid black;}
	.rel{position:relative;}
	.divc{margin:0px auto;}
	.ce{text-align:center;}
	.wauto{width:auto;}
	body{margin:0px;padding:0px;}

	.table-1 label{width:100%;display:inline;height:100%;}
	.table-0 td{height:50px;width:auto;}
	.table-0 td:nth-child(0){width:60px;}
	.wrapper{width:21.5cm;}
	.header{background-color:#999999;}

</style>
</head>
<body>
<div class="full-w rel wrapper">
	<div class="full-w header">
		<table class="table-0" border="0" cellspacing="0" cellpadding="0" width="100%">
			<tr>
				<td><img width="60px" height="50px" src="../../assets/img/web/logo.png" /></td>
				<td>ORDER FORM #:</td>
				<td>ORDER DATE:</td>
				<td>DATE REQUIRED:</td>
			</tr>
		</table>
	</div>
	<table width="100%" class="table-1 rel" cellpadding="0" cellspacing="0" border="0">
		<tr><td class="vam right">Apparel Type:</td><td class="vam"><label class="bord"></label></td><td class="vam right">Shipping Method:</td><td><label class="bord"></label></td></tr>	
		<tr><td class="vam right">Available Options:</td><td class="vam"><label class="bord"></label></td><td rowspan="7" class="vam right">Client Notes:</td><td><label class="bord"></label></td></tr>
		<tr><td class="vam right">Fabric:</td><td class="vam"><label class="bord"></label></td></tr>
		<tr><td class="vam right">Contact Name:</td><td class="vam"><label class="bord"></label></td></tr>
		<tr><td class="vam right">Phonbe Number:</td><td class="vam"><label class="bord"></label></td></tr>
		<tr><td class="vam right">Email Address:</td><td class="vam"><label class="bord"></label></td></tr>
		<tr><td class="vam right">Team Name:</td><td class="vam"><label class="bord"></label></td></tr>
		<tr><td class="vam right">Sport:</td><td class="vam"><label class="bord"></label></td></tr>
		<tr><td class="vam right">Adress:</td><td class="vam"><label class="bord"></label></td></tr>
	</table>
</div>
<div></div>
</body></html>

