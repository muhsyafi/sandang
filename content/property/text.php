<style type="text/css">
	.ui-corner-all{
		border-radius: 0px !important;
	}
	#property-style, input[type=range]{
		display: none;
	}
</style>
<div class="prop-text">
	<div class="prop-curve"><img src="assets/img/web/curve.png"></div>
	<p>Type text</p>
	<textarea id="property-text"></textarea>
	<br>
	<div class="prop-curve"><img src="assets/img/web/curve.png"></div>
	<p>Font</p>
	<select id="property-font">
		<option value="times new rowman">Times New Rowman</option>
		<option value="arial">Arial</option>
		<option value="calibri">Calibri</option>
		<option value="courier">Courier</option>
		<option value="helvetica">Helvetica</option>
		<option value="impact">Impact</option>
		<option value="lucida console">Lucida Console</option>
		<option value="stencil">Stencil</option>
		<option value="tahoma">Tahoma</option>
		<option value="verdana">Verdana</option>
	</select>
	<div class="prop-curve"><img src="assets/img/web/curve.png"></div>
<!--	<div id="slider"><p>Spacing : </p><input type="range" min="1" max="10" value="1" id="slider-spacing"></input></div>
	<div class="prop-curve"><img src="assets/img/web/curve.png"></div> -->
	<div id="slider"><p>Stroke : </p><input type="range" min="1" max="5" value="1" id="slider-stroke"></input></div>
	<input type="text" id="prop-color-stroke"></input>
	<br>
<!--	<div class="prop-curve"><img src="assets/img/web/curve.png"></div> -->
<!--	<p>Style</p> -->
	<select id="property-style">
		<option selected>Choose Style</option>
		<option value="cyrcle">Cyrcle</option>
		<option value="rotate">Rotate</option>
	</select>
	<div class="prop-curve"><img src="assets/img/web/curve.png"></div>
	<div class="prop-efect">
		<input type="button" name="" value="Efek" id="prop-efect">
	</div>
	<div class="prop-curve"><img src="assets/img/web/curve.png"></div>
	<p>Pattern</p>
	<div id="text-pattern">
		<?php 
		for ($i=1; $i <=6 ; $i++) { 
			echo '<div id="'.$i.'" class="div-pattern" style="background: url(\'assets/img/pattern/'.$i.'.jpg\')"></div>';
		}
		?>
	</div>
	<div class="prop-curve"><img src="assets/img/web/curve.png"></div>
</div>
<script>
	$(document).ready(function() {//Ready
	//Font
	_f=$('#property-font');
	_fl=_f.children().length;
	for (var i=0; i<_fl ;i++) {
		val=_f.find('option').eq(i).val();
		_f.find('option').eq(i).css({
			'font-family': val
		});
	}
	//End font
	});//End ready
</script>