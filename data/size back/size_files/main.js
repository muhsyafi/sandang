$(document).ready(function() { // Ready
	var choose=null;
    var optArr,optNameArr;
    var mainPrice;
    var price=[];
    var dataPrice=[];
    var arrCart=[];
    var rand = Math.ceil(Math.random(1000000-0)*1000000);
    var customNameList=[];
    var frameDialog = $('.frame-wrapper');
    var kuki = $.cookie('cartcookie');
    if (kuki==1) {
        showCart();
    }
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

    //Function email validation
    function mailValidation(_this){
        var stat=false;
        var reg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        var isi = _this.val();
        reg.test(isi) ? stat=true : stat=false;
        return stat;

    }
    //End function

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
            'src': 'assets/img/house_design/' + img + '.png'
        });
        $('.order-continue-hd-image label').html($(this).attr('image').replace('.png',''));
        $('.order-continue-hd-thumbnail .wrapper').removeClass('thumbnail-active');
        $('.order-continue-hd-thumbnail .wrapper .thumbnail-check').remove();
        $(this).append('<img class="thumbnail-check abs absc" src="assets/img/web/check.png"></img>');
        $(this).addClass('thumbnail-active');
        $.cookie('hd-select-image',$('.img-1').attr('src'));
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
        $('.order-continue-hd').prepend('<div class="order-continue-hd-wrapper"><img class="order-continue-hd-img" src="assets/img/house_design/'+img+'.png" id="'+id+'"><label>'+label+'</label><img class="order-continue-hd-image-delete order-continue-nd-image-delete" src="assets/img/web/delete.png"></div>');
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
    $(document).on('click','.ochp',function(){
        id = $(this).attr('ident');
        limit = 13;
        $('.inner-wrapper').html('');
        $('.ochp').removeClass('page-active');
        $(this).addClass('page-active');
        get_house_design(id, limit)
    })
    function get_house_design(id,limit)
    {
        $.getJSON('core/action.php', {'act': 'get_house_design','a':(id*limit),'b':limit}, function(json, textStatus) {
            $('.inner-wrapper').html('');
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
        if (i>0&&i<=7) {
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
    $('.tittle-seven').html('FULL CUSTOM ORDER');

}
//End set tittle

//Get price
function pushPrice(price){
    dataPrice.push(price);
}
function getPrice(id,arr){
    $.getJSON('core/action.php', {'act': 'get-price','a':id}, function(json, textStatus) {
        var temp;
        $.each(json, function(index, val) {
            num = convNumber(val.price);
            pushPrice(num);
        });
        $('.price').html(dataPrice[0]);
        price.splice(0,1);
        price.push(dataPrice[0]);
    });
}
//End get price
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
        $('#shop-next').hide();
	});

}

