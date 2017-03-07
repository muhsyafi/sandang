<?php 
ob_start();
error_reporting( error_reporting() & ~E_NOTICE );
date_default_timezone_set('Asia/Jakarta');
include('db.php');
$id = $_GET['id'];
$page = '
<htmlpagefooter name="myHTMLFooterOdd" style="display:none">
<div style="background-color:#999999" align="center"><b>&nbsp;{PAGENO}&nbsp;</b></div>
</htmlpagefooter>
<sethtmlpagefooter name="myHTMLFooterOdd" page="O" value="on" show-this-page="1" />';
$html ='
<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css">
	.bord{border:2px solid #999999;}
	.vam{vertical-align:top;}
	.right{text-align:right;}
	.full-w{width:100%;}
	.table-1 td:{}
	.rel{position:relative;}
	.divc{margin:0px auto;}
	.ce{text-align:center;}
	.wauto{width:auto;}
	body{margin:0px;padding:0px;}

	.table-1 label{width:100%;display:inline;height:100%;}
	.table-1 td{vertical-align:top;}
	.td1{width:150px;}
	.td2{width:200px;border:2px solid #999999;}
	.table-0 td{height:50px;width:auto;}
	.table-0 td:nth-child(0){width:60px;}
	.wrapper{width:100%;}
	.header{background-color:#999999;}
	.header td{color:white;}
	.table-2 .detail td{height:25px;}
	.table-3 td{vertical-align:top;}

</style>
</head>
<body>
<div class="full-w rel wrapper">
	<div class="full-w header">
		<table class="table-0" border="0" cellspacing="0" cellpadding="0" width="100%">
			<tr>
				<td><img width="60px" height="50px" src="pdf/examples/logo.jpg" /></td>
				<td>ORDER FORM #:</td>
				<td>ORDER DATE : '.date("d.m.y").'</td>
				<td>DATE REQUIRED : '.date("d.m.y").' <sup>**</sup></td>
			</tr>
		</table>
	</div>
	<div style="color:red;">** ORDERS CAN BE DELIVERED WITHIN 7-10 DAYS AS OF APPROVAL AND FULL PAYMENT ARE RECEIVED FOR AN EXTRA $100</div>
	<table width="100%" class="table-1 rel" cellpadding="0" cellspacing="0" border="0">';
$kueri = mysqli_query($link, "select * from order_form where cust_id='$id'");
while ($data = mysqli_fetch_array($kueri)) {
$html.='<tr><td class="vam td1 right">Apparel Type:</td><td class="vam td2"><label class="bord">'.$data["apparel_type"].'</label></td><td class="vam right td1">Shipping Method:</td><td class="td2"><label class="bord">'.$data["ship_method"].'</label></td></tr>	
		<tr><td class="vam td1 right">Available Options:</td><td class="vam td2"><label class="bord">'.$data["available_options"].'</label></td><td rowspan="8" class="vam right td1">Client Notes:</td><td class="td2"  rowspan="8"><label class="bord">'.$data["client_notes"].'</label></td></tr>
		<tr><td class="vam td1 right">Fabric:</td><td class="vam td2"><label class="bord">'.$data["fabric"].'</label></td></tr>
		<tr><td class="vam td1 right">Contact Name:</td><td class="vam td2"><label class="bord">'.$data["contact_name"].'</label></td></tr>
		<tr><td class="vam td1 right">Phonbe Number:</td><td class="vam td2"><label class="bord">'.$data["phone_number"].'</label></td></tr>
		<tr><td class="vam td1 right">Email Address:</td><td class="vam td2"><label class="bord">'.$data["email_address"].'</label></td></tr>
		<tr><td class="vam td1 right">Team Name:</td><td class="vam td2"><label class="bord">'.$data["team_name"].'</label></td></tr>
		<tr><td class="vam td1 right">Sport:</td><td class="vam td2"><label class="bord">'.$data["sport"].'</label></td></tr>
		<tr><td class="vam td1 right">Adress:</td><td class="vam td2"><label class="bord">'.$data["address"].'</label></td></tr>';
	};
$html.='</table>
<div style="color:red;">ROSTER INFORMATION: PLEASE FILL OUT BELOW IN ORDER OF THE SIZES OF THE PLAYERS ( SMALLEST TO LARGEST OR VISE VERSA ).</div>
	<div>
		<table width="100%" class="table-2 rel" cellpadding="0" cellspacing="0" border="0">
			<tr>
				<td></td>
				<td class="">Name</td>
				<td class="">Number</td>
				<td class="">Size</td>
				<td class="">Options</td>
				<td class="">Comments</td>
			</tr>';
$numb = 0;
$kueri = mysqli_query($link, "select * from order_detail where cust_id='$id'");
while ($data = mysqli_fetch_array($kueri)) {
		$numb++;
		$html.='<tr class="detail">
				<td align="right">'.$numb.'</td>
				<td class="bord">'.$data["name"].'</td>
				<td class="bord">'.$data["number"].'</td>
				<td class="bord">'.$data["size"].'</td>
				<td class="bord">'.$data["options"].'</td>
				<td class="bord">'.$data["comments"].'</td>
			</tr>';
		}
	$html.='</table>
	</div>
<pagebreak />
<div>
	<table class="full-w" width="100%" class="table-3" cellpadding="0" cellspacing="0">';
$kueri = mysqli_query($link, "select * from order_form where cust_id='$id'");
while ($data = mysqli_fetch_array($kueri)) {
	$html.='<tr><td>Artwork</td><td>:</td><td>'.$data["file_link"].'</td></tr>
		<tr><td>House Design</td><td>:</td><td><img width="200px" src="../'.$data["design"].'"></td></tr>
		<tr><td>New Design</td><td>:</td><td>-</td></tr>';
	}
$html.='</table>
</div>
</div>
</body></html>';
//==============================================================
echo $html;
//==============================================================
//==============================================================
//==============================================================
include("pdf/mpdf.php");

$mpdf=new mPDF('as','letter'); 
$mpdf->WriteHTML($page);
$mpdf->WriteHTML($html);

$mpdf->Output('../assets/files/'.$id.'.pdf','F');
header('Location:../assets/files/'.$id.'.pdf');
exit;

