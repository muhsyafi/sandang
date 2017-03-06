<?php
require_once '../core/con.php';
?>
<div id="1" class="sw2-child">
	<div class="inline full-h sw2-child-1"></div>
	<div class="inline rel full-h sw2-child-2 bord">
		<div class="sw2c-tittle full-w rel abu tab"><div class="tabc ce">Select Product</div></div>
		<div class="sw2c-content ovh full-w rel"><div class="full-h abs ovs full-w120 full-h120">
<?php
$kueri = mysqli_query($link, "select * from category_new where cat_parent_ID=0 order by cat_name");
while ($data = mysqli_fetch_array($kueri)) {
	echo "<div class='full-w rel cat tab' ident='" . $data['cat_id'] . "' name='" . $data['cat_name'] . "'><div class='tabc pd5l cp trans hvb'>" . $data['cat_name'] . "</div></div>";
}
?>
			</div>
		</div>
	</div>
	<div class="inline full-h sw2-child-3 bord pd5">
		<p>Sublimation Apparel | FASTEST turnaround for Custom fabrics adrenaline Jerseys | shipped in 15 days or less</p>
	</div>
</div>

<div id="2" class="sw2-child">
	<div class="inline full-h sw2-child-1"></div>
	<div class="inline full-h sw2-child-2 bord">
		<div class="sw2c-tittle full-w rel abu tab"><div class="tabc ce tittle-two up"></div></div>
		<div class="sw2c-content ovh full-w rel"><div class="full-h abs ovs full-w120 full-h120 list">

			</div>
		</div>
	</div>
	<div class="inline full-h sw2-child-3"></div>
</div>

<div id="3" class="sw2-child">
	<div class="inline full-h sw2-child-1"></div>
	<div class="inline full-h sw2-child-2 bord">
		<div class="sw2c-tittle full-w rel abu tab"><div class="tabc ce tittle-three up"></div></div>
		<div class="sw2c-content three ovh full-w rel"><div class="full-h abs ovs full-w120 full-h120 list">

			</div>
		</div>
	</div>
	<div class="inline full-h sw2-child-3"></div>
</div>


<div id="4" class="sw2-child">
	<div class="inline full-h sw2-child-1"></div>
	<div class="inline full-h sw2-child-2 bord">
		<div class="sw2c-tittle full-w rel abu tab"><div class="tabc ce tittle-four up"></div></div>
		<div class="sw2c-content four ovh full-w rel"><div class="full-h abs ovs full-w120 full-h120 list">

			</div>
		</div>
	</div>
	<div class="inline full-h sw2-child-3"></div>
</div>


<div id="5" class="sw2-child">
	<div class="inline full-h sw2-child-1"></div>
	<div class="inline full-h sw2-child-2 bord">
		<div class="sw2c-tittle full-w rel abu tab"><div class="tabc ce tittle-five up"></div></div>
		<div class="sw2c-content five ovh full-w rel"><div class="full-h abs ovs full-w120 full-h120 list">

			</div>
		</div>
	</div>
<!--	<div class="inline full-h sw2-child-3 bord"></div> -->
</div>