function stepThree(id){
    var count=0;
	$.getJSON('core/action.php', {'act': 'get-fabric','a':id}, function(json, textStatus) {
        if (json!=null) {
            $.each(json, function(index, val) {
                 $('.three .list').append('<div class="fabric-wrapper cp bord rel" ident="'+val.price+'"><div class="fw-pict inline rel full-h">'+$('.shop-image .svg').html()+'</div><div class="fw-opt rel inline full-h"><div class="fw-price full-w abu ce rel">$ '+val.price+'</div><div class="fw-name full-w rel"><h3>'+val.cat_opt_name+'</h3>'+val.content+'</div></div></div>');
                 ++count;
            });
        }else{
            $('.three .list').append('<div class="fabric-wrapper-none cp pd5 rel"><h2>Fabric for this product is not available, <br> please click next button</h2></div>');
            $('#shop-next').show().css('display', 'table');
        }
	});
    $('#shop-next').hide();
}
function stepFour(id){
	$.getJSON('core/action.php', {'act': 'get-option','a':id,'b':'options'}, function(json, textStatus) {
		$('.four .list').html('<div class="options-parent rel full-h full-w"></div>');
        $('.four .list .options-parent').append('<div class="options-wrapper inline cp bord rel" price="-" ident="00"><div class="ow-price abu ce inline rel full-w">$ -</div><div class="ow-opt pd5 rel ce inline full-w tab"><h2 class="full-w rel tabc">Standard</h2></div></div>');
		$.each(json, function(index, val) {
			 $('.four .list .options-parent').append('<div class="options-wrapper inline cp bord rel" price ="'+val.price+'" ident="'+val.cat_opt_id+'" name-option="'+val.cat_opt_name+'"><div class="ow-price abu ce inline rel full-w">$ '+val.price+'</div><div class="ow-opt pd5 rel ce inline full-w tab"><h2 class="full-w rel tabc">'+val.cat_opt_name+'</h2></div></div>');
		});
	});
    optArr = [];
    optNameArr = [];
    $('#shop-next').hide();
}
function stepFive(){
    //$('.five div').load('content/dialog-design.php');
}
function stepSix(){
    var listUpload;
    $.cookie('options',optArr);
    mainPrice = convNumber($('.price').html());
    $('.sw2-child-2').css({'width':'100%'});
    $.getJSON('core/action.php', {'act': 'get-sizes'}, function(json, textStatus) {
        $('.sw2c-content .list').html('<div class="size-roster animated fadeInDown mrgt5 rel mrgl5" data-price="'+optArr+'" name-option="'+optNameArr+'"><input type="text" placeholder="Name" class="full-h text size-name bord inline mrgl5 pd5 "><input type="text" placeholder="Number" class="bord bord mrgl5 full-h text size-number inline pd5"><div class="bord size-select-wrapper ovh full-h inline rel mrgl5"><select class="size-select sel mrgl5 inline"></select></div><textarea class="full-h size-comment mrgl5 mrgr5 bord inline pd5" placeholder="Comments"></textarea><div class="size-add-wrapper trans abs"><img src="assets/img/web/plus.png" class="rel size-add cp"></div><div class="abs size-option full-h abs inline trans cp"><div class="full-h full-w abs _99 size-price">$<h1>'+mainPrice+'</h1></div><div class="abs down"></div></div></div>');
        $.each(json, function(index, val) {
             $('.sw2c-content .list select').append('<option value="'+val.price+'">'+val.sizes+'</option>');
        });
    });
    $('.shop-image .svg').hide();
    $('.btn-cart').show().css('display', 'table');
}

$(document).on('change', '.nd-textarea', function(event) {
    event.preventDefault();
    data = $(this).val();
    $.cookie('new-design',data);
});




//Toogle size
var tempPrice=0;
$(document).on('change','.size-select',function(event){
    _price = $(this).attr('value');
    _roster = $(this).parents('.size-roster');
    _rosterPrice = _roster.find('.size-price h1');
    _mainPrice = $('.price').html();
    _price = convNumber(_price);
    sumPrice(_mainPrice, (convNumber(_price)-(convNumber(tempPrice))));
    _rosterPrice.html(convNumber(_rosterPrice.html())-tempPrice+_price);
    tempPrice = _price;
});


function checkExt(val,arr){
    if ($.inArray(val,arr)==-1) {
        return false;
    } else{
        return true;
    };
}

