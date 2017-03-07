<?php
error_reporting(E_ALL^(E_NOTICE|E_WARNING));
require_once '../core/db.php';
$no = $_GET['no'];
//setcookie('tes',30,time()+3600);
$x = $_COOKIE['order-no-cookie'];
$x = ++$x;
setcookie('order-no-cookie', $x, time() + 3600);

?>
			<tr style="vertical-align:top;">
			<td class="order-content">
        	<p><?php echo ($x)?></p>
        	</td>
        	<td class="order-content">
        	<input type="text" id="order-name-<?php echo $x?>" class="order-choose-name">
        	</td>
        	<td>
            <input type="text" class="order-number" id="order-number-<?php echo $x?>">
            </td>
            <td style="width:300px; border:2px solid #999999">
            <select class="sel" id="order-select-<?php echo $x?>">
              <option selected>Choose Size</option>
<?php
$kueri = mysqli_query($link, "select * from size order by sizes asc");
//$data=mysql_fetch_array($kueri);
while ($hasil = mysqli_fetch_array($kueri)) {
	echo "<option>$hasil[sizes]</option>";
}
?>
            </select>
            </td>
            <td>
            <textarea class="order-choose-comment" id="order-comment-<?php echo $x?>"></textarea>
            </td>
            </tr>

<?php
?>