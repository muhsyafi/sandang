<?php ?>
<div class="name-wrapper">
	<div class="name-name">
		<div class="name">
			<div class="name-name-name"><h1>Names</h1></div>
			<div class="name-name-color"><input type="text" id="name-name-color"><input class="name-hidden" type="hidden" value="black"></div>
			<div class="name-name-size" id="name-size"><select><option>1 inches</option></select></div>
			<div class="name-name-font" id="name-font"><select><option>Varsity</option></select></div>
		</div>
		<div class="number">
			<div class="name-name-name"><h1>Number</h1></div>
			<div class="name-name-color"><input type="text" id="name-number-color"><input class="number-hidden" type="hidden" value="black"></div>
			<div class="name-name-size" id="number-size"><select><option>1 inches</option></select></div>
			<div class="name-name-font" id="number-font"><select><option>Varsity</option></select></div>
		</div>
	</div>
	<div class="name-display">
		<div class="name-display-display inline">
			<h1 id="d-1">NAME</h1>
			<div id="d-2"><strong>10</strong></div>
		</div>
		<div class="name-display-header">
			<label id="l-1">NAME</label>
			<label id="l-2">#</label>
			<label id="l-3">SIZE</label>
		</div>
		<div class="name-display-detail-group">
		<div class="name-display-detail inline" id="1">
			<div class="name inline"><input type="text" id="0"></div>
			<div class="number inline"><input type="text" id="0"></div>
			<div class="size"><select>
				<option selected="">S</option>
				<option>M</option>
				<option>L</option>
				<option>XL</option>
				<option>2XL</option>
				<option>3XL</option>
			</select></div>
			<div class="preview inline"></div>
			<div class="delete inline"></div>
		</div>
		<div class="name-display-detail inline" id="2">
			<div class="name inline"><input type="text" id="0"></div>
			<div class="number inline"><input type="text" id="0"></div>
			<div class="size"><select>
				<option selected="">S</option>
				<option>M</option>
				<option>L</option>
				<option>XL</option>
				<option>2XL</option>
				<option>3XL</option>
			</select></div>
			<div class="preview inline"></div>
			<div class="delete inline"></div>
		</div>
		<div class="name-display-detail inline" id="3">
			<div class="name inline"><input type="text" id="0"></div>
			<div class="number inline"><input type="text" id="0"></div>
			<div class="size"><select>
				<option selected="">S</option>
				<option>M</option>
				<option>L</option>
				<option>XL</option>
				<option>2XL</option>
				<option>3XL</option>
			</select></div>
			<div class="preview inline"></div>
			<div class="delete inline"></div>
		</div>
		</div>
		<div class="name-display-other"><a href="#">Add another...</a></div>
	</div>
	<div class="name-price" ng-controller="angOrder">
		<div class="name-price-detail inline">
			<table>
				<tr><td align="left">TOTAL NAMES</td><td  width="20px" align="center"><label id="name-total-name" value='0'>0</label></td><td rowspan="3"><div class="name-total-grand"><strong value="0">$0.00</strong></div></td></tr>
				<tr><td align="left">TOTAL NUMBERS</td><td width="20px" align="center"><label id="name-total-number" valu='0'>0</label></td><td></td></tr>
				<tr><td align="left">TOTAL ITEMS</td><td width="20px" align="center"><label id="name-total-item" value='0'>0</label></td><td></td></tr>
			</table>
		</div>
		<div class="name-price-order inline"><a href="#"><strong>Add to Order</strong></a></div>
	</div>
