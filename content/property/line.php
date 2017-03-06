<style type="text/css">
	.ui-corner-all{
		border-radius: 0px !important;
	}
	#property-style{
		display: none;
	}
</style>
<div class="prop-text">
	<div class="prop-curve"><img src="assets/img/web/curve.png"></div>
	<p>Line Color</p>
	<input type="text" id="property-line-color">
	<br>
	<div class="prop-curve"><img src="assets/img/web/curve.png"></div>
	<div id="slider"><p>Line Size : </p><input type="range" min="1" max="20" value="1" id="slider-line"></input></div>
	<br>
	<div class="prop-curve"><img src="assets/img/web/curve.png"></div>
	<p>Line Style</p>
	<select id="property-line-brush">
		<option value="Pencil" >Pencil</option>
		<option value="Circle" >Circle</option>
		<option value="Spray" >Spray</option>
		<option value="hLinePatternBrush" >Hline</option>
		<option value="vLinePatternBrush" >Vline</option>
		<option value="squarePatternBrush" >Square</option>
		<option value="diamondPatternBrush" >Diamond</option>
	</select>
</div>