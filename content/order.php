<?php
$menu = $_GET['menu'];
$ord_next = $_GET['order'];
?>
<div class="order-container">
<?php
if ($ord_next == 'continue') {
	include 'content/order-continue.php';
} else if ($ord_next == 'submit') {
	include 'content/order-submit.php';
} else if ($menu == 'order') {
	include 'content/order-form.php';
}
?>
</div>
<div class="info" style="display:none" title="Info"></div>

