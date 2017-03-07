<style type="text/css">
	a{
		position: relative;
		z-index: 11;
	}
	.product-wrapper{
		height: 655px;
		width: 500px;
		z-index: 0;
		overflow: hidden;
		overflow-y:scroll;
	}
	.accordion {
padding:10px;
width: 90%;
position: relative;
margin: 0 auto;
height:auto;
border:#f0f0f0 1px solid;
background: white;
font-family: "myFont";
text-decoration:none;
text-transform:uppercase;
color: #000;
font-size:1em;
text-align: left;
cursor: pointer;
}
.accordion-open {
background:#999999;
color: #fff;
}
.accordion-open span {
display:block;
float:right;
padding:10px;
}
.accordion-open span {
background:url(assets/img/web/minus.png) center center no-repeat;
}
.accordion-close span {
display:block;
float:right;
background:url(assets/img/web/plus.png) center center no-repeat;
padding:10px;
}
div.container {
padding:0;
margin:0;
}
div.content {
margin: 0;
padding:0px;
font-size:.9em;
line-height:1.5em;
font-family:"myFont";
text-align: center;
}
div.content ul, div.content p {
padding:0;
margin:0;
padding:3px;
}
div.content ul li {
list-style-position:inside;
line-height:25px;
}
div.content ul li a {
color:#555555;
}
.arc-content img{
	position: relative;
	margin: 0 auto;
}
.acr-content-wrapper{
	width: 100px;
	height: 128px;
	position: relative;
	display: inline-block;
	vertical-align: top;
	margin: 5px 0px;
	cursor: pointer;
}
.arc-content svg{
	width: 100%;
	height: 100%;
}
.arc-content svg:hover .fil0{
	fill:#999999;
}
</style>
<div class="product-wrapper">
	<?php
	require_once('../../core/db.php');
	$qTitle = mysqli_query($link, "select * from category new where cat_parent_ID=0 order by cat_id asc");
	while ($data=mysqli_fetch_array($qTitle)) {
	?>
	<div class="accordion acr-product" id="<?php echo $data['cat_id']; ?>"><?php echo $data['cat_name']; ?><span></span></div>
	<div class="container">
		<div class="content arc-content">
			<div class="acr-product-svg-<?php echo $data['cat_id']; ?>">
				<img src="assets/img/web/preload.gif">
			</div>
		</div>
	</div>
	<?php
		}
	?>
</div>
<script type="text/javascript">
$(document).ready(function() { //ready
//$('#accordion').accordion({ icons: { "header": "ui-icon-plus", "activeHeader": "ui-icon-minus" } });
$('.accordion').accordion();
	//Load image product
	$('.acr-product').toggle(function() {
		id = $(this).attr('id');
		$.ajax({
			url: 'core/action.php',
			type: 'GET',
			dataType: 'html',
			data: {'act':'get_product','a':id},
		})
		.done(function(data) {
			$('.acr-product-svg-'+id+'').html(data);
		});
	}, function() {
		/* Stuff to do every *even* time the element is clicked */
	});
	
	//End load image
	});//End ready
</script>
<style>
	.fil2{
		fill:white;
	}
</style>