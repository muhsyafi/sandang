 $(document).ready(function() { //Ready
var adminArea = $('.admin-content .content');
var dialog=$('.dialog');
var act,hdName;
var dialogContent = $('.dialog-wrapper');
//Admin dasboard
$('.admin-img-wrapper').click(function(){
	$('.admin-item-menu').removeClass('admin-item-active');
	$(this).addClass('admin-dasboard-active');
	adminArea.html('<img src="../assets/img/web/preload.gif">');
	adminArea.load('admin.php #admin-area',function() {
		adminArea.find('img').hide();
	});
});
//End dasboard

//Alert & confirm
function popUpAlert(msg){
	$('.alert').fadeIn('fast');
	$('.alert').find('.alert-content').html(msg);
}

function popUpConfirm(msg,act,id){
	$('.confirm').fadeIn('fast');
	$('.confirm').find('.confirm-content').html(msg);
	$('.confirm-oke').click(function(){
		switchAction(act,id);
	});
}

$('.alert .alert-btn, .confirm .confirm-cancel').click(function(){
	$('.alert').hide();
	$('.confirm').hide();
	return false;
});

//End alert & confirm

//Switch action
function switchAction(act,id){
	confirm = $('.confirm');
	switch (act) {
		case "delete-user":
		{
			$.ajax({
				url: '../core/action.php',
				type: 'GET',
				dataType: 'html',
				data: {'act': 'delete_customer','a':id},
			})
			.done(function(data) {
				if (data==1) {
					$('#row-'+id+'').fadeOut();
					$('.confirm').hide();
				}else{
					popUpAlert("Cannot delete, please refresh your browser");
				}
			});
			break;
		}
		case "delete-data":
		{
			$.ajax({
				url: '../core/action.php',
				type: 'GET',
				dataType: 'html',
				data: {'act': 'delete-data','a':id},
			})
			.done(function(data) {
				if (data==1) {
					$('#row-'+id+'').fadeOut();
					$('.confirm').hide();
				}else{
					popUpAlert("Cannot delete, please refresh your browser");	
				}
			})			
			break;
		}
		case "delete-house-design":
		{
			$.ajax({
				url: '../core/action.php',
				type: 'GET',
				dataType: 'html',
				data: {'act': 'delete-house-design','a':id},
			})
			.done(function(data) {
				if (data==1) {
					$('.box-'+id+'').fadeOut();
					$('.confirm').hide();
				}else{
					popUpAlert("Cannot delete, please refresh your browser");	
				}
			})			
			break;
		}
		case "delete-gallery" :{
			$.ajax({
				url: '../core/action.php',
				type: 'GET',
				dataType: 'html',
				data: {'act': 'delete-gallery','a':id},
			})
			.done(function(data) {
				if (data==1) {
					$('#'+id+'').fadeOut();
					$('.confirm').hide();
				}else{
					popUpAlert("Cannot delete, please refresh your browser");	
				}
			})
			break;
		}
	}
}
//End switch

//Esc key
$(document).keydown(function(event) {
	key = event.keyCode;
	if (key==27) {
		dialog.fadeOut();
	};
});
//End esc

//Admin-item
adminArea.load('admin.php #admin-area');
$('.admin-item-menu').click(function(event) {
	$('.admin-item-menu').removeClass('admin-item-active');
	$('.admin-img-wrapper').removeClass('admin-dasboard-active');
	$(this).addClass('admin-item-active');
	adminArea.html('<img src="../assets/img/web/preload.gif">');
	data=$(this).attr('data');
	adminArea.load('admin.php #'+data+'',function() {
		adminArea.find('img').hide();
	});
});
//End item

dialog.click(function(event) {
	if ($(event.target).is($('.dialog-wrapper').parent('.dialog'))) {
		$(this).fadeOut();
	};
});

//User view
$(document).on('click','.user-view', function(){
	id=$(this).attr('id');
	$.getJSON('../core/action.php', {'act': 'get_customers','a':id}, function(val, textStatus) {
			dialogContent.html(''+
				'<table class="user-table">'+
					'<tr><td align="right">ID</td><td align="center">:</td><td align="left">'+val.cust_id+'</td></tr>'+
					'<tr><td align="right">Name</td><td align="center">:</td><td>'+val.first_name+' '+val.last_name+'</td></tr>'+
					'<tr><td align="right">Username</td><td align="center">:</td><td>'+val.username+'</td></tr>'+
					'<tr><td align="right">Email</td><td align="center">:</td><td>'+val.email_id+'</td></tr>'+
					'<tr><td align="right">Contact Name</td><td align="center">:</td><td>'+val.contact_name+'</td></tr>'+
					'<tr><td align="right">Team Name</td><td align="center">:</td><td>'+val.team_name+'</td></tr>'+
					'<tr><td align="right">Address</td><td align="center">:</td><td>'+val.address_line_1+' '+val.address_line_2+' '+'</td></tr>'+
					'<tr><td align="right">Street</td><td align="center">:</td><td>'+val.street+'</td></tr>'+
					'<tr><td align="right">City</td><td align="center">:</td><td>'+val.city+'</td></tr>'+
					'<tr><td align="right">State</td><td align="center">:</td><td>'+val.state+'</td></tr>'+
					'<tr><td align="right">Country</td><td align="center">:</td><td>'+val.country+'</td></tr>'+
					'<tr><td align="right">Zip Code</td><td align="center">:</td><td>'+val.zip_code+'</td></tr>'+
					'<tr><td align="right">Ship Street</td><td align="center">:</td><td>'+val.ship_street+'</td></tr>'+
					'<tr><td align="right">Ship City</td><td align="center">:</td><td>'+val.ship_city+'</td></tr>'+
					'<tr><td align="right">Ship State</td><td align="center">:</td><td>'+val.ship_state+'</td></tr>'+
					'<tr><td align="right">Ship Zip Code</td><td align="center">:</td><td>'+val.ship_zip_code+'</td></tr>'+
					'<tr><td align="right">Ship Country</td><td align="center">:</td><td>'+val.ship_country+'</td></tr>'+
					'<tr><td align="right">Ship Address</td><td align="center">:</td><td>'+val.ship_address_line_1+' '+val.ship_address_line_2+'</td></tr>'+
					'<tr><td align="right">Phone</td><td align="center">:</td><td>'+val.phone+'</td></tr>'+
					'<tr><td align="right">Cell</td><td align="center">:</td><td>'+val.cell+'</td></tr>'+
				'</table>'+
			'');
	});
	dialog.fadeIn();
	return false;
});
//End view

//User delete
$(document).on('click','.user-delete', function(){
	id=$(this).attr('id');
	popUpConfirm("Are you sure you want to delete this Customer?","delete-user",id); 	
	return false;
});
//End delete

//Data
$(document).on('change', '#admin-data select', function(event) {
	id=$(this).val();
	$('#data-data').html('<img src="../assets/img/web/preload.gif">');
	$.ajax({
		url: '../core/action-design.php',
		type: 'POST',
		dataType: 'json',
		data: {'act': 'get-data','a':id},
	})
	.done(function(data) {
		$('#data-data').html('<tr><td align="right">ID</td><td>Name</td><td>Path</td><td colspan="2">Action</td></tr>');
		$.each(data, function(index, val) {
			 $('#data-data').append('<tr id="row-'+val.cat_id+'"><td align="right">'+val.cat_id+'</td><td>'+val.cat_name+'</td><td>'+val.path+'</td><td align="center"><a class="data-edit btn" href="#" id="'+val.cat_id+'"><div>View</div></a></td><td align="center"><a class="data-delete btn" href="#" id="'+val.cat_id+'"><div>Delete</div></a></td></tr>');
		});
	});
	
});

//Data edit
$(document).on('click','.data-edit', function(){
	id=$(this).attr('id');
	dialogContent.html('<table id="table-data" width="100%"></table>');
	dialogContent.find('table').append('<tr><td>Name</td><td>Type</td><td>Price</td><td>Size</td></tr>'); 
	$.getJSON('../core/action.php', {'act': 'get-product','a':id}, function(json, textStatus) {
		$.each(json, function(index, val) {
			dialogContent.find('table').append('<tr class="product-value" id="'+val.cat_opt_id+'"><td class="cat_opt_name"><label>'+val.cat_opt_name+'</label><input type="text" value="'+val.cat_opt_name+'" class="edit-product"><div><img class="yes" src="../assets/img/web/yes.png"><img class="no" src="../assets/img/web/cancel.png"></div></td><td class="cat_opt_type"><label>'+val.cat_opt_type+'</label><input type="text" value="'+val.cat_opt_type+'" class="edit-product"><div><img class="yes" src="../assets/img/web/yes.png"><img class="no" src="../assets/img/web/cancel.png"></div></td><td class="price"><label>'+val.price+'</label><input type="text" value="'+val.price+'" class="edit-product"><div><img class="yes" src="../assets/img/web/yes.png"><img class="no" src="../assets/img/web/cancel.png"></div></td><td class="size"><label>'+val.size+'</label><input type="text" value="'+val.size+'" class="edit-product"><div><img class="yes" src="../assets/img/web/yes.png"><img class="no" src="../assets/img/web/cancel.png"></div></td></tr>'); 
		});
	});
	dialog.fadeIn();
	return false;
});
//End view

//Data edit
$(document).on('click', '.product-value td', function(event) {
	val = $(this).html();
	col = $(this).attr('class');
	if (!$(event.target).is('.no')) {
		$('.product-value td').find(':text, div').hide();
		$(this).find(':text,div').show();
		$(this).find(':text').focus().select();
	};
});
//End edit

//Data yes
$(document).on('click','.product-value .yes', function(event) {
	_=$(this).parent().parent().parent('.product-value');
	id=_.attr('id');
	td=$(this).parent().parent('td');
	col=td.attr('class');
	val=$(this).parent().parent('td').find(':text').val();
	td.find('label').html(val);
	$.ajax({
		url: '../core/action.php',
		type: 'GET',
		dataType: 'html',
		data:{'act':'update-product','a':id,'b':col,'c':val},
	})
	.done(function(data) {
		if (data==1) {
			$('.product-value td').find(':text, div').hide();
		}else{
			popUpAlert("Cannot update data, please refresh your browser!");
		}
	});
	
});
//End yes

//Data cancel
$(document).on('click','.product-value .no', function(event) {
	_=$(this).parent().parent().parent('.product-value');
	_.find(':text, div').hide();
});
//End cancel

//Data Delete
$(document).on('click','.data-delete', function(){
	id=$(this).attr('id');
	popUpConfirm("Are you sure you want to delete this data?", "delete-data", id);
	return false;
});
//End delete
//End data

//Text content
$(document).on('change', '#admin-content select', function(event) {
	id=$(this).val();
	$('#admin-content .text-content').hide();
	$('#admin-content #'+id).show();
	$('#accordion').accordion({ icons: { "header": "ui-icon-plus", "activeHeader": "ui-icon-minus" } });
	$('.accordion').accordion();
	//$('#admin-content .loader').html('<img src="../assets/img/web/preload.gif">');
	//$.ajax({
	//	url: '../core/action-design.php',
	//	type: 'POST',
	//	dataType: 'json',
	//	data: {'act': 'get-data-text','a':id},
	//})
	//.done(function(val) {
	//	
	//	//$('#data-fabric').html('<tr><td align="right">ID</td><td>Name</td><td>Content</td><td>Compose</td><td>Weight</td><td>Feel</td><td>Durab</td><td>Impact</td><td>Thick</td><td>Breat</td></tr>');
	//	//	$('#data-fabric').append('<tr id="row-'+val.id+'"><td>'+val.id+'</td><td align="right">'+val.title+'</td><td>'+val.content+'</td><td>'+val.compos+'</td><td>'+val.weight+'</td><td>'+val.feel+'</td><td>'+val.durab+'</td><td>'+val.impact+'</td><td>'+val.thick+'</td><td>'+val.breat+'</td></tr>');
	//});
	
});

//Text content edit
$(document).on('click','.data-edit', function(){
	id=$(this).attr('id');
	dialogContent.html('<table id="table-data" width="100%"></table>');
	dialogContent.find('table').append('<tr><td>Name</td><td>Type</td><td>Price</td><td>Size</td></tr>'); 
	$.getJSON('../core/action.php', {'act': 'get-product','a':id}, function(json, textStatus) {
		$.each(json, function(index, val) {
			dialogContent.find('table').append('<tr class="product-value" id="'+val.cat_opt_id+'"><td class="cat_opt_name"><label>'+val.cat_opt_name+'</label><input type="text" value="'+val.cat_opt_name+'" class="edit-product"><div><img class="yes" src="../assets/img/web/yes.png"><img class="no" src="../assets/img/web/cancel.png"></div></td><td class="cat_opt_type"><label>'+val.cat_opt_type+'</label><input type="text" value="'+val.cat_opt_type+'" class="edit-product"><div><img class="yes" src="../assets/img/web/yes.png"><img class="no" src="../assets/img/web/cancel.png"></div></td><td class="price"><label>'+val.price+'</label><input type="text" value="'+val.price+'" class="edit-product"><div><img class="yes" src="../assets/img/web/yes.png"><img class="no" src="../assets/img/web/cancel.png"></div></td><td class="size"><label>'+val.size+'</label><input type="text" value="'+val.size+'" class="edit-product"><div><img class="yes" src="../assets/img/web/yes.png"><img class="no" src="../assets/img/web/cancel.png"></div></td></tr>'); 
		});
	});
	dialog.fadeIn();
	return false;
});
//End view

//Text content edit
var valTemp = null;
$(document).on('click', '#admin-content td', function(event) {
	if (valTemp==null) {
		val = $(this).html();
		col = $(this).attr('class');
		if (!$(event.target).is('.no-save') && !$(event.target).is('.yes-save') && !$(event.target).is('.accordion') && !$(event.target).is('.accordion > *')){
			valTemp = val;
			if (col!='content' && col!='address') {
				if (!$(event.target).is(':text')) {
					$(this).html('<input type="text" value="'+val+'" width="100%"><div><img class="yes-save" src="../assets/img/web/yes.png"><img class="no-save" src="../assets/img/web/cancel.png"></div>');
				};
			}else{
				if ($(event.target).is('.textarea-fabric')) {
					return false;
				}
				$(this).html('<textarea class="textarea-fabric" style="width:100%; height:300px;">'+val+'</textarea><div><img class="yes-save" src="../assets/img/web/yes.png"><img class="no-save" src="../assets/img/web/cancel.png"></div>');
			}
			//$('.product-value td').find(':text, div').hide();
			//$(this).find(':text,div').show();
			//$(this).find(':text').focus().select();
		};
	}
	return false;
});
//End edit

//Text content yes
$(document).on('click','#admin-content .yes-save', function(event) {
	_=$(this).parent().parent().parent();
	id=_.attr('id');
	table = _.attr('class');
	td=$(this).parent().parent('td');
	col=td.attr('class');
	if (col=='content' || col=='address') {
		val=$(this).parent().parent('td').find('textarea').val();
	}else{
		val=$(this).parent().parent('td').find(':text').val();
	}
	$.ajax({
		url: '../core/action-design.php',
		type: 'POST',
		dataType: 'html',
		data:{'act':'update-text','a':table,'b':col,'c':val, 'd':id},
	})
	.done(function(data) {
		if (data==1) {
			td.html(val);
			valTemp = null;
		}else{
			popUpAlert("Cannot update data, please refresh your browser!");
			console.log(data);
		}
	});
	
});
//Text content yes

//Text content cancel
$(document).on('click','#admin-content .no-save', function(event) {
	_=$(this).parent().parent();
	_.html(valTemp);
	valTemp = null;
});
//End cancel

//Text content Delete
$(document).on('click','.data-delete', function(){
	id=$(this).attr('id');
	popUpConfirm("Are you sure you want to delete this data?", "delete-data", id);
	return false;
});
//End delete
//End Text content



//Change title
$(document).on('click','#change-web-title',function(){
	var teks = $('#web-title');
	if (teks.val()) {
		$.getJSON('../core/action.php', {'act': 'change-title','a':teks.val()}, function(json, textStatus) {
		})
		.success(function(json){
			if (json==1) {
				$('#admin-general').find('strong').eq(1).html('"'+teks.val()+'"');
			}else{
				popUpAlert("Cannot change the title, please try again, with refresh your browser");
			}
		});
	}else{
		teks.filter(function(index) {
			return !this.value;
		}).css('border', '2px solid red');
	}
	return false;
});
//End change

//Change password
$(document).on('click', '#change-password', function(event) {
	teks = $('#password');
	teks2 = $('#password2');
	if (teks.val()&&teks2.val()) {
		if (teks.val()==teks2.val()) {
			$.getJSON('../core/action.php', {'act': 'change-password','a':teks.val()}, function(json, textStatus) {
			})
			.success(function(json){
				if (json=1) {
					popUpAlert("Success");
				}else{
					popUpAlert("Failed to change password, please refresh your browser");
				}
			});
		}else{
			$('#password,#password2').css('border', '2px solid red');
		}
	}else{
		$('#password,#password2').filter(function(index) {
			return !this.value;
		}).css('border', '2px solid red');
	}
	return false;
});

$(document).on('change', '#password,#password2,#web-title,.txt-create', function(event) {
  $(this).css('border', '2px solid #999999'); 
});

$(document).on('keyup','#txt-username',function(event) {
	label = $('.label-username');
	text = $(this).val();
	$.get('../core/action.php',{'act':'check-user','a':text}, function(data) {
		if (data=='0') {
			label.html("Available").css('color', 'green');
		}else if(data=='1'){
			label.html("Not available").css('color', 'red');
		}
	});
});

//End change

//Create acount
$(document).on('click', '#bt-create', function(event) {
   text = $('.txt-create');
   user = $('#txt-username');
   pass = $('#txt-password');
   pass2 = $('#txt-password2');
   if (user.val()&&pass.val()&&pass2.val()) {
   		if (pass.val()==pass2.val()) {
   				$.get('../core/action.php',{'act':'create-admin','a':user.val(),'b':pass.val()}, function(data) {
   			})
   				.success(function(data){
   					if (data=='1') {
   						popUpAlert("Success create account");
   						text.val('');
   					}else{
   						popUpAlert("Cannot create account");
   					}
   				});
   		}else{
   			pass2.css('border', '2px solid red');
   		}
   }else{
   	 	text.filter(function(index) {
			return !this.value;
		}).css('border', '2px solid red');
   }
});
//End create


//Upload-image
$('#admin-file').live('change', function(event) {
	$('.admin-dasboard img').attr('src','../assets/img/web/preload-3.gif');
	$('#admin-picture').ajaxForm({
		target:'#upload-content',
		success:function(event){
			$('.admin-dasboard img').attr('src',event);
			//Ajax
			$.get('../core/action.php',{'act':'save-admin-img','a':event}, function(data) {
			});
			//End ajax
		}
	}).submit();
});
//End upload

//Change hd
$(document).on('click', '.admin-hd-box .btn', function(event) {
   id = $(this).parent().attr('id');
   name = $(this).parent().attr('name');
   dialogContent.html('<div class="hd-upload-box"><div class="inline hd-upload-box-small">'+
   		'<form name="admin-picture" id="hd-small-form" action="../core/upload-admin.php?act=admin-picture&path=../assets/img/house_design_small/'+name+'" method="post" enctype="multipart/form-data">'+
			'<input type="file" class="'+id+'" fname="'+name+'" id="hd-small-picture" name="gambar"><label id="admin-file-label">Upload Small Image</label>'+
		'</form>'+
   	'</div>'+
   	'<div class="inline hd-upload-box-big">'+
   		'<div class="hd-upload-warning"><h1>Attention</h1><p>Small and large image name and extension(png) must be the same<br>Small image &plusmn;(64 x 100)px and Large image &plusmn;(450 x 325)px</p></div>'+
   		'<form name="admin-picture" id="hd-big-form" action="../core/upload-admin.php?act=admin-picture&path=../assets/img/house_design " method="post" enctype="multipart/form-data">'+
			'<input type="file" class="'+id+'" fname="'+name+'" id="hd-big-picture" name="gambar"><label id="admin-file-label">Upload Large Image</label>'+
		'</form>'+
   	'</div><div>');
   dialog.fadeIn();
   return false;
});
//End change


//Func save hd
function saveHd(id,img,name){
	$.ajax({
		url: '../core/action.php',
		type: 'GET',
		dataType: 'html',
		data: {'act': 'save-house-design','a':id,'b':img},
	})
	.done(function(data) {
		if (data==1) {
			$('.box-'+id+' .admin-hd-img').attr('src','../assets/img/house_design_small/'+name+'/'+img);
		}else{
			popUpAlert("Cannot update, please refresh your browser");	
		}
	})
}
//End save
//Func save hd small
function insertHd(act,name,img){
	$.ajax({
		url: '../core/action.php',
		type: 'GET',
		dataType: 'html',
		data: {'act': act,'a':name,'b':img},
	})
	.done(function(data) {
		if (data==1) {
			//$('.box-'+id+' .admin-hd-img').attr('src','../assets/img/house_design_small/'+name+'/'+img);
		}else{
			popUpAlert("Cannot save data, please refresh your browser");	
		}
	})
}
//End save small

//Upload hd
$(document).on('click', '.hd-upload', function(event) {
   dialogContent.html('<div class="hd-upload-box"><div class="inline hd-upload-box-small">'+
   		'<form name="admin-picture" id="hd-up-small-form" action="../core/upload-admin.php?act=admin-picture&path=../assets/img/house_design_small/" method="post" enctype="multipart/form-data">'+
			'<input type="file" id="hd-up-small" name="gambar"><label id="admin-file-label">Upload Small Image</label>'+
		'</form>'+
   	'</div>'+
   	'<div class="inline hd-upload-box-big">'+
   		'<div class="hd-upload-warning"><h1>Attention</h1><p>Small and large image name and extension(png) must be the same<br>Small image &plusmn;(64 x 100)px and Large image &plusmn;(450 x 325)px</p><input type="text" id="hd-name" class="bord" placeholder="Name of product"><br></div>'+
   		'<form name="admin-picture" id="hd-up-big-form" action="../core/upload-admin.php?act=admin-picture&path=../assets/img/house_design " method="post" enctype="multipart/form-data">'+
			'<input type="file" id="hd-up-big" name="gambar"><label id="admin-file-label">Upload Large Image</label>'+
		'</form>'+
   	'</div><div>');
   dialog.fadeIn();
   act = $('#hd-up-small-form').attr('action');
});
//Add path on upload small
$(document).on('keyup', '#hd-name', function(event) {
	val = $(this).val();
	$('#hd-up-small-form').attr('action',act+val);
});
//End add
//Upload small hd
$(document).on('change', '#hd-up-small', function(event) {
	hdName=$('#hd-name').val();
	$('#hd-up-small-form').ajaxForm({
		beforeSend:function(event){
			$('.hd-upload-box-small').append('<div class="prog"><progress value="0" max="100"></progress></div>');
		},
        uploadProgress: function(event, position, total, percentComplete) {
            $('progress').attr('value', percentComplete);
        },
		success:function(data){
			img = data.replace('../assets/img/house_design_small/'+hdName+'/','');
			insertHd('insert-hd-small', hdName, img);
			$('.hd-upload-box-small').html('<img src="'+data+'">');
		}
	}).submit();
});
//End small hd

//Upload small hd
$(document).on('change', '#hd-up-big', function(event) {
	hdName=$('#hd-name').val();
	$('#hd-up-big-form').ajaxForm({
		beforeSend:function(event){
			$('.hd-upload-box-big').append('<div class="prog"><progress value="0" max="100"></progress></div>');
		},
        uploadProgress: function(event, position, total, percentComplete) {
            $('progress').attr('value', percentComplete);
        },
		success:function(data){
			img = data.replace('../assets/img/house_design/','');
			insertHd('insert-hd-big', hdName, img);
			$('.hd-upload-box-big').html('<img src="'+data+'">');
		}
	}).submit();
});
//End small hd

//End upload

//Upload small hd
$(document).on('change', '#hd-small-picture', function(event) {
	var idP = $(this).parent();
	var name = $(this).attr('fname');
	var id = $(this).attr('class');
	$('#hd-small-form').ajaxForm({
		beforeSend:function(event){
			$('.hd-upload-box-small').append('<div class="prog"><progress value="0" max="100"></progress></div>');
		},
        uploadProgress: function(event, position, total, percentComplete) {
            $('progress').attr('value', percentComplete);
        },
		success:function(data){
			img = data.replace('../assets/img/house_design_small/'+name+'/','');
			saveHd(id, img, name);
			$('.hd-upload-box-small').html('<img src="'+data+'">');
		}
	}).submit();
});
//End small hd

//Hd delete
$(document).on('click', '.admin-hd-delete', function(event) {
	id = $(this).parent().attr('id');
	popUpConfirm("Are you sure you want to delete this data?", "delete-house-design", id);
});
//End delete

//Upload small hd
$(document).on('change', '#hd-big-picture', function(event) {
	$('#hd-big-form').ajaxForm({
		beforeSend:function(event){
			$('.hd-upload-box-big').append('<div class="prog"><progress value="0" max="100"></progress></div>');
		},
        uploadProgress: function(event, position, total, percentComplete) {
            $('progress').attr('value', percentComplete);
        },
		success:function(data){
			$('.hd-upload-box-big').html('<img src="'+data+'">');
		}
	}).submit();
});
//End small hd

//Upload gallery
$(document).on('change', '#ag-file', function(event) {
	_=$(this).parents('.ag-wrapper');
	$('#ag-picture').ajaxForm({
		beforeSend:function(){
			$('.ag-wrapper').html('<div class="prog"><progress value="0" max="100"></progress></div>');
		},
		uploadProgress:function(event, position, total, percentComplete){
			$('.ag-wrapper').find('progress').attr('value', percentComplete);
		},
		success:function(data){
			$('.ag-all').prepend('<div class="gallery-wrapper bord rel inline mrg5" id="">'+
				'<img class="ag-delete cp abs no" src="../assets/img/web/cancel.png">'+
				'<img class="ag-content rel full-w full-h" src="'+data+'">'+
				'</div>');
			img = data.replace('../assets/img/gallery/','');
			$.get('../core/action.php', {'act':'save-gallery','a':img}, function(ev) {
			})
			.success(function(ev){
				if (ev==1) {
			_.html('<form name="ag-picture" id="ag-picture" action="../core/upload-admin.php?path=../assets/img/gallery/" method="post" enctype="multipart/form-data">'+
			'<input type="file" id="ag-file" name="gambar"><label id="ag-label" class="abs absc"></label>'+
			'</form><br>');
				}else{
					popUpAlert("Cannot upload your image, please try again");
				}
			})
		}
	}).submit();
});
//End gallery

//Delete gallery
$(document).on('click', '.ag-delete', function(event) {
	id = $(this).parent().attr('id');
	popUpConfirm("Are you sure you want to delete this image?", "delete-gallery", id);
});
//End delete

//Gallery more
$(document).on('click', '.ag-more', function(event) {
    total = $('.gallery-wrapper').last().index();
    total = Number(total)+1;
    $.getJSON('../core/action.php', {'act': 'get-gallery','a':total}, function(json, textStatus) {
    	$.each(json, function(index, val) {
    		$('.ag-all').append('<div class="gallery-wrapper bord rel inline mrg5" id="'+val.id+'">'+
				'<img class="ag-delete cp abs" src="../assets/img/web/cancel.png">'+
				'<img class="ag-content rel full-w full-h" src="../assets/img/gallery/'+val.img+'">'+
				'</div>');
    	});
    });
});
//End more

//Logout
$('#item-logout').click(function(event) {
	$.post('../core/action-design.php', {'act': 'logout'}, function(data, textStatus, xhr) {
		if (textStatus='success') {
			window.location.href="../index.php";
		};
	});
});
//End logout
}); //Ready