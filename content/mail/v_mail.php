<?php 
require_once("pdf/dompdf_config.inc.php");
//include '../../core/db.php';
$link=mysqli_connect('localhost','root','cintaku','i2icustom');
$kueri = mysqli_query($link,"select * from order_form order by id desc  limit 1");
while ($data=mysqli_fetch_array($kueri)) {
$message ='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
			<html xmlns="http://www.w3.org/1999/xhtml" lang="ro">
<html><head>
<style>
html, body{
	font-family: "i2i" !important;
	font-size:9px !important;
	height: 100%;
	padding: 0px 0px 10px 0px;
	margin: 0px;
}


 .pic a{
	/* Specific styles for the hyperlinks */
	/*text-indent:-999px;*/
	text-align:center;
	color:#000000;
	display:block;
	padding-top:100px;
}
 .pic a:hover{
	color:white;
}
.pic a p, .pic a span {
	font-weight:bold;
	font-size:12px;
	font-family:"myFont";
}


	.home-gallery{
		position: relative;
		margin-top: 20px;
		width: 100%;
		height:90%;
	}
	.home-thumbnail-bottom{
		width: auto;
		height: auto;
		top: -50px;
		position: relative;
	}

select{
	font-family: "myFont";
}
.shadow
{
		box-shadow: 0px 0px 8px 5px grey;
}

.primary-container{
	min-height: 78%;
	margin-top: 98px;
	padding-top: 30px;
	background-color: white;
}
.primary-wrapper{
	width: 900px;
	height: 700px;
	margin: 0 auto;
	background-color: white;
}

.menu-primary img{
	height: auto;
	margin-right: 10px;
}
.menu-primary table{
	width: 100%;
}

.menu-primary td{
	text-align: center;
}

#td-house_design{
	text-align: center;
	width: 100px;
}
.menu-primary a{
	text-decoration: none;
	color: white;
}
.menu-primary a:hover{
	color: black;
}

.double{
	width:8px;
}
.info{
	text-align: center !important;
}
.info div a{
	text-align: center !important;
	width: 64px;
}
.footer-menu{ 
	width: 900px;
	padding-left: 0px;
	margin: 0px auto;
}
.footer-menu-wrapper td{
	width: 45px;
	text-align: center;
}
.product-list{
	padding: 5px 3px 2px 3px;
	margin-top: 1px;
	background-color: white;
}
.caqua{
	text-decoration: none;
	color: grey;
}
.caqua:hover{
		color: white;
}

.product-list{
	width: auto;
	padding-left: 50px;
}
.product-container .product-td-list{
	width: 250px;
	text-align: left;
}
.list-spacer{
	width: 50px;
	height: 32px;
}
.product-container{
	width: 900px;
	position: relative;
	left: -5%;
}
.product-img{
	width: 700px;
	height: auto;
}

.product-detail-img{

}

.product-detail-img-name{

}

.container-order{
	margin: 0 auto;
	padding-top: 20px;
	height:100%;
	text-align: center;
	width: 100%;
	background-color: white;
	color: black;
}
.order-repeat{
	width: 30%;
	margin: 0px auto;
	display: none;
	
}
.nav-img{
	display: none;
	position: relative;
	top: -10px;
	left: 100px;
	z-index: 9;
}
.nav-img td{
	text-align: center;
	width: 64px;
}
.nav-img-name{
	width: 100px;
	height: 16px;
	margin-bottom: 0px;
	margin: 0px auto;
}
.btn-ok{
	top: 0px;
	position: relative;
	width: 32px;
}
.order-menu{
	text-align: center;
	width: 100%;
	height: 700px;
	margin: 0 auto;
}
.order-menu .order-user{
	width: 900px;
	margin: 0 auto;
}

.order-more-back{
	height: 100px;
	width: 900px;
	margin: 0px auto;
}


.btn:hover{
	color: white;
}
.order-select{
	width: 271px;
	position: relative;
	left: 0px
}
.order-choose{
	width: 900px;
	margin: 0px auto;
}
.order-choose table tr td{
	margin:0px;
	vertical-align:top;
	height:6px !important;
}
.order-choose-name{
	width: 100px;
}


