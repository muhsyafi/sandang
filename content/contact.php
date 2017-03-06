
<?php
session_start();
include "captcha/simple-php-captcha.php";
$_SESSION['captcha'] = simple_php_captcha(array(
	'min_length' => 5,
	'max_length' => 5,
	'fonts' => array('fonts/times_new_yorker.ttf'),
	'characters' => 'ABCDEFGHJKLMNPRSTUVWXYZabcdefghjkmnprstuvwxyz23456789',
	'min_font_size' => 28,
	'max_font_size' => 28,
	'color' => '#666',
	'angle_min' => 0,
	'angle_max' => 10,
	'shadow' => true,
	'shadow_color' => '#fff',
	'shadow_offset_x' => -1,
	'shadow_offset_y' => 1
));
?>
<style type="text/css">
	input[type=text]{
		width: 300px;
		font-family: "myFont";
		border: 2px solid #999999;
		padding:5px;
		height: 130%;
		font-size: 18px;
	}
	textarea{
		width: 300px;
		height: 200px;
		padding: 5px;
		margin: 3px 0px 8px 0px;
		font-family: "myFont";
	}
	td{
		height: 40px;
		position: relative;
	}
	#contact-captcha{
		width: 200px;
		font-size: 18px;
	}
	#img-captcha{
		width: 160px;
		position: relative;
		top: -32px;
		left: 210px;
		margin-bottom: -30px;
	}
	#img-captcha img{
		width: 90px;
		height: 32px;
	}
	#contact-ok{
		width: 64px;
	}
	.contact_info{
		position: absolute;
		top:10px;
		left: 110px;
	}
	.email_info,.phone_info{
		position: absolute;
		left: 310;
		top: 10;
		z-index: 9999;
	}
</style>
<input id="cp" type="hidden" value="<?php echo $_SESSION['captcha']['code'];?>">
<table width="100%" class="contact-map">
	<tr>
		<td>
			<iframe width="619" height="410" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.co.in/maps?q=3097-A+Universal+Drive,+Mississauga,Ontario,+Canada+L4X+2E2&amp;oe=utf-8&amp;client=firefox-a&amp;ie=UTF8&amp;hq=&amp;hnear=3097+Universal+Dr,+Mississauga,+Ontario+L4X+2G1,+Canada&amp;t=m&amp;ll=43.636324,-79.569855&amp;spn=0.101875,0.246506&amp;z=12&amp;output=embed"></iframe><br /><small><a href="http://maps.google.co.in/maps?q=3097-A+Universal+Drive,+Mississauga,Ontario,+Canada+L4X+2E2&amp;oe=utf-8&amp;client=firefox-a&amp;ie=UTF8&amp;hq=&amp;hnear=3097+Universal+Dr,+Mississauga,+Ontario+L4X+2G1,+Canada&amp;t=m&amp;ll=43.636324,-79.569855&amp;spn=0.101875,0.246506&amp;z=12&amp;source=embed" style="color:#0000FF;text-align:left"></a></small>
		</td>
		<td width="300px" align="center" valign="top">
		<?php $kueri=mysqli_query($link,"select * from contact_us") ;
				while ($data=mysqli_fetch_array($kueri)) {
			?>
			<h3><?php echo ($data['address']);?></h3>
			<h3>Phone: <?php echo strtoupper($data['phone']);?></h3>
			<h3>Email: <?php echo ($data['email']);?> </h3>
			<?php } ?>
		</td>
	</tr>
</table>
<br>
<br>
<br>
<table class="contact-detail">
	<tr><td colspan="3" align="left">Send us Email</td></tr>
	<tr><td>Your Name*</td><td>:</td><td><input type="text" class="contact-input" id="c_name"></td></tr>
	<tr><td>Email*</td><td>:</td><td><input type="text" class="contact-input" name="c_mail" id="c_mail"><p class="email_info"></p></td></tr>
	<tr><td>Phone Number*</td><td>:</td><td><input type="text" class="contact-input" id="c_phone"><p class="phone_info"></p></td></tr>
	<tr><td>Street Address*</td><td>:</td><td><input type="text" class="contact-input" id="c_address"></td></tr>
	<tr><td>Province/State*</td><td>:</td><td><input type="text" class="contact-input" id="c_state"></td></tr>
	<tr><td>Postal Code/ZIP*</td><td>:</td><td><input type="text" class="contact-input" id="c_post"></td></tr>
	<tr><td>Website</td><td>:</td><td><input type="text" id="c_website"></td></tr>
	<tr><td valign="top">Message*</td><td valign="top">:</td><td><textarea class="contact-area contact-input" id="c_message"></textarea></td></tr>
	<tr><td></td><td></td><td valign="midle"><input type="text" class="contact-input" id="contact-captcha" placeholder="Type the captcha"><div id="img-captcha"><?php echo '<img src="' . str_replace('om.com/html/', '', $_SESSION['captcha']['image_src']) . '" alt="CAPTCHA code">';?></div></td></tr>
	<tr><td></td><td></td><td><input type="checkbox" id="contact-check"> I Agree </td></tr>
	<tr><td></td><td></td><td><a class="btn btn-load" href="#" id="contact-ok"><div>Send Mail</div></a><h3 class="contact_info"></h3></td></tr>
</table>
<br>
<br>
<br>
<br>