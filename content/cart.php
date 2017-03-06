<?php
	session_start();
	$random = rand(0,1000000000);
	$_SESSION['random']=$random;
?>
 <div class="shop-wrapper">
 	<div class="shop-wrapper-1">
 		<div class="sw1-1 inline abs full-h rel"><a href="#" id="shop-prev" class="btn full-h full-w"><div>PREVIOUS</div></a></div>
 		<div class="sw1-2 inline abs full-h rel">
 			<div class="prog-wrapper bord">
 				<div class="proggres"></div>
 			</div>
 			<div class="bread-wrapper">
 				<div class="bread bord inline abu"><div>1</div></div>
 				<div class="bread bord inline"><div>2</div></div>
 				<div class="bread bord inline"><div>3</div></div>
 				<div class="bread bord inline"><div>4</div></div>
 				<div class="bread bord inline"><div>5</div></div>
 				<div class="bread bord inline"><div>6</div></div>
 				<div class="bread bord inline custom"><div>7</div></div>
 			</div>
 		</div>
 		<div class="sw1-3 inline abs full-h rel"><a href="#" id="shop-next" class="btn full-h full-w"><div>NEXT</div></a></div>
 	</div>
 	<div class="shop-wrapper-2">
 		<div class="shop-image inline full-h abs"></div>
 		<div class="shop-wrapper-2-content inline full-h"></div>
 	</div>
 	<div class="shop-wrapper-3">
 		<div class="inline full-h rel sw3-1"><div class="rg rel tab full-h full-w"><h1 class="tabc">TOTAL: $</h1></div></div>
 		<div class="inline full-h rel sw3-2"><div class="rel tab full-w full-h"><h1 class="tabc price">0</h1></div></div>
 		<div class="inline full-h rel sw3-3 fright"><a href="#" id="btn-cart" class="btn btn-cart full-w full-h no"><div>ADD TO CART</div></a></div>
 	</div>
 </div>