</div>
<script>
	$(document).ready(function() { //Ready
		$('#name-name-color').spectrum({
			change:function(color)
			{
				$('#d-1').css('color', color.toHexString());
				$('.name-name .name').find(':hidden').val(color.toHexString());
			}
		});
		$('#name-number-color').spectrum({
			change:function(color)
			{
				$('#d-2').css('color', color.toHexString());
				$('.name-name .number').find(':hidden').val(color.toHexString());
			}
		});
		//Add other
		$('.name-display-other a').click(function(event) {
			$('.name-display-detail-group').append($('.name-display-detail').last().clone(true));
			akhir=$('.name-display-detail').last();
			iat=akhir.attr('id');
			iat=Number(iat);
			iat=++iat;
			akhir.attr('id', iat);
			akhir.find('input[type=text]').val('').attr('id', 0).unbind('one');
			return false;
		});
		//End other
		//Preview
		$('.preview').click(function(event) {
			id=$(this).parent('div');
			name=id.find('.name input[type=text]').val();
			no=id.find('.number input[type=text]').val();
			$('#d-1').html(name);
			$('#d-2 strong').html(no);
		});
		//End preview
		//Remove
		$('.delete').click(function(event) {
			id=$(this).parent('div');
			id.remove();
		});
		//End remove
		//Funtion sum
		function sum_total(a,b)
		{
			var sum=$('.name-total-grand strong').attr('value');
				switch (a) {
					case 'sum':
						sum=Number(sum);
						sum=sum+b;
						$('.name-total-grand strong').attr('value',sum);
						$('.name-total-grand strong').html('$'+sum+'.00');
					break;
					case 'div':
						sum=Number(sum);
						sum=sum-b;
						$('.name-total-grand strong').attr('value',sum);
						$('.name-total-grand strong').html('$'+sum+'.00');
					break;
				}
		}
		//End Function sum
		//Funtion sum items
		function sum_item(a,b)
		{
			var name 	=$('#name-total-name').val();
				number 	=$('#name-total-number').val();
				item 	=$('#name-total-item').val();
				switch (a) {
					case 'sum-name':
						sum=Number(name);
						sum=sum+b;
						$('#name-total-name').attr('value',sum);
						$('#name-total-name').html(sum);
					break;
					case 'div-name':
						sum=Number(name);
						sum=sum-b;
						$('#name-total-name').attr('value',sum);
						$('#name-total-name').html(sum);
					break;
					case 'sum-number':
						sum=Number(number);
						sum=sum+b;
						$('#name-total-number').attr('value',sum);
						$('#name-total-number').html(sum);
						$('#name-total-item').attr('value',sum);
						$('#name-total-item').html(sum);
					break;
					case 'div-number':
						sum=Number(number);
						sum=sum-b;
						$('#name-total-number').attr('value',sum);
						$('#name-total-number').html(sum);
						$('#name-total-item').attr('value',sum);
						$('#name-total-item').html(sum);
					break;

				}
		}
		//End Function sum items
		//Sum name
		$('.name input[type=text]').on('keyup',function() {
			val=$(this).val();
			if (val!='') {
				if ($(this).hasClass('active-sum')) {
					//Nothing
				}else{
					sum_total('sum',1);
					sum_item('sum-name',1);
					$(this).addClass('active-sum');
				}
			}else{
				if ($(this).hasClass('active-sum')) {
					sum_total('div',1);
					sum_item('div-name',1);
					$(this).removeClass('active-sum');
				}else{
					//Nothing
				}
			}
		});
		//End sum name
		//Sum number
		$('.number input[type=text]').on('keyup',function() {
			val=$(this).val();
			if (val!='') {
				if ($(this).hasClass('active-sum')) {
					//Nothing
				}else{
					sum_total('sum',30);
					sum_item('sum-number',1);
					$(this).addClass('active-sum');
				}
			}else{
				if ($(this).hasClass('active-sum')) {
					sum_total('div',30);
					sum_item('div-number',1);
					$(this).removeClass('active-sum');
				}else{
					//Nothing
				}
			}
		});
		//End sum number

		//Count the name
		$('.name-price-order').click(function(){
			var cArr = [];
			var json = "";
			var status;
			jumlah = $('.name-display-detail').last().index();
			for (i=0; i<=jumlah; i++){
			name = $('#'+(i+1)+' .name').find(':text').val();
			numb = $('#'+(i+1)+' .number').find(':text').val();
			size = $('#'+(i+1)+' .size').find('select').val();
			cName = $('.name-hidden').val();
			cNumber = $('.number-hidden').val();
			cNameSize = $('#name-size select').val();
			cNameFont = $('#name-font select').val();
			cNumberSize = $('#number-size select').val();
			cNumberFont = $('#number-font select').val();
			if (numb&&name) {
					status=saveName(name, numb, size, cName, cNameSize, cNameFont, cNumber, cNumberSize, cNumberFont);
				};
			};
			status.done(function(data){
		 		if (data==1) {
					window.location.href="?menu=order&order=submit";
				}else {
					$('#design-slide').hide();
					$('.box').animate({
                        'top': '0'
                    }, 1000);
				}
			})
			return false;
		});
		//save the name and number

		function saveName(a,b,c,d,e,f,g,h,i){
			return $.ajax({
				url: 'core/action-design.php',
				type: 'POST',
				async:false,
				dataType: 'text',
				data: {'act': 'save_order_name','a':a,'b':b,'c':c,'d':d,'e':e,'f':f,'g':g,'h':h,'i':i},
			})
		}
		//End count
	}); //End ready
</script>