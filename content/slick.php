	<script>
$(document).ready(function() { //Ready
	var _=$('#carousel');
		n=$('#carousel_next');
		b=$('#carousel_back');
		_c=_.find('div');

		_.children('div').click(function(event) {
			i=$(this).index();
			xoff=_.offset().left;
			off=$(this).offset().left;
			off=off-xoff;

			active=$('.active').offset().left-xoff;
			coor=(348-off);
			_.animate({left:348-off}, 500);
		});
/*
		
		//Init
		_.find('div').eq(3).addClass('active');
		//End init

		b.click(function(event) {
			_.find('div').first().animate({
				'width': 0,
				}, function() {
				_.find('div').last().after($(this));
				_.find('div').last().css('width', '100');
				//$(this).remove();
			});
		});

		n.click(function(event) {
			_.find('div').last().css('width', '0');
			_.find('div').first().before(_.find('div').last());
			_.find('div').first().animate({
				'width': 100,
				}, function() {
				
			});
		});

		function m_right(id)
		{
				_.animate({
					'left': id*100,
					}, function() {
					
				});
		}

		function m_left(id)
		{
			for (var i = 0; i <= id; i++) {
				_.find('div').eq(i).animate({
					'width': 0,
					}, function() {
					_.find('div').last().after($(this));
					_.find('div').last().css('width', '100');
				});
			};
		}


		_c.click(function(event) {
			_id=$(this).index();
			_idr=((_id+1)-4)*-1;
			_idl=(_id-4);
			switch (_id)
			{
				case 0:
				{
					m_right(_idr);
					break;
				}
				case 4: case 5: case 6:
				{
					m_left(_idl);
				}
			}
			_.find('div').removeClass('active');
			$(this).addClass('active');
		});
	*/
});//End ready

	</script>
</head>
			<div class="carousel">
				<a href="#" id="cr-back"></a>
				<a href="#" id="cr-next"></a>
				<div id="carousel">
				<?php 
				$kueri=mysqli_query($link,"select * from category_new where cat_parent_ID='0' order by cat_id");
				while($data=mysqli_fetch_array($kueri)) { 
					?>
					<div class="carousel_box" id="<?php echo $data['cat_id'] ?>"><?php echo $data['cat_name'] ?></div>
				<?php } ?>
				</div>
				
			</div>
			<div class="carousel-small">
				<div id="carousel">
				<?php 
				$kueri=mysqli_query($link,"select * from category_new where cat_parent_ID='0' order by cat_id");
				while($data=mysqli_fetch_array($kueri)) { 
					?>
					<div class="carousel_box" id="<?php echo $data['cat_id'] ?>"><?php echo $data['cat_name'] ?></div>
				<?php } ?>
				</div>
				
			</div>
		</section>
<script>
	
</script>