.design-thumbnail h1{
	top: -100px;
	position: relative;
}
.design-thumbnail img{
	position: relative;
}

input[type=text]{
	height: 10px !important;
	border: 1px solid #999999;
	font-size: 12px;
	padding: 0px 1px 6px 2px;
	font-family: "myFont";
}
textarea{
	border: 1px solid #999999;
	font-size: 12px;
	font-family: "i2i";
}

.order-choose-comment{
	width:300px;
}

#order-sales-notes{
	margin-top: 0px;
	height: 67px !important;
}
.overflowy{
	overflow-y: hidden;
}
.container-design{
	width: 768px;
	height: 100%;
	margin: 0 auto;
	background-color: white;
	color: black;
}
.design-artwork{
	font-size: 12px;
	margin-bottom: 32px;
}
.design-file-link, .design-house{
	font-size: 12px;
	border: 1px solid grey;
	width: 256px;
	height: 32px;
	padding: 5px 5px 5px 5px;
	margin-bottom: 16px;
}
.design-file-link{
	border: none;
}
.order-content{
	height:20px !important;
}
.img-dropdown{
	text-align: center;
	border: 1px solid grey;
	cursor:pointer;
	width: 255px;
}
.img-dropdown:hover{
	border: 1px solid grey;
	cursor:pointer;
	width: 255px;
}

.btn-nav-img{
	width: 64px;
}
.btn-submit, .btn-back{
	width: 64px;
	text-align: center;
}
.btn-submit{
	float: right;
}
.img-hide{
	display: none;
}
.design-house{
	width: 255px;
	height: 288px;
	overflow: scroll;
	overflow-x: hidden;
	border: 1px solid grey;
}
.img-thumbnail{
	width: 254px;
}
.img-thumbnail:hover{
	border: 1px solid grey;
	cursor:pointer;
}
input[type=text]{
	text-align:left;
}
#design-input-link{
	width: 403px;	
	height: 35px;
	font-size: 12px;
	padding: 2px 2px 2px 2px;
}
.design-image{
	width: 400px;
	height: 400px;
}
.design-thumbnail{
	height: 75%;
	width: 400px;
	border: 1px solid grey;
}
.design-comment{
	margin-top: 32px;
	height: 100px;
	border: 1px solid grey;
}
.design-thumbnail{
	text-align: center;
}
.design-thumbnail img{
	height: 250px;
}
.sel{
	background-color: grey;
	-webkit-appearance: none;
   font-size: 12px;
   border: 1px solid white;
   height: 42px;
   position: relative;
   left:0;
   top: 0;
}