//Shop design
$(document).on('click', '#tab-hd-li :radio', function(event) {
    get_house_design(0,13);
});
$(document).on('click','.tab-upload-btn',function(event){
    frameDialog.children('div').html('<div class="abs absc tab full-h full-w ovs"><div class="tabc bord rel ce tab-upload-content"><div class="rel tab-upload-file-wrapper bord ovh relc"><form name="tab-file" id="tab-file" action="core/upload-admin.php?path=../assets/files" method="post" enctype="multipart/form-data">'+
                    '<label class="abs abu">UPLOAD</label>'+
                    '<input type="file" name="gambar" id="tab-upload-file" class="cp">'+
                '</form></div></div></div> ');
    frameDialog.find('.frame-content').css({'height':200,'width':400});
    frameDialog.fadeIn();
});
var numbUp=0;
var arrDesign=[];
$(document).on('change','#tab-upload-file',function(event) {
    numbUp++;
    val = $(this).val().split('.').pop().toLowerCase();
    arr = ['cdr','ai','drw','cgm','svg','cdrw'];
    if (checkExt(val,arr)) {
        file = $(this).val().split('\\');
        file = file.pop();
        var strTemp=file;
        for (var i = 0; i < file.length; i++) {
            strTemp = strTemp.replace('.','');
            file[i]==' ' ? strTemp = strTemp.replace(' ',''):{};
        };
        var id=strTemp;
        $('#tab-file').ajaxForm({
            beforeSend: function(event) {
                $('.tab-upload-content').append('<div class="rel tab-upload-file-list inline bord" id="'+id+numbUp+'"><progress value="0" max="100"></progress><img src="assets/img/web/cancel.png"></div>');
            },
            uploadProgress: function(event, position, total, percentComplete) {
                $('.tab-upload-content progress').attr('value', percentComplete);
            },
            success: function(event) {
                $('progress').remove();
                $('#'+id+numbUp+'').append(file);
                arrDesign.push(event);
                $.cookie('my-artwork',arrDesign);
                $('.tab-upload-list ul').append('<li data="'+event+'" id='+id+numbUp+'>'+file+'</li>');
                //$('.tab-upload').append('<div class="order-continue-nd-image-wrapper abs full-h full-w"><img class="order-image-delete cp no _99 abs" src="assets/img/web/delete.png"><img class="order-continue-nd-image-img" src="' + event + '"></div>');
            }
        }).submit();
    } else{
        alert('Please choose vector file');
    };
});
$(document).on('click', '.tab-upload-file-list img', function(event) {
    $(this).parent('.tab-upload-file-list').hide();
    idLabel = $(this).parent('.tab-upload-file-list').attr('id');
    $('.tab-upload-list').find('#'+idLabel).remove();
});
$(document).on('keypress','.artwork-link',function(event) {
    key = event.keyCode;
    if (key==13) {
        val = $(this).val();
        if (val!='') {
            $('.tab-upload-list ul').append('<li data="'+val+'">'+val+'</li>');
            arrDesign.push(val);
            $.cookie('my-artwork',arrDesign);
            $(this).val('').focus();
        };
    };
});
$(document).on('click', '.order-image-delete', function(event) {
   $('.order-continue-nd-image-wrapper').hide();
   $('#tab-picture').show();
});
//Oke
$(document).on('click', '.tab-ok', function(event) {
    var img = $.cookie('hd-select-image');
    $('.shop-design').fadeOut();
    $('.shop-image').append('<img src="'+img+'" class="abs full-w absc cp">');
    frameDialog.fadeOut();
});

//Esc
$(document).keydown(function(event) {
    if (event.keyCode==27) {
        frameDialog.fadeOut();
    };
});
$(document).on('click', '.frame-wrapper', function(event) {
    if (!$(event.target).is($('.frame-wrapper').find('*'))) {
        frameDialog.fadeOut();
    };
});
//End shop

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

function sumPrice(a,b){
	$('.price').html(convNumber(a)+convNumber(b));
}
function divPrice(a,b){
	$('.price').html(convNumber(a)-convNumber(b));
}
$(document).on('click', '.size-add-wrapper', function(event) {
    var _=$(this);
    var _c=_.parents('.size-roster').clone(true);
    var _price = _.parents('.size-roster').find('h1').html();
    var _mainPrice = $('.price').html();
   var stat = _.attr('stat');
   var el = _.find('img');
   switch (stat) {
    case undefined:{
        _.attr('stat', 'close');
        rotateSize(el,45);
        $('.sw2c-content .list').append(_c);
        tot = $('.sw2c-content .list').children().last().index();
        tot = Number(tot+1);
        sumPrice(_mainPrice,_price);
        break;
    }
    case 'close':{
        _.parents('.size-roster').addClass('fadeOutRight');
        divPrice(_mainPrice,_price);
        $(_.parents('.size-roster')).one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){$(this).remove();});
        break;
    }
   }
});
//Function get opt
function getOpt(id,elem){
	$('.size-option-popup').prepend('<table width="100%" height="auto" cellpadding="0" cellspacing="0" border="0"></table>');
	$.getJSON('core/action.php', {'act': 'get-option','a':id,'b':'options'}, function(json, textStatus) {
		$.each(json, function(index, val) {
			$('.size-option-popup table').append('<tr id="check-'+val.cat_opt_id+'"><td><input id="'+val.cat_opt_id+'" type="checkbox" name="check" class="opt-check"></td><td><label>'+val.cat_opt_name+'</label></td><td>$&nbsp;<label>'+val.price+'</label></td></tr>');
		});
	})
	.done(function(){
        for (sat in elem.parents('.size-roster').attr('data-price')) {
            val=elem.parents('.size-roster').attr('data-price')[sat]=',' ? elem.parents('.size-roster').attr('data-price')[sat].replace(',',''):{};
            $('#check-'+val+' :checkbox').attr('checked', 'true');    
        }
	});
}
//End function

