$(document).ready(function() { // Ready
	var choose=null;
    var optArr;
    //Order-repeat
    $('#order-radio-repeat').click(function(event) {
        $('.order-repeat').fadeIn();
    });
    $('#order-radio-new').click(function(event) {
        $('.order-repeat').fadeOut();
    });
    //

    //Order check
    $('#order-check').click(function() {
        nama = $('#order-repeat-name').val();

    });
    //

    // Get all the elements with class id
    function get_tr() {
        var $td = $('table td');
        var max = 0;
        $.each($td, function() {
            if (parseInt($(this).text()) > max) {
                max = parseInt($(this).text())
            }
        });
        return max;
    }

    //Scroll header
    /*
	$(document).scroll(function() {
		var x = $(this).scrollTop();
		if (x > 20) {
			$('.primary-menu').addClass('shadow');
		}else{
			$('.primary-menu').removeClass('shadow');			
		}
	});
*/
    //end scroll

    //Info
    //$('.info').dialog();
    //End info

    //Box house-design
    $('.hd-img').click(function(event) {
        id = $(this).attr('id');
        ww = $(window).width();
        if (ww < 1000) {
            loadBox(ww);
        } else {
            loadBox(740);
        }
        return false;
    });

    function loadBox(s) {
        TINY.box.show({
            iframe: 'content/hd-box.php?id=' + id + '',
            boxid: 'frameless',
            width: s,
            height: 450,
            fixed: true,
            maskid: 'greyemask',
            maskopacity: 40
        });
    }
    //End box

    //Cek empty
    $('#order-next-btn').click(function(event) {
        /* Act on the event */
        load_value();
        if (!((name) && (phone) && (email) && (team) && (sport) && (address))) {
            $('.user-teks').filter(function(index) {
                return !this.value;
            }).css({
                border: '1px solid red',
                color: 'red',
            }).attr('placeholder', 'Please fill the blank');
            $('html, body').animate({
                scrollTop: $('html, body').offset().top
            }, 400);
        } else {
            post_order();
        }

        return false;
    });
    //end cek empty

    //Send contact

    $('.contact-input').change(function(event) {
        $(this).css('border', '2px solid #999999');
    });

    //Load text contact
    function loadContact() {
        c_name = $('#c_name').val();
        c_email = $('#c_mail').val();
        c_phone = $('#c_phone').val();
        c_address = $('#c_address').val();
        c_state = $('#c_state').val();
        c_post = $('#c_post').val();
        c_website = $('#c_website').val();
        c_message = $('#c_message').val();
    }
    //End load

    //Validasi email
    $('#c_mail').keyup(function(event) {
        var reg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        var isi = $(this).val();
        if (!(reg.test(isi))) {
            $('.email_info').fadeIn();
            $('.email_info').html('Wrong email format!').css('color', 'red');;
        } else {
            $('.email_info').fadeOut();
        }
    });
    //end mail
    //Validasi no HP
    $('#c_phone').keyup(function(event) {
        var reg = /^\d*[0-9](|.\d*[0-9]|,\d*[0-9])?$/;
        var isi = $(this).val();
        if (!(reg.test(isi))) {
            $(this).val(isi.slice(0, -1));
            $('.phone_info').fadeIn();
            $('.phone_info').html('Numberic Only').css('color', 'red');
        } else {
            $('.phone_info').fadeOut();
        }
    });
    //end phone

    //Check captcha
    $('#contact-captcha').keyup(function(event) {
        cpT = $('#cp').val();
        cpV = $(this).val();
        if (cpV != cpT) {
            $(this).css('color', 'red');
        } else {
            $(this).css('color', 'green');
        }
    });
    //end captcha

    //Ajax contact
    function ajaxContact(a, b, c, d, e, f, g, h) {
        $.ajax({
            url: 'core/action.php',
            type: 'GET',
            data: {
                'act': 'post_contact',
                'a': a,
                'b': b,
                'c': c,
                'd': d,
                'e': e,
                'f': f,
                'g': g,
                'h': h
            },
        })
            .done(function(data) {
                $('.contact_info').html('Success submit').css('color', 'green');
            })
            .fail(function() {
                $('.info').dialog();
                $('.info').html(' Sorry, cannot procces your message, please try again with refresh your browser');
            });
    }
    //End ajax
    $('#contact-ok').click(function(event) {
        cpT = $('#cp').val();
        cpV = $('#contact-captcha').val();
        loadContact();
        if (!((c_name) && (c_email) && (c_phone) && (c_address) && (c_state) && (c_post) && (c_message))) {
            $('.contact-input').filter(function() {
                return !this.value;
            }).css('border', '2px solid red');
        } else {
            if (cpT != cpV) {
                $('#contact-captcha').css('border', '2px solid red');
            } else {
                ck = $('#contact-check');
                if (ck.prop('checked')) {
                    ajaxContact(c_name, c_email, c_phone, c_address, c_state, c_post, c_website, c_message);
                } else {
                    $('.contact_info').html('Please check "I Agree"').css('color', 'red');
                }
            }
        }

        //Return false
        return false;
    });
    //End send contact

    //Fungsi load value
    function load_value() {
        apparel = $('#order-select-apparel').val();
        avail = $('#order-select-avail').val();
        n_new = $('#order-new').val();
        fabric = $('#order-select-fabric').val();
        s_notes = $('#order-sales-notes').val();
        name = $('#order-name').val();
        c_notes = $('#order-client-notes').val();
        phone = $('#order-phone').val();
        email = $('#order-email').val();
        team = $('#order-team').val();
        sport = $('#order-sport').val();
        address = $('#order-address').val();
        ship = $('#order-ship').val();
    }
    //end load value
    //Ajax cookieNo
    function ajaxCookieNo(act) {
        $.ajax({
            url: 'content/cookie.php',
            type: 'GET',
            dataType: 'text',
            data: {
                'act': 'set-no'
            },
        });
    }
    //End ajax cookieno

    // AjaxCookieUserId
    function ajaxCookieUID(user_id) {
        $.ajax({
            url: 'content/cookie.php',
            type: 'GET',
            dataType: 'text',
            data: {
                'act': 'set-user-id',
                'user-id': user_id
            },
        })
            .done(function(data) {
                console.log(data);
            });
    }
    // End AjaxCookieUserId
    var rand = Math.floor(Math.random() * 10000 + 1);
    //Set order-no-cookie
    ajaxCookieNo('set-no');
    //end set order-no-cookie
    function post_order() { // function post_order
        //Jquery Continue
        //-------------
        //name_ord	= $('#order-name')
        var orderArray = [];
        orderJson = "";
        ajaxCookieUID(rand);
        orderArray['user'] = [apparel, avail, fabric, name, phone, email, team, sport, address, ship, n_new, s_notes, c_notes];
        for (var i = 1; i <= get_tr(); i++) {
            ord_name = $('#order-name-' + i).val();
            ord_numb = $('#order-number-' + i).val();
            ord_sel = $('#order-select-' + i).val();
            ord_com = $('#order-comment-' + i).val();
            if (ord_sel == 'Choose Size') {
                ord_sel = ''
            };
            var item = {
                "name": ord_name,
                "no": ord_numb,
                "sel": ord_sel,
                "com": ord_com
            };
            orderArray.push(item);
        };
        orderJson = JSON.stringify({
            orderArray: orderArray
        });
        //Ajax post order
        $.ajax({
            url: 'core/action.php',
            type: 'GET',
            dataType: 'text',
            data: {
                act: 'post_order',
                a: rand,
                b: orderArray['user'][0],
                c: orderArray['user'][1],
                d: orderArray['user'][2],
                e: orderArray['user'][3],
                f: orderArray['user'][4],
                g: orderArray['user'][5],
                h: orderArray['user'][6],
                i: orderArray['user'][7],
                j: orderArray['user'][8],
                k: orderArray['user'][9],
                l: orderArray['user'][10],
                m: orderArray['user'][11],
                n: orderArray['user'][12],
                o: orderJson,
                p: '',
                q: '',
                r: ''
            }
        })
            .done(function(data) {
                window.location.href = "?menu=order&order=continue";
            })
            .fail(function() {
                $('.info').dialog();
                $('.info').html(' Sorry, cannot procces your order, please try again with refresh your browser');
            });

        //End ajax

    } // end function post order
    //

    //Click input text
    $('.order-user input, .order-user textarea').change(function(event) {
        /* Act on the event */
        $(this).css({
            'border': '1px solid #999999',
            'color': 'black'
        });
    });
    //End click input text

    //More
    $('#order-more-btn').click(function(event) {
        $.ajax({
            url: 'content/order-more.php'

        }).done(function(data) {
            $('.order-choose table tbody').append(data);
            // scroll
            //
        });
        $('html, body').animate({
            scrollTop: $(document).height() - $(window).height() + 100
        }, 500, 'easeInOutExpo');
        return false;
    });


    //Submit OK
    $('.order-submit-finish a').click(function(event) {
        window.location.href = "index.php";
        return false;
    });
    //End OK

    //Submit order
    $('#order-submit').click(function(event) {
        /* Act on the event */


        link = $('#design-input-link').val();
        image = $('.design-thumbnail img').attr('id');
        com = $('#design-comments').val();
        id = $('#user-id').val();

        $.ajax({
            url: 'core/action.php',
            type: 'GET',
            dataType: 'text',
            data: {
                act: 'post_next',
                a: id,
                b: link,
                c: image,
                d: com
            },
        })
            .done(function() {
                window.location.href = "?menu=order&order=submit";
            })
            .fail(function() {
                $('.info').dialog();
                $('.info').html('Sorry, cannot procces your order, please try again with refresh your browser');
            });

        return false;
    });
    //End submit



    //Hover thumbnail 
    /*
    $('.design-thumbnail').hover(function() {
        var thumId = $('.design-thumbnail img').attr('src');
        if (thumId) {
            $('.btn-nav').fadeIn();
        }
    }, function() {
        $('.btn-nav').fadeOut();
    });
*/

    //End hover

    //Pop Up
    function popUp(id){
        if (id == null) {} else {
            TINY.box.show({
                iframe: 'content/hd-box.php?id=' + id + '',
                boxid: 'frameless',
                width: 800,
                height: 450,
                fixed: true,
                maskid: 'greyemask',
                maskopacity: 40
            });
        }
    }
    //End pop up

    //Navigator img
    //Front
    var imgURL = 'assets/img/house_design/';
    $('#img-front').click(function() {
        img = $('.design-thumbnail img').attr('id');
        $('.design-thumbnail img').attr('src', imgURL + img + '/a.JPG');
        return false;

    });

    //Back
    $('#img-back').click(function() {
        img = $('.design-thumbnail img').attr('id');
        //img_2 = img.replace('Front.JPG');
        $('.design-thumbnail img').attr('src', imgURL + img + '/b.JPG');
        return false;

    });
    //End vavigator img

    //Imd dropdown
    $('.img-dropdown').click(function() {
        $('.img-thumbnail').fadeIn();
        $('.design-house').removeClass('oveflowy');
    });
    //

    //Hover & change image

    $(document).on('click','.order-continue-hd-thumbnail .wrapper',function() {
        id = $(this).attr('id');
        img = $(this).attr('image');
        $('.order-continue-hd-image .img-1').attr({
            'id': id,
            'src': 'assets/img/house_design/' + img + ''
        });
        $('.order-continue-hd-image label').html($(this).attr('image').replace('.png',''));
        $('.order-continue-hd-thumbnail .wrapper').removeClass('thumbnail-active');
        $(this).addClass('thumbnail-active');
    });
    //

    //Upload continue
    $('#order-continue-file').live('change', function(event) {
        //$('.alert').fadeIn();
        $('.order-continue-artwork-upload').find('label').html('Upload more');
        $('#form-image').ajaxForm({
            target: '.order-continue-artwork-temp',
            beforeSend: function(event) {
                $('.order-continue-artwork-image').append('<div class="order-continue-artwork-image-wrapper prog"><progress value="0" max="100"></progress></div>')
            },
            uploadProgress: function(event, position, total, percentComplete) {
                $('progress').attr('value', percentComplete);
            },
            success: function(event) {
                val = $('#order-continue-artwork-image-upload').val();
                $('.prog').remove();
                $('.order-continue-artwork-image').append('<div class="order-continue-artwork-image-wrapper"><img class="order-continue-artwork-image-delete" src="assets/img/web/delete.png"><img class="order-continue-artwork-image-img" src="' + val + '"></div>');
                //$('.alert').hide();
            }
        }).submit();
    });
    $('.order-continue-artwork-image').hover(function() {
        $('.order-continue-artwork-image-delete').fadeIn();
    }, function() {
        $('.order-continue-artwork-image-delete').hide();
    });
    $(document).on('click', '.order-continue-artwork-image-delete', function(event) {
        $(this).parent().remove();
    });
    //End upload

    //Upload continue nd
    $('#order-continue-nd-check').on('change', function(event) {
        check = $(this).prop('checked');
        if (check) {
            $('.order-continue-nd-upload, .order-continue-nd-image').fadeIn();
        } else {
            $('.order-continue-nd-upload, .order-continue-nd-image').hide();
        }
    });
    $('#order-continue-nd-file').live('change', function(event) {
        $('.order-continue-nd-upload').find('label').html('Upload more');
        $('#form-nd').ajaxForm({
            target: '.order-continue-nd-temp',
            beforeSend: function(event) {
                $('.order-continue-nd-image').append('<div class="order-continue-nd-image-wrapper prog"><progress value="0" max="100"></progress></div>')
            },
            uploadProgress: function(event, position, total, percentComplete) {
                $('progress').attr('value', percentComplete);
            },
            success: function(event) {
                val = $('#order-continue-nd-image-upload').val();
                $('.order-continue-nd-image').append('<div class="order-continue-nd-image-wrapper"><img class="order-continue-nd-image-delete" src="assets/img/web/delete.png"><img class="order-continue-nd-image-img" src="' + val + '"></div>');
                $('.prog').remove();
            }
        }).submit();
    });
    $('.order-continue-nd-image, .order-continue-cd-img').hover(function() {
        $('.order-continue-nd-image-delete,.order-continue-cd-image-delete').fadeIn();
    }, function() {
        $('.order-continue-nd-image-delete').hide();
    });
    $(document).on('click', '.order-continue-nd-image-delete', function(event) {
        $(this).parent().remove();
    });
    //End upload nd

    //Back and next
    $('.btn-backward').click(function(event) {
        history.back(-1);
        return false;
    });
    $('.btn-submit').click(function(event) {
        window.location.href = '?menu=order&order=submit';
        return false;
    });
    //End back 

    //Select
    $('#order-continue-hd-select').click(function(){
        check = $('.thumbnail-active');
        img = check.attr('image');
        label = check.attr('title');
        id = check.attr('id');
        $('.order-continue-hd').prepend('<div class="order-continue-hd-wrapper"><img class="order-continue-hd-img" src="assets/img/house_design/'+img+'" id="'+id+'"><label>'+label+'</label><img class="order-continue-hd-image-delete order-continue-nd-image-delete" src="assets/img/web/delete.png"></div>');
        $('.order-continue-popup').hide();
        $('.order-continue-hd a').html('<div>Select more</div>');
        return false;
    });
    //End select

    $(document).on('mouseenter', '.order-continue-hd-wrapper', function(event) {
        $('.order-continue-hd-image-delete').fadeIn();
    });
    $(document).on('mouseleave', '.order-continue-hd-wrapper', function(event) {
        $('.order-continue-hd-image-delete').hide();
    });

    //Select design
    $('#order-continue-hd-popup').click(function(){
        $('.order-continue-popup').fadeIn();
        $('.inner-wrapper').html('');
        get_house_design(0, 14);
        return false;
    });

    $('.order-continue-popup').click(function(event) {
        if ($(event.target).is('.order-continue-popup')) {$(this).hide()};
    });
    //End select design

    //Pop up
    $(document).on('click','.order-continue-hd-wrapper img', function(){
        id = $(this).attr('id');
        popUp(id);
    });
    //End popup


    //Left and right
    $('.act').click(function(){
        act = $(this).attr('action');
        aksi(act);
    });
    //End left right

    //Function move left and right
    function move(act){
        wrapper = $('.inner-wrapper');
        off = wrapper.parent().offset().left - (wrapper.offset().left);
        if (act=="left") {
            if (off<8400) {
                wrapper.animate({left:'-=728'}, 1000);
            };
        }else if (act=="right") {
            if (off>0) {
                wrapper.animate({left:'+=728'}, 1000);
            };
        };
    }
    //End function

    //Page
    $('.ochp').click(function(){
        id = $(this).attr('id');
        limit = 14;
        $('.inner-wrapper').html('');
        $('.ochp').removeClass('page-active');
        $(this).addClass('page-active');
        get_house_design(id, limit)
    })
    function get_house_design(id,limit)
    {
        $.getJSON('core/action.php', {'act': 'get_house_design','a':(id*limit),'b':limit}, function(json, textStatus) {
            $.each(json, function(index, val) {
                 $('.inner-wrapper').append('<div class="wrapper" title="'+val.name+'" id="'+val.id+'" image="'+val.path+'"><img src="assets/img/house_design_small/'+val.name+'/a.JPG"></div>');
            });
        });
    }
    //End page
    //Start design
    $('#order-continue-cd-popup').click(function(event) {
    	$.cookie('get-design',true);
    });
    var designImage = $.cookie('designImage');
    $.getJSON('core/action.php', {'act': 'get_image'}, function(json) {
            $.each(json, function(index, val) {
                $('.order-continue-cd-img').prepend('<div class="order-continue-cd-wrapper"><img class="order-continue-cd-img" src="'+val+'"><img class="order-continue-cd-image-delete order-continue-nd-image-delete" src="assets/img/web/delete.png"></div>');
            });
    });
    //End design

    //Action
    function aksi(act){
        switch(act){
            case "right":
            {
                move("right");
                break;
            }
            case "left":
            {
                move("left");
                break;
            }
        }
    }
    //End action
var pos=1;
var bread = $('.bread-wrapper');
function breadCrumb(index){
    bread.children('.bread').removeClass('abu');
    for (var i = 0; i <= index; i++) {
        if (i>0&&i<=5) {
            bread.children('.bread').eq(i-1).addClass('abu');
        };
    };
}

//Function set tittle
function setTittle(){
	//Two
  	two = $.cookie('two');
  	$('.tittle-two').html(two);
  	//End two
 	//Three
  	three = $.cookie('three');
  	$('.tittle-three').html(three);
  	//End three
  	//Four
  	four = $.cookie('four');
  	$('.tittle-four').html(four);
  	//End four
   	//Four
  	five = $.cookie('five');
  	$('.tittle-five').html(five);
  	//End four
}
//End set tittle

//Step 
function stepTwo(id){
	$.ajax({
		url: 'core/action.php',
		type: 'GET',
		dataType: 'html',
		data: {'act': 'get_product_shop','a':id},
	})
	.done(function(data) {
		$('.sw2c-content .list').html(data);
        $('#shop-next').fadeOut();
	});
	
}
function stepThree(id){
	$.getJSON('core/action.php', {'act': 'get-fabric','a':id}, function(json, textStatus) {
		$.each(json, function(index, val) {
			 $('.three .list').append('<div class="fabric-wrapper cp bord rel" ident="'+val.price+'"><div class="fw-pict inline rel full-h">'+$('.shop-image .svg').html()+'</div><div class="fw-opt rel inline full-h"><div class="fw-price full-w abu ce rel">$ '+val.price+'</div><div class="fw-name full-w rel"><h3>'+val.cat_opt_name+'</h3>'+val.content+'</div></div></div>');
		});
	});
    $('#shop-next').fadeOut();
}
function stepFour(id){
	$.getJSON('core/action.php', {'act': 'get-option','a':id,'b':'options'}, function(json, textStatus) {
		$('.four .list').html('<div class="options-parent rel full-h full-w"></div>');
		$.each(json, function(index, val) {
			 $('.four .list .options-parent').append('<div class="options-wrapper inline cp bord rel" ident="'+val.cat_opt_id+'"><div class="ow-price abu ce inline rel full-w">$ '+val.price+'</div><div class="ow-opt pd5 rel ce inline full-w tab"><h2 class="full-w rel tabc">'+val.cat_opt_name+'</h2></div></div>');
		});
	});
    optArr = [];
    $('#shop-next').fadeOut();	
}
function stepFive(){
    $.cookie('options',optArr);
    $('.sw2-child-2').animate({'width':'69%'}, 'slow');
    $.getJSON('core/action.php', {'act': 'get-sizes'}, function(json, textStatus) {
        $('.sw2c-content .list').html('<div class="size-roster animated fadeInDown mrgt5 rel mrgl5"><input type="text" placeholder="Name" class="full-h text size-name bord inline mrgl5 pd5 "><input type="text" placeholder="Number" class="bord bord mrgl5 full-h text size-number inline pd5"><div class="bord size-select-wrapper ovh full-h inline rel mrgl5"><select class="size-select sel mrgl5 inline"></select></div><textarea class="full-h size-comment mrgl5 mrgr5 bord inline pd5" placeholder="Comments"></textarea><div class="size-add-wrapper abs"><img src="assets/img/web/plus.png" class="rel size-add cp"></div></div>');
        $.each(json, function(index, val) {
             $('.sw2c-content .list select').append('<option>'+val.sizes+'</option>');
        });
    });
}

//Toogle size

function rotateSize(el,deg){
    el.animate({borderSpacing: deg},{
        step:function(now){
            $(this).css({
                'transform': 'rotate('+now+'deg)',
                '-webkit-transform': 'rotate('+now+'deg)'
            });
        },
        duration:'slow'
    }, 'linear');
}

$(document).on('click', '.size-add-wrapper', function(event) {
    var _=$(this);
    var _c=_.parents('.size-roster').clone(true);
   var stat = _.attr('stat');
   var el = _.find('img');
   switch (stat) {
    case undefined:{
        _.attr('stat', 'close');
        rotateSize(el,45);
        console.log(_c);
        $('.sw2c-content .list').append(_c);
        break;
    }
    case 'close':{
        _.parents('.size-roster').addClass('fadeOutRight');
        $(_.parents('.size-roster')).one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){$(this).remove();});
        break;
    }
   }
});
//End toogle
/*
function addSizeQuantity(el){
    cText = el.find(':text').val();
    cText = Number(cText);
    count=++cText;
    el.find(':text').val(count);
}
//End step

//Add sizing
$(document).on('click','.size-add',function(event) {
    _=$(this).parents('.size-parent');
    addSizeQuantity(_);
});
//End sizing
*/

//Delete sizing
$(document).on('click', '.size-delete', function(event) {
   $(this).parents('.size-parent').addClass('animated bounceOutRight').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){$(this).remove();});
});
//End delete

//Check options && fabric
$(document).on('click', '.options-wrapper', function(event) {
	stat = $(this).attr('status');
    ident = $(this).attr('ident');
    if (stat!='check') {
    	$(this).children('.ow-opt').append('<img class="abs option-check" src="assets/img/web/check-grey.png">');
    	$(this).attr('status','check');
        optArr.push(ident);
    }else if(stat=='check'){
    	stat = $(this).attr('status','');
        pos = $.inArray(ident, optArr);
        optArr.splice(pos,1);        
    	$(this).find('img').remove();
    }
    $('#shop-next').fadeIn().css('display', 'table');
});

$(document).on('click', '.fabric-wrapper', function(event) {
	   	$('.fw-pict').find('img').remove();
   		$(this).find('.fw-pict').append('<img class="abs option-check" src="assets/img/web/check-grey.png">');
   		$(this).attr('state', '1');
        $('#shop-next').fadeIn().css('display', 'table');
});
//End check

//Input total
$(document).on('keyup', '.size-text', function(event) {
    var reg = /\d/;
    var text = $(this);
    $.each(text.val(), function(index, val) {
         if (!val.match(reg)) {
            text.val('');
         }
    });
});
//End total

