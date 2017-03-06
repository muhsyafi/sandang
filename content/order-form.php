<div style="height:auto;">
    <div class="order-user">
      <table>
      <tr>
        <td colspan="6" style="text-align:left; color:red">
          ** ORDERS CAN BE DELIVERED WITHIN 7-10 DAYS AS OF APPROVAL AND FULL PAYMENT ARE RECEIVED FOR AN EXTRA $100
        </td>
      </tr>
        <tr>
          <td>
            Apparel Type
          </td>
          <td>:</td>
          <td style="border:2px solid #999999">
            <select class="order-select sel" id="order-select-apparel">
              <option selected>Apparel Type</option>
<?php
$app = mysqli_query($link, "select * from apparel_type order by apparel_type asc");
while ($data = mysqli_fetch_array($app)) {
	echo "<option>$data[1]</option>";
}
?>
</select>
          </td>
          <td>
            Shipping Method
          </td>
          <td>
            :
          </td>
          <td>
            <input id="order-ship" type="text" style="width:400px">
          </td>
        </tr>
        <tr>
          <td>
            Available Options
          </td>
          <td>:</td>
          <td style="border:2px solid #999999">
            <select class="order-select sel" id="order-select-avail">
              <option selected>Available Options</option>
<?php
$app = mysqli_query($link, "select * from available_options order by available_options asc");
while ($data = mysqli_fetch_array($app)) {
	echo "<option>$data[1]</option>";
}
?>
</select>
          </td>

          <td>
            New Client or Repeat
          </td>
          <td>
            :
          </td>
          <td>
            <input id="order-new" type="text" style="width:400px">
          </td>
        </tr>
        <tr>
          <td>
            Fabric
          </td>
          <td>:</td>
          <td style="border:2px solid #999999">
            <select id="order-select-fabric" class="order-select sel">
              <option selected>Fabric</option>
<?php
$app = mysqli_query($link, "select * from fabric order by fabric_type asc");
while ($data = mysqli_fetch_array($app)) {
	echo "<option>$data[1]</option>";
}
?>
</select>
          </td>
          <td valign="top">Sales Dept Notes</td>
          <td valign="top">:</td>
          <td valign="top" rowspan="2">
              <textarea id="order-sales-notes" style="width:400px;"></textarea>
          </td>
        </tr>
        <tr>
          <td>
            Contact Name
          </td>
          <td>:</td>
          <td>
            <input type="text" id="order-name" class="user-teks" style="width:270px">
          </td>
          </tr>
        <tr>
          <td>
            Phone Number
          </td>
          <td>:</td>
          <td>
            <input type="text" id="order-phone" class="user-teks" style="width:270px">
          </td>
          <td valign="top">
            Client Notes
          </td>
          <td valign="top">
            :
          </td>
          <td rowspan="5" valign="top">
           <textarea id="order-client-notes" style="width:400px; height:225px;"></textarea>
          </td>

        </tr>
        <tr>
          <td>
            Email Address
          </td>
          <td>:</td>
          <td>
            <input type="text" id="order-email" class="user-teks" style="width:270px">
          </td>
        </tr>
        <tr>
          <td>
            Team Name
          </td>
          <td>:</td>
          <td>
            <input type="text" id="order-team" class="user-teks" style="width:270px">
          </td>

        </tr>
        <tr>
          <td>
            Sport
          </td>
          <td>:</td>
          <td>
            <input type="text" id="order-sport" class="user-teks" style="width:270px">
          </td>
        </tr>
        <tr>
          <td>
            Address
          </td>
          <td>:</td>
          <td>
            <input type="text" id="order-address" class="user-teks" style="width:270px">
          </td>
        </tr>
      </table>
    </div>
</div>
<div class="order-choose" style="margin-top:0px">
<br>
  <table>
      <tr>
        <td colspan="5" style="text-align:left; color:red">
          ROSTER INFORMATION: PLEASE FILL OUT BELOW IN ORDER OF THE SIZES OF THE PLAYERS ( SMALLEST TO LARGEST OR VISE VERSA ).
        </td>
      </tr>
      <tr>
      <td>No</td><td style="text-align:center">Name</td><td style="text-align:center">Number</td><td style="text-align:center; width:130px;">Sizes</td><td style="text-align:center">Comments</td>
      </tr>
<?php
//if($get==''){
for ($i = 1; $i <= 30; $i++) {

	# code...
	?>
<tr style="vertical-align:top">
        <td class="order-content">
<?php echo ($i)?>
        </td>
          <td class="order-content">
            <input type="text" id="order-name-<?php echo $i?>" class="order-choose-name">
          </td>
          <td class="order-content">
            <input type="text" class="order-number" id="order-number-<?php echo $i?>">
          </td>
          <td style="width:300px;border:2px solid #999999" class="order-content">
            <select class="sel" id="order-select-<?php echo $i?>">
              <option selected>Choose Size</option>
<?php
$kueri = mysqli_query($link, "select * from size order by sizes asc");
	//$data=mysql_fetch_array($kueri);
	while ($hasil = mysqli_fetch_array($kueri)) {
		$x = 1;
		echo "<option id='$x'>$hasil[sizes]</option>";
	}
	?>
            </select>
          </td>
          <td class="order-content">
          <textarea class="order-choose-comment" id="order-comment-<?php echo $i?>"></textarea>
          </td>
        </tr>





<?php }
?>
</table>
</div>
<div>
  <div class="order-more-back">
      <a href="#" id="order-more-btn" class="btn"><?php include 'assets/img/web/button/more.svg'?></a>
      <a href="#" class="btn" id="order-next-btn"><?php include 'assets/img/web/button/continue.svg'?></a>
    </tr>
  </table>
</div>
</div>