//Function cek value
function cekValue(cl){
    if (!cl.val()) {
        cl.filter(function(index) {
            return !this.value;
        }).css('border', '2px solid red');;
    };
}
//End function

var optCeck = '<div class="abs bord size-option-popup _99 bord"><div class="btn rel cp"><div>OK</div></div></div>';
var _roster;
$(document).on('click', '.down', function(event) {
	_roster = $(this).parents('.size-roster');
	$('.size-option-popup').remove();
    ros = $(this).parents('.size-roster');
    wrap = $('.shop-wrapper-2').offset();
    _ = $(this).offset();
    id = ros.index();
    y = _.top;
    y = y - wrap.top -15;
    x = _.left;
    x = x - wrap.left+8;
    id = $.cookie('id3');
    $('.shop-wrapper-2').append(optCeck);
    getOpt(id,$(this));
    $('.size-option-popup').css({'left':x-($('.size-option-popup').width()/2),'top':y+40});
});

$(document).click(function(event) {
	if (!$(event.target).is('.down, .size-option-popup, .size-option-popup *')) {
		$('.size-option-popup').remove();
	};
});

$(document).on('click', '.size-option-popup :checkbox', function(event) {
	_rosterPrice = _roster.find('.size-price h1');
	_c = $(this).parents('tr');
	_price = _c.children('td').last().find('label').html();
    _mainPrice = $('.price').html();
	_price = convNumber(_price);
    var listOption=[];
    var nameOption=[];
    $.each($('.size-option-popup').find('tr'), function(index, val) {
        if ($(val).find(':checkbox').prop('checked')) {
            _id=$(val).attr('id').replace('check-','');
            _name=$(val).find('label').html();
            nameOption.push(_name);
            listOption.push(_id);
        }; 
    });
    _roster.attr('data-price', listOption);
    _roster.attr('name-option', nameOption);
	if ($(this).prop('checked')) {
        sumPrice(_mainPrice, _price);
		_rosterPrice.html(convNumber(_rosterPrice.html())+_price);
	}else{
        divPrice(_mainPrice, _price);
		_rosterPrice.html(convNumber(_rosterPrice.html())-_price);
	}

});

var optArrMore=[];
$(document).on('click', '.size-option-popup .btn', function(event) {
	$(this).parents('.size-option-popup').remove();;
	obj = $('.size-option-popup :checkbox');
	optArrMore=[];
	$.each(obj, function(index, val) {
		 if (val.checked) {
		 	id = val.id;
		 	optArrMore.push(id);
		 };
	});
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

function totalPrice(p){
   var tot = p.reduce(function(a,b) {
        return a+b;
    },0);
   $('.price').html(tot);
}

//Delete sizing
$(document).on('click', '.size-delete', function(event) {
   $(this).parents('.size-parent').addClass('animated bounceOutRight').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){$(this).remove();});
});
//End delete

$(document).on('keyup', '#tab-team', function(event) {
    val = $(this).val();
    $.cookie('team-name',val);
});
$(document).on('keyup', '#tab-sport', function(event) {
    val = $(this).val();
    $.cookie('sport-name',val);
});

//Check options && fabric
$(document).on('click', '.options-wrapper', function(event) {
	stat = $(this).attr('status');
    ident = $(this).attr('ident');
    name_option = $(this).attr('name-option');
    price_temp = $(this).attr('price');
    price_temp = convNumber(price_temp);
    if (stat!='check') {
    	$(this).children('.ow-opt').append('<img class="abs option-check" src="assets/img/web/check-grey.png">');
    	$(this).attr('status','check');
    	optArr.push(ident);
        optNameArr.push(name_option);
        price.push(price_temp);
        totalPrice(price);
    }else if(stat=='check'){
    	stat = $(this).attr('status','');
        posOpt = $.inArray(ident, optArr);
        optArr.splice(posOpt,1);
        posOptName = $.inArray(name_option, optNameArr);
        optNameArr.splice(posOptName,1);
        pos = $.inArray(price_temp, price);
        price.splice(pos,1);
        totalPrice(price);
    	$(this).find('img').remove();
    }
    $('#shop-next').show().css('display', 'table');
});

function convNumber(num){
    num = Number(num);
    if (num) {
        return num;
    } else{
        return 0;
    };
}
var stat = false;
$(document).on('click', '.fabric-wrapper', function(event) {
        temp_price = $(this).attr('ident');
        //pos = $.inArray(convNumber(temp_price), price);
        if (stat) {
            price.splice(price.length-1,1);
        };
        price.push(convNumber(temp_price));
        totalPrice(price);
        stat = true;
	   	$('.fw-pict').find('img').remove();
   		$(this).find('.fw-pict').append('<img class="abs option-check" src="assets/img/web/check-grey.png">');
   		$(this).attr('state', '1');
        $('#shop-next').show().css('display', 'table');
        $.cookie('labelFabric',$(this).find('h3').html());
});
//End check


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
    $('#shop-next').show().css('display', 'table');
	$(this).attr('stat','benar');
	$(this).find('svg .fil0').css('fill', '#999999');
	id = $(this).attr('ident');
    getPrice(id,dataPrice);
	$('.shop-image').html($(this).find('.svg').clone(true));
	$('.shop-image').find('svg .fil0').css('fill', 'white');
    $.cookie('labelSvg',$(this).find('.label .tabc').html());
	$.cookie('id3',id);
	$.cookie('three','Fabric');
	$.cookie('four','Options');
	$.cookie('five','Sizing & Quantity');

});
//End list

//Step seven
function stepSeven(){
    $.each(customNameList, function(index, val) {
         
    });
}
//End six

 $('.shop-wrapper-2-content').load('content/shop-value.php #1',function(){
 });
 	//Breadcrumb
    $('#shop-next').click(function(){
        var bread;
        var custom = $.cookie('custom');
        custom=='yes' ? bread = 7 : bread = 6;
        if (pos>0&&pos<bread) {
            pos=++pos;
            breadCrumb(pos);
            if (pos==bread) {
                custom=='yes' ? $('.proggres').animate({'left':'+=31%'}, 1000) : $('.proggres').animate({'left':'+=31%'}, 1000);
            }else{
                custom=='yes' ? $('.proggres').animate({'left':'+=13%'}, 1000) :  $('.proggres').animate({'left':'+=15%'}, 1000);
            }
            if (pos==7) {
                customNameList=[];
                $.each($('.size-roster'), function(index, val) {
                     customNameList.push($(val).find('.size-name').val());
                });
            };
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
            	} else if (pos==6) {
                    id = $.cookie('id3');
                    stepSix();
                } else if (pos==7) {
                    stepSeven();
                };
            });
        };
        return false;
    });
    $('#shop-prev').click(function(event) {
        var custom = $.cookie('custom');
        var bread;
        custom=='yes' ? bread = 7 : bread = 6;
        if (pos>1&&pos<=bread) {
            pos = --pos;
            breadCrumb(pos);
            if (pos==(bread-1)) {
                $('.proggres').animate({'left':'+=-31%'}, 1000);
            }else{
               custom == 'yes' ? $('.proggres').animate({'left':'+=-13%'}, 1000) : $('.proggres').animate({'left':'+=-15%'}, 1000);
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
                } else if(pos==6){
            		id = $.cookie('id3');
            		stepSix(id);
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
        arrCart=[];
        var arrTemp = {'name':name,'id':id};
        arrCart.push(arrTemp);
        $.cookie('arrcart',JSON.stringify(arrCart));
        $('#shop-prev,#shop-next').show().css('display', 'table');
        if (id==3||id==5) {
            $.cookie('custom','yes');
            $('.bread-wrapper .custom').show();
            $('.bread').addClass('custom-bread');
        }else{
            $.cookie('custom','no');
            $('.bread').removeClass('custom-bread');
            $('.bread-wrapper .custom').hide();
        }
    	//$('.sw2-child-3 p').html(name);
    });
    //End shop 1
        //$('.primary-menu').append('<div class="abs cart-icon cp animated bounceIn"><img src="assets/img/web/cart.png" class="rel full-w full-h"></div>');
    //Add cart
    //$('.primary-menu').append('<div class="abs cart-icon cp animated bounceIn"><img src="assets/img/web/cart.png" class="rel full-w full-h"></div>');
    var cartArr=[];
    if ($.cookie('cart')!=undefined && $.cookie('cart')!='') {
        cartArr=JSON.parse($.cookie('cart'));
    }
    $('.btn-cart').click(function(event) {
        cart()
        return false;
    });
    //End cart
    var custom;

    function saveCustomList()
    {
        $.each('.custom-list li', function(index, val) {
             file = $(val).attr('file');
             console.log(file);
        });
    }

    function cart(){
        custom = $.cookie('custom');
        saveCustomList();
        var sixList=[];
        var rosterList=[];
        cookieArtwork = $.cookie('my-artwork');
        cookieHd = $.cookie('hd-select-image');
        cookieNd = $.cookie('new-design');
        product = $.cookie('id2');
        productDetailName = $.cookie('labelSvg');
        count = (Number($('.size-roster').last().index())+1);
        $.cookie('cartcookie','1');
        var productName;
        var id;
        $.each(JSON.parse($.cookie('arrcart')), function(index, val) {
             productName=val.name;
             id=val.id;
        });
        $.each($('.size-roster'), function(index, val) {
            rosterList.push({
                    'name'      : $(this).find('.size-name').val(),
                    'number'    : $(this).find('.size-number').val(),
                    'options'   : $(this).attr('name-option'),
                    'size'      : $(this).find('.size-select option:selected').text(),
                    'comments'  : $(this).find('.size-comment').val(),
                    'price'     : $(this).find('.size-price h1').html()
                });
        });
        cartArr.push({
            'id'        :id,
            'category'  :productName,
            'product'   :productDetailName,
            'qty'       :count,
            'price'     :Number($('.price').html()),
            'team'      :$.cookie('team-name'),
            'sport'     :$.cookie('sport-name'),
            'artwork'   :$.cookie('my-artwork'),
            'image'     :$.cookie('hd-select-image'),
            'design'    :$.cookie('new-design'),
            'detail'    :rosterList
        });
        $.cookie('cart',JSON.stringify(cartArr));
        showCart();
    }
    function showCart(){
        $('.primary-menu').append('<div class="abs cart-icon cp animated bounceIn"><img src="assets/img/web/cart.png" class="rel full-w full-h"></div>');
    }

    //Cart icon
    $(document).on('click', '.cart-icon img', function(event) {
        event.preventDefault();
        $('.pop-cart').remove();
        var domPopCart='<div class="abs bord pop-cart"><div class="content rel full-w pd5"><table border="0" cellpadding="0" cellspacing="0" width="100%"><tr>'+
        '<td>Category Product</td><td>Product Name</td><td>QTY</td><td align="right">Total Price</td></tr></table>'+
        '</div><div class="cart-icon-button full-w rel"><div class="btn rel cp inline cart-clear">CLEAR</div><div class="btn rel cp cart-chek-out inline">CHECK OUT</div></div></div>';
        $(this).parent().append(domPopCart);
        //arrCart.push({'detail':productDetailName,'price':mainPrice});
        $.each(JSON.parse($.cookie('cart')), function(index, val) {
             $('.pop-cart .content table').append('<tr><td>'+val.category+'</td><td>'+val.product+'</td><td>'+val.qty+'</td><td align="right">'+'$'+val.price+'</td></tr>');           
        });

    });
$(document).click(function(event) {
    if (!$(event.target).is('.cart-icon, .cart-icon img, .pop-cart, .pop-cart *')) {
        $('.pop-cart').remove();
    };
});

$(document).on('click', '#tab-1 #btn-login', function(event) {
    _user = $('#username');
    _pass = $('#password');
    cekValue(_user);cekValue(_pass);
    if (_user.val()&&_pass.val()) {
        $.post('core/action-design.php',{'act':'login','a':_user.val(),'b':_pass.val()}, function(data) {
            data==1 ? $('#rad-2').prop('checked', true) : $('#username,#password').css('border', '2px solid red');
        });
    };
});

$(document).on('click', '#btn-cancel', function(event) {
    frameDialog.fadeOut();
});

$(document).on('click', '.cart-chek-out', function(event) {
    event.preventDefault();
    $('.pop-cart').remove();
    frameDialog.children('div').css({
        'height': '500px',
        'width': '900px'
    }).html('');
    frameDialog.children('div').load('content/check-out.php',function(event){
        $('#rad-1').prop('checked',true);
        $('.tab-checkout li > :radio').attr('disabled', true);
    });
    frameDialog.fadeIn();
});

$(document).on('click', '.cart-clear', function(event) {
    event.preventDefault();
    $.cookie('cartcookie',0);
    $.cookie('cart','');
    $(this).parent().find('table').remove();
    $('.cart-icon').remove();

});
$(document).on('keypress', '.important', function(event) {
    $(this).css('border', '2px solid #999999');
});
var cBillingInformation=[];
$(document).on('click', '#btn-check-out-2', function(event) {
    var stat=false;
    cBillingInformation=[];
    text = $('#tab-2 :text');
    $.each(text, function(i,v) {
        val     =$(this).val();
        label   =$(this).parent().find('h4').html().replace('<sup>*</sup>',''); 
        var item = {
            'lab' : label, 
            'cont' : val
        }
         cBillingInformation.push(item);

    });
    cl = $('#tab-2 .important');
    $.each(cl, function(index, val) {
        cekValue($(this));
        $(this).val()!='' ? stat = true : stat = false;    
        });
    if (stat) {
        $('#cart-radio-shiping-2').prop('checked') ? $('#rad-3').prop('checked',true) : $('#rad-4').prop('checked',true);
    };

});

cShippingInformation=[];
$(document).on('click', '#btn-check-out-3', function(event) {
    event.preventDefault();
    text = $('#tab-3 :text');
    $.each(text, function(index, val) {
        val     =$(this).val();
        label   =$(this).parent().find('h4').html().replace('<sup>*</sup>',''); 
        var item = {
            'cont'   : val,
            'lab'     : label
        }
         cShippingInformation.push(item);
    });
    cl = $('#tab-3 .important');
    $.each(cl, function(index, val) {
        cekValue($(this));
        $(this).val()!='' ? stat = true : stat = false;    
        });
    if (stat) {
        $('#rad-4').prop('checked',true);
    };
});
var cShippingMethod=[];
var cEndInformation=[];
$(document).on('click', '#btn-check-out-4', function(event) {
    event.preventDefault();
    cShippingMethod.push($('#shiping-method').val());
    cShippingMethod.push($('#client-notes').val());
    if (cShippingInformation[0]==undefined) {
        cEndInformation=cBillingInformation;
    } else{
        cEndInformation=cShippingInformation;
    };
    //cEndInformation.push(cShippingMethod);
    $('#tab-6').find('#table-2').append('<tr>'+
                                               '<td class="vac" colspan=2>Shipping To :</td>'+
                                               '</tr>');
    $.each(cEndInformation, function(i,v) {
        $('#tab-6').find('#table-2').append('<tr>'+
                                               '<td class="vac">'+v.lab+'</td><td class="vac userval">'+v.cont+'</td>'+
                                               '</tr>');
    });
    function shipingMethod(str){
        $('#tab-6').find('#table-2').append('<tr>'+
                                               '<td class="vac">Shipping Method</td><td class="vac userval">'+str+'</td>'+
                                               '</tr>');
        $('#tab-6').find('#table-2').append('<tr>'+
                                               '<td class="vac">Clients Notes</td><td class="vac userval">'+$('#client-notes').val()+'</td>'+
                                               '</tr>');
    };
    function dispProduct(){
        //Load order cookie
        var endProductName = $.cookie('two')+' '+$.cookie('labelSvg'); 
        var endCount = convNumber($('.size-roster').last().index())+1;
        var endPrice = convNumber($('.price').html());
        $('#tab-6').find('#table-1').append('<tr><td style="height:40px" class="up vac">'+endProductName+'</td>'+
                                                '<td style="height:40px" class="ce vac">'+endPrice+'</td>'+
                                                '<td style="height:40px" class="ce vac">'+endCount+'</td>'+
                                                '<td style="height:40px" class="ce vac">'+endPrice+'</td>'+
                                             '</tr><tr><td colspan="8" class="bordt">&nbsp;</td></tr>');
    };
        //End load order
        if ($('#shiping-method-expedite').prop('checked')) {
            if ($('#shiping-method-expedite-text').val()) {
                $('#rad-6').prop('checked', true);
                dispProduct();
                shipingMethod('Expedite : '+$('#shiping-method-expedite-text').val());
            } else{
                cekValue($('#shiping-method-expedite-text'));
            };
        } else {
            $('#rad-6').prop('checked', true);
            dispProduct();
            shipingMethod('Regular');
        }
});

$(document).on('click', '#btn-check-out-5', function(event) {
    var roster = $('.size-roster');
    var id = Math.floor(Math.random() * 10000) + 1;
    $.cookie('mail',$('.userval').eq(3).html());
    $.cookie('id',id);
    var userval = {
        'act':'save-order',
        'a':id,
        'b':$.cookie('two'),
        'c':$.cookie('labelSvg'),
        'd':$.cookie('labelFabric'),
        'e':$('.userval').eq(0).html()+' '+$('.userval').eq(1).html(),
        'f':$('.userval').eq(9).html(),
        'g':$('.userval').eq(3).html(),
        'h':$.cookie('team-name'),
        'i':$.cookie('sport-name'),
        'j':$('.userval').eq(4).html()+','+$('.userval').eq(5).html()+','+$('.userval').eq(6).html()+','+$('.userval').eq(7).html()+','+$('.userval').eq(8).html(),
        'k':$('.userval').eq(11).html(),
        'l':$('.userval').eq(12).html(),
        'm':$.cookie('my-artwork'),
        'n':$.cookie('hd-select-image')
    }
    $.post('core/action-design.php', userval, function(data, textStatus, xhr) {
    })
    .success(function(data){
        $.each(roster, function(index, val) {
             var name = $(this).find('.size-name').val();
             var number = $(this).find('.size-number').val();
             var options = $(this).attr('name-option');
             var size = $(this).find('.size-select option:selected').text();
             var comments = $(this).find('.size-comment').val();
             var price = $(this).find('.size-price h1').html();
             $.post('core/action-design.php', {'act': 'save-order-detail','a':id,'b':name,'c':number,'d':size,'e':options,'f':comments,'g':price,'h':''}, function(data, textStatus, xhr) {
             })
             .success(function(data){
                if (data=='1') {
                    $.get('core/mail.php',{'id':id,'mail':$('.userval').eq(3).html()}, function(hasil) {   
                    });
                    $('.checkout-content').html('<div class="rel success-order full-w"><h1>Your order in process, check your email</h1><br><a class="btn" href="?menu=home"><span>Oke</span></a></div>');
                    $.cookie('cartcookie','0');
                    $('.cart-icon').hide();
                } else {
                    alert("Cannot process your order, please try again");
                    window.location.reload();
                };
             })
             .fail(function(data){
                alert("Cannot process your order, please try again");
                window.location.reload();
             })
        });
    })
    .fail(function(data){
        alert("Cannot process your order, please try again");
        window.location.reload();        
    })
});

$(document).on('keyup', '#tab-2 #email', function(event) {
    var _this = $(this);
    if (mailValidation(_this)) {
        _this.css('border', '2px solid #999999');
    }else{
        _this.css('border', '2px solid red');
    }
});
$(document).on('click', '#btn-guest', function(event) {
    event.preventDefault();
    $('#rad-2').prop('checked', true);
});
    //End cart icon

$(document).on('click', '.shiping-method', function(event) {
    var _ = $(this);
    if (_.attr('id')=='shiping-method-expedite') {$('#shiping-method-expedite-text').show();} else{$('#shiping-method-expedite-text').hide();};
});

$(document).on('click', '#btn-check-out-reset', function(event) {
    event.preventDefault();
    frameDialog.hide();
    $('.cart-icon').remove();
    window.location.reload();
});
//Upload logo on custom
$(document).on('change', '.custom-file', function(event) {
    var _=$(this).parents('.list-upload');
    arr = ['cdr','ai','drw','cgm','svg','cdrw'];
    val = $(this).val().split('.').pop().toLowerCase();
    if (checkExt(val, arr)) {
         $('#form-file').ajaxForm({
            beforeSend: function(event) {
                _.find('.custom-upload').append('<progress value="0" max="100"></progress>');
            },
            uploadProgress: function(event, position, total, percentComplete) {
                _.find('progress').attr('value', percentComplete);
            },
            success: function(event) {
                _.find('progress').remove();
                _.find('label').html(event.split('/').pop());
                _.find('form').remove();
                _.attr('file', event);
            }
        }).submit();       
     }else{
        alert('Please choose vector file');
     }

});
//End upload

//Show option
$(document).on('click', '#other-shirts', function(event) {
    var stat = $(this).attr('stat');
    if (stat!='yes') {
        $(this).attr('stat', 'yes');
        $('.custom-select').show().html('');
        $.each(customNameList, function(index, val) {
            $('.custom-select').append('<option value="'+val+'">'+val+'</option>');
        });
    }else if (stat=='yes') {
        $(this).attr('stat', 'no');
        $('.custom-select').hide();
    }
});
//End show

}); //End ready