//Hover svg out
$(document).on('mouseover', '.shop-image svg', function(event) {
	$(this).find('.fil0').css('fill', 'white');
});
//End hover

//List 
$(document).on('click', '.svg-wrapper', function(event) {
	$('.svg-wrapper svg .fil0').css('fill', 'white');
	$('.svg-wrapper').attr('stat','salah');
	$('.svg-wrapper svg .fil0').hover(function() {
		$(this).css('fill', '#999999');
	}, function(event) {
		if ($(this).parents('.svg-wrapper').attr('stat')=='salah') {
			$(this).css('fill', 'white');
		};
	});
    $('#shop-next').fadeIn().css('display', 'table');
	$(this).attr('stat','benar');
	$(this).find('svg .fil0').css('fill', '#999999');
	id = $(this).attr('ident');
	$('.shop-image').html($(this).find('.svg').clone(true));
	$('.shop-image').find('svg .fil0').css('fill', 'white');
	$.cookie('id3',id);
	$.cookie('three','Fabric');
	$.cookie('four','Options');
	$.cookie('five','Sizing & Quantity');
  	
});
//End list

 $('.shop-wrapper-2-content').load('content/shop-value.php #1',function(){
 });
 	//Breadcrumb
    $('#shop-next').click(function(){
        if (pos>0&&pos<5) {
            pos=++pos;
            breadCrumb(pos);
            if (pos==5) {
                $('.proggres').animate({'left':'+=34%'}, 1000);
            }else{
                $('.proggres').animate({'left':'+=17%'}, 1000);
            }
            $('.shop-wrapper-2-content').load('content/shop-value.php #'+pos,function(){
            	setTittle();
            	if (pos==2) {
            		id = $.cookie('id2');
            		stepTwo(id);
            	} else if (pos==3) {
            		id = $.cookie('id3');
            		stepThree(id);
            	} else if (pos==4){
            		id = $.cookie('id3');
            		stepFour(id);
            	} else if(pos==5){
            		id = $.cookie('id3');
            		stepFive();
            	}
            });
        };
        return false;
    });
    $('#shop-prev').click(function(event) {
        if (pos>1&&pos<6) {
            pos = --pos;
            breadCrumb(pos);
            if (pos==4) {
                $('.proggres').animate({'left':'+=-34%'}, 1000);
            }else{
                $('.proggres').animate({'left':'+=-17%'}, 1000);
            }
            $('.shop-wrapper-2-content').load('content/shop-value.php #'+pos,function(){
            	setTittle();
            	if (pos==2) {
            		id = $.cookie('id2');
            		stepTwo(id);
            	} else if (pos==3) {
            		id = $.cookie('id3');
            		stepThree(id);
            	} else if (pos==4){
            		id = $.cookie('id3');
            		stepFour(id);
            	} else if(pos==5){
            		id = $.cookie('id3');
            		stepFive(id);
            	}
            });
        };
        return false;
    });
    //End breadcrumb

    //Shop 1
    $(document).on('click','.sw2c-content .cat',function(event) {
    	name = $(this).attr('name');
    	id = $(this).attr('ident');
    	$('.sw2c-content .cat').removeClass('abu');
    	$(this).addClass('abu');
    	$.cookie('two',name);
    	$.cookie('id2',id);
        $('#shop-prev,#shop-next').fadeIn().css('display', 'table');
    	//$('.sw2-child-3 p').html(name);
    });
    //End shop 1

    //Add cart
    $('.btn-cart').click(function(event) {
        $.each(optArr, function(index, val) {
            
        });
        return false;
    });
    //End cart

}); //End ready