<style type="text/css">
	.house-design-new-container{
		position: relative;
		width: 900px;
		margin: 0 auto;
		height: 100%;
	}
	.hdn-sidebar{
		position: relative;
		display: block;
		width: 20%;
		height: 100%;
		float:left;
		border-top: 1px solid #999999;
		margin-right: 10px;
	}
	.hdn-sidebar a{
		position: relative;
		width: 100%;
		height: 35px;
		text-align: center;
		display: block;
		padding: 10px;
		color: #999999;
		border-bottom: 1px solid #999999;
		border-left: 1px solid #999999;
		border-right: 1px solid #999999;
		transition: all 0.5s ease;
	}
	.hdn-sidebar a:hover{
		color: white;
		background: #999999;
	}
	.hdn-content{
		position: relative;
		display: block;
		float: left;
		width: 78%;
		height: auto;
	}
	.hdn-judul{
		position: relative;
		width: 100%;
		height: 32px;
		color: #999999;
		text-transform: uppercase;
		text-align: center;
		padding-top: 5px;
	}
	.hdn-img-container{
		width:100%;
		height:auto;
		text-align:center;
		margin-bottom:50px;
	}
	.hdn-img-img{
		cursor:pointer;
		margin-bottom:25px;
	}
	.hdn-popup{
		position:absolute;
		width:100%;
		height:100%;
		z-index:999;
		top:0;
		left:0;
		background:white;
	}
	.popup-image{
		position:fixed;
		width:100%;
		height:100%;
		top:0;
		left:0;
		background:white;
	}
	.popup-image div{
		position:absolute;
		z-index:99999;
		bottom:0;top:10%;
		right:0;left:0;
		margin:auto;
		width:100%;
		height:auto;
	}
	.popup-image img{
		position:relative;
		width:100%;
		height:auto;
	}
	.hdn-close{
		position:absolute;
		left:0;
		top:10px;
		width:32px;
		height:32px;
		cursor:pointer;
		z-index:99;
	}
	.hdn-popup-primer{
		position:relative;
		height:80%;
		width:100%;
		text-align:center;
		border-bottom:1px solid #999999;
	}
	.hdn-popup-primer img{
		height:100%;
		position:relative;
	}
	.hdn-popup-second{
		position:relative;
		height:20%;
		width:100%;
		text-align:center;
	}
	.hdn-popup-second img{
		position:relative;
		display:inline-block;
		height:70%;
		margin-left:5px;
		margin-right:5px;
		margin-top:20px;
		cursor:pointer;
		width:auto;
	}
</style>
<script type="text/javascript">
	$(document).ready(function() { //Ready
//Load Img
	a=25;
	$('#btn-load').click(function(event) {
		$.ajax({
			url: 'content/load-img.php',
			type: 'GET',
			dataType: 'html',
			data: {'start': a}
		})
		.done(function(data) {
			$('.house-design-container').append(data);
			$('.house-design-container-small').append(data);
			a=(a+20);
			$('html,body').animate({
				scrollTop:$('#btn-load').offset().top
			}, 1500, 'easeInOutExpo');
		});
		return false;
	});
//end load imd
	

	//Click sidebar
	$('.hdn-sidebar a').click(function(event) {
		var id = $(this).attr('id');
		$('.hdn-img-container').html('');
		$('.hdn-judul').html(id);
		$.getJSON('core/action.php', {'act': 'get-hd-new','a':id}, function(json, textStatus) {
			$.each(json, function(ind, v) {
				$('.hdn-img-container').append('<img src="assets/img/hd-new/'+id+'/'+v+'" path="'+id+'" data="'+v+'" class="hdn-img-img" width="100%" height="auto">');
				//$.each(v.img, function(index, val) {
				//	$('.hdn-img-container').append('<div class="hdn-img" id="'+val.name+'"><img src="assets/img/hd-new/'+id+'/'+val.name+'/'+val.img+'"></div>') 
				//});
			});	
		});
	});

	//popup image
	$(document).on('click', '.hdn-img-img', function(event) {
		var img = $(this).attr('data');
		var path = $(this).attr('path');
		$('body').append('<div class="popup-image"><div><img src="assets/img/hd-new/'+path+'/large/'+img+'"></div></div>');
	});

	//Remove popup
	$(document).on('keypress', 'body', function(event) {
		if (event.keyCode==27) {
			$('.popup-image').remove();
		};
	});

	//Select image to house design
	//$(document).on('click', '.hdn-img', function(event) {
	//	var judul = $('.hdn-judul').html();
	//	var name = $(this).attr('id');
	//	$('.hdn-img-container').append('<div class="hdn-popup"><img class="hdn-close" src="assets/img/web/back-75.png">'+
	//		'<div class="hdn-popup-primer"><img src="assets/img/hd-new/'+judul+'/'+name+'/1.jpg"></div>'+
	//		'<div class="hdn-popup-second">'+
	//			'<img src="assets/img/hd-new/'+judul+'/'+name+'/1.jpg">'+
	//			'<img src="assets/img/hd-new/'+judul+'/'+name+'/2.jpg">'+
	//			'<img src="assets/img/hd-new/'+judul+'/'+name+'/3.jpg">'+
	//			'<img src="assets/img/hd-new/'+judul+'/'+name+'/4.jpg">'+
	//			'<img src="assets/img/hd-new/'+judul+'/'+name+'/5.jpg">'+
	//			'<img src="assets/img/hd-new/'+judul+'/'+name+'/6.jpg">'+
	//		'</div>'+
	//		'</div>');
	//});
	//--

	//Change image popup
	$(document).on('click', '.hdn-popup-second img', function(event) {
		var img = $(this).attr('src');
		$('.hdn-popup-primer img').attr('src', img);
	});
	//--

	//Close popup
	$(document).on('click', '.hdn-close', function(event) {
		$('.hdn-popup').remove();
	});
	//--

	//Close popup
	$(document).on('click', '.popup-image', function(event) {
		$('.popup-image').remove();
	});
	//--

	});//End ready
</script>
<div class="house-design-new-container">
	<div class="hdn-sidebar">
		<a href="#" id="baseball">Baseball</a>
		<!-- <a href="#" id="boating">Boating</a> -->
		<a href="#" id="bowling">Bowling</a>
		<a href="#" id="dart">Darts</a>
		<a href="#" id="fishing">Fishing</a>
		<a href="#" id="paintball">Paintball</a>
		<a href="?menu=house_design">Others</a>
		<!-- <a href="#" id="hockey">Hockey</a> -->
	</div>
	<div class="hdn-content">
		<div class="hdn-judul"></div>
		<div class="hdn-img-container"></div>
	</div>
</div>
<br>
<br>
<br>
<br>