.order-choose input[type=text]{

}
table td{
	font-size:10px;
	padding:-2px 0px 0px 2px;
	text-align:right;
}
.order-user table td>input[type=text]{
	text-align:left;
	margin-left:2px;
	height:8px !important;
	width:180px !important;
}
table tr{
	height:12px !important;
	padding:0px;
}
.design-online{
	margin-top: 375px;
	padding: 5px 5px 5px 5px;
	width: 256px;
	background-color: grey;
	display: none;
}
.design-download{
	margin: 16px 0px 16px 0px;
	padding: 5px 5px 5px 5px;
	width: 256px;
	background-color: grey;
	display: none;
}
.continue{
	text-align: center;
	margin: 16px 0px 16px 0px;
	padding: 5px 5px 5px 5px;
	width: 128px;
	background-color: grey;
}
.header-img{
	width:50px !important;
	height:50px !important;
}
.order-client-notes{
	margin-left:-5px;
}
.pad{
	display:block;
	height:6px;
}
</style>
<style>.order-container{margin:0px auto; width:600px;}.order-choose{width:1000px}#order-form, #order-date, #order-req{width:85px !important; margin-top:-10px}
.order-header-div{color:white; font-size:16px !important; using display:table-cell; vertical-align:middle; font-size:12px; width:80px !important;}.header-left{margin-left:-10px !important}
.order-header input[type=text]{margin-top:0px !important;}
.order-header{width: 800px;height:32px;margin:0px auto;background-color: #999999;}.order-header div{display: inline-block;vertical-align: middle;	zoom: 1;*display: inline; width: 100px;	height: 32px;}.order-end{width:10px !important; color:white}</style>
</head><body>
<div class="order-header"><div class="header-img"><img width="32px" height="32px" src="http://www.i2icustom.com/assets/logo.png"></div><div class="order-header-div header-left">ORDER FORM #:</div><div><input type="text" id="order-form"></div><div class="order-header-div">ORDER DATE:</div><div><input type="text" id="order-date"></div><div class="order-header-div">DATE REQUIRED:</div><div><input type="text" id="order-req"></div><div class="order-end">**</div></div>
<div class="order-container">
	<div class="order-head">
	</div>
	<div class="order-user">
	 <table width="600px" border=0 cellpadding=0 cellspacing=0>
      <tr>
        <td colspan="6" style="text-align:left; color:red">
          ** ORDERS CAN BE DELIVERED WITHIN 7-10 DAYS AS OF APPROVAL AND FULL PAYMENT ARE RECEIVED FOR AN EXTRA $100
        </td>
      </tr>
        <tr>
          <td width="88px">
            Apparel Type
          </td>
          <td>:</td>
          <td>
          	<input type="text" value="'.$data["apparel_type"].'">
          </td>
          <td width="88px">
            Shipping Method
          </td>
          <td class="double">
            :
          </td>
          <td>
            <input id="order-ship" type="text" style="width:400px" value="'.$data["ship_method"].'">
          </td>
        </tr>
        <tr>
          <td width="88px">
            Available Options
          </td>
          <td class="double">:</td>
          <td>
            <input type="text" value="'.$data["available_options"].'">
          </td>
          <td width="88px">
            New Client or Repeat
          </td>
          <td class="double">
            :
          </td>
          <td>
            <input id="order-new" type="text" style="width:400px" value="'.$data["new_client"].'">
          </td>
        </tr>
        <tr>
          <td width="88px">
            Fabric
          </td>
          <td class="double">:</td>
          <td>
          	<input type="text" value="'.$data["fabric"].'">
          </td>
          <td valign="top">Sales Dept Notes</td>
          <td valign="top">:</td>
          <td valign="top" rowspan="2">
              <textarea id="order-sales-notes"  style="width:180px; margin-top:2px; height:30px !important">'.$data["sales_notes"].'</textarea>
          </td>
        </tr>
        <tr>
          <td width="88px">
            Contact Name
          </td>
          <td class="double">:</td>
          <td>
            <input type="text" id="order-name" class="user-teks" style="width:270px" value="'.$data["contact_name"].'">
          </td>
          </tr>
        <tr>
          <td width="88px">
            Phone Number
          </td>
          <td class="double">:</td>
          <td>
            <input type="text" id="order-phone" class="user-teks" style="width:270px" value="'.$data["phone_number"].'">
          </td>
          <td valign="top">
            Client Notes
          </td>
          <td valign="top" class="double">
            :
          </td>
          <td rowspan="5" valign="top" align="left">
           <textarea id="order-client-notes" style="width:180px; margin-top:4px; height:80px;">'.$data["client_notes"].'</textarea>
          </td>
        </tr>
        <tr>
          <td width="88px">
            Email Address
          </td>
          <td class="double">:</td>
          <td>
            <input type="text" id="order-email" class="user-teks" style="width:270px" value="'.$data["email_address"].'">
          </td>
        </tr>
        <tr>
          <td width="88px">
            Team Name
          </td>
          <td class="double">:</td>
          <td>
            <input type="text" id="order-team" class="user-teks" style="width:270px" value="'.$data["team_name"].'">
          </td>
        </tr>
        <tr>
          <td>
            Sport
          </td>
          <td class="double">:</td>
          <td>
            <input type="text" id="order-sport" class="user-teks" style="width:270px" value="'.$data["sport"].'">
          </td>
        </tr>
        <tr>
          <td width="88px" valign="top">
            Address
          </td>
          <td class="double">:</td>
          <td>
            <input type="text" id="order-address" class="user-teks" style="width:270px" value="address">
          </td>
        </tr>
      </table>
	</div>
	<div class="order-detail">
	</div>
</div>
<div class="order-choose" style="margin-top:0px">
<br>
  <table width="600px" cellspacing=0 cellpadding=0>
      <tr>
        <td colspan="5" style="text-align:left; color:red">
          ROSTER INFORMATION: PLEASE FILL OUT BELOW IN ORDER OF THE SIZES OF THE PLAYERS ( SMALLEST TO LARGEST OR VISE VERSA ).
        </td>
      </tr>
      <tr>
      <td>No</td><td style="text-align:center">Name</td><td style="text-align:center">Number</td><td style="text-align:center; width:130px;">Sizes</td><td style="text-align:center">Comments</td>
      </tr>';
      	$sa=substr($data['order_detail'], 14);
		$sa=substr($sa, 0, -1);
		$djson=json_decode($sa);
		$cj=count($djson);
for ($i=1; $i <= $cj; $i++) { 
$message.='<tr style="vertical-align:top;">
      <td class="order-content" style="width:15px">
        '.$i.'
      </td>
        <td class="order-content" style="width:100px">
          <input style="height:8px !important" type="text" class="order-choose-name" value="'.$djson[$i-1]->name.'">
        </td>
        <td class="order-content" style="width:54px">
          <input style="height:8px !important; width:54px !important" type="text" class="order-number" value="'.$djson[$i-1]->no.'">
        </td>
        <td class="order-content" style="width:50px !important; height:20px;">
        <input style="height:8px !important; width:130px !important;" type="text" value="'.$djson[$i-1]->sel.'">
        </td>
        <td style="text-align:left !important;"><div style="margin:2px 0px -2px 0px; height:auto; border:1px solid #999999; width:240px !important; text-align:left; padding:0px 0px 8px 2px;">'.$djson[$i-1]->com.'<span class="pad"></span></div></td>
      </tr>';
 }
 $message.='</table>
</div>
<style type="text/css">
	.artwork-container{
		padding-top:20px;
		width: 800px;
		margin: 0px auto;
		padding-left:20px;
	}
	.artwork-container input[type=text]{
		width:400px;
	}
	.artwork-container td{
		text-align:left !important;
	}
	.artwork-container textarea{
		min-height:100px;
	}
</style>
<div class="artwork-container">
	<table>
		<tr>
			<td width="100px" valign="top">Link Artwork</td>
			<td width="10px" valign="top">:</td>
			<td width="450px"><input style="width:100%" type="text" value=""></td>
		</tr>
		<tr>
			<td width="100px" valign="top">Design</td>
			<td width="10px" valign="top">:</td>
			<td width="200px" style="text-align:center !important" ><img src="img/a.JPG" width="200px"></td>
		</tr>
		<tr>
			<td width="100px" valign="top">Additional Comments</td>
			<td width="10px" valign="top">:</td>
			<td width="450px"><textarea></textarea></td>
		</tr>
	</table>
</div>
</body></html>';
$names=rand(1000,9999);
$mail=	'<style>
			.container{
				width:900px;margin:0px auto;
				height:300;
				text-align:center;
				border:1px solid #999999;
				background-color:grey;
			}
			img{
				margin:50px 0px 50px 0px;
			}
			.btn:hover{
				color:white;
			}
		</style>
		<div class="container">
		<img src="">
		<a class="btn" href="http://www.i2icustom.com/test/order/order_'.$names.'.pdf">Click to download form</a>
		</div>';


$email=$data['email_address'];
$to      = 'muhsyafi@icloud.com';
$subject = 'Test Mail';
$headers = 'From: muhsyafi@i2icustom.com' . "\r\n" .
		   'Content-type: text/html';


echo $message;

$dompdf=new DOMPDF();
$dompdf->set_paper('a4','potrait');
$dompdf->load_html($message);
$dompdf->render();
$outFile=$dompdf->output();
//$dompdf->stream('ok.pdf');
file_put_contents('order/order_'.$names.'.pdf', $outFile);
/*
$masuk=mail($to, $subject, $mail, $headers);
if ($masuk) {
	echo "masuk";
}else{
	echo "Gagal";
} 
*/
ini_set('memory_limit', '-1');
}
?>