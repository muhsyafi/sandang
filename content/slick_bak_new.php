
	<script>


	</script>
	<style type="text/css">
	.dock-content{
		text-align: center;
		height: 70px;
		width: 1350px;
		overflow: hidden;
		margin: 0 auto;
	}
	.dock-wrapper div{
		padding-top: 6px;
		display: inline-block;
		vertical-align: middle;
		text-decoration: none;
		color: black;
		position: relative;
		width: auto;
		height: 22px;
		text-align: center;
		font-size: 11.5px;
		margin: 10px 1px;
		text-transform: uppercase;
	}
	.dock-wrapper{
		width: auto;
		height: 64px;
		overflow: hidden;
		position: relative;
	}
	.focus{
		width: 100px !important;
		padding-top: 10px !important;
		text-transform: uppercase;
		font-size: 11.5px !important;
		height: 35px !important;
		position: relative;
		background-color: #999999;
		color: white !important;
		-webkit-transition: all .25s ease 0s;
		   -moz-transition: all .25s ease 0s;
		    -ms-transition: all .25s ease 0s;
		     -o-transition: all .25s ease 0s;
		        transition: all .25s ease 0s;
	}
	.focus a{
		color: white;
	}
/*
	.slick-next, .slick-prev{
		top: 10px;
		width: 32px;
		height: 32px;
	}
	.slick-next{
				background: #999999 url('assets/img/web/arrow.png') 0px 0px;
				-webkit-transition: all .25s ease 0s;
				   -moz-transition: all .25s ease 0s;
				    -ms-transition: all .25s ease 0s;
				     -o-transition: all .25s ease 0s;
				        transition: all .25s ease 0s;
	}

	.slick-next:hover{
		background-position: -32px 0px;
	}
	.slick-prev{
				background: #999999 url('assets/img/web/arrow.png') 0px -32px;
				-webkit-transition: all .25s ease 0s;
				   -moz-transition: all .25s ease 0s;
				    -ms-transition: all .25s ease 0s;
				     -o-transition: all .25s ease 0s;
				        transition: all .25s ease 0s;
	}
	.slick-prev:hover{
		background-position: -32px -32px;
	}
*/
	</style>
</head>
			<div class="dock-content">
				<div class="dock-wrapper">
				
				<?php 
				$kueri=mysqli_query($link,"select * from category_new where cat_parent_ID='0'");
				while($data=mysqli_fetch_array($kueri)) { 
					?>
					<div class="<?php echo $data['cat_id'] ?>"><h3> <a id="<?php echo $data['cat_id'] ?>" href="#"><?php echo str_replace('_', ' ', $data['cat_name']) ?></a></h3></div>
				<?php } ?>
				</div>
			</div>

	<script type="text/javascript">
	$(document).ready(function() { //Ready
		//Ajax
		function loadImg(id)
		{	
			$.ajax({
				url: 'content/home-slider.php',
				type: 'GET',
				dataType: 'html',
				data:{'id':id},
			})
			.done(function(data) {
				$('.slide-wrapper').html(data);
				$('.slide-wrapper').addClass('animated bounceIn');
			});
			$('.slide-wrapper').removeClass('animated bounceIn');			
			//loadImg(id);
		}
		//end ajax
		var x=0;
			y=$('.dock-wrapper div');
		$.each(y,function(index) {
			if (index>x) {
				x=index;
			};
		});
			x=Math.floor(x/2);
			
			$('.dock-wrapper div:nth-child('+(x+2)+')').addClass('focus');

		loadImg('accessories');
		$('.dock-wrapper div a').live('click',function(event) {
			/* Act on the event */
			index=$(this).parent().parent().index();
			if (index>=(x+2)) {
				val=$(this).html();
				val_cent=$('.focus').html();
				$('.focus').removeClass('animated bounceInLeft bounceInRight');
				$(this).html(val_cent);
				$('.focus').fadeIn().addClass('animated bounceInRight').html(val);
				loadImg(val);

			}else{
				val=$(this).html();
				val_cent=$('.focus').html();
				$('.focus').removeClass('animated bounceInRight bounceInLeft');
				$(this).html(val_cent);
				$('.focus').fadeIn().addClass('animated bounceInLeft').html(val);
				loadImg(val);
			}
			return false;
		});
	});//End ajax     
    </script>