$(document).ready(function() { //Ready
    //Initial
    //$('#design-text').draggable();
    //End initial
    //Product
    $('#produk').click(function(event) {
        $('#design-slide').css({
            'height': '660px',
            'top': '0px'
        });
        $('#design-slide').children('.segitiga').css({'-webkit-transform': 'translate(-8px,60px)','-moz-transform': 'translate(-8px,60px)'});
        $('#design-slide #design-slide-content').html('<img src="assets/img/web/preload.gif">');
        $('#design-slide').removeClass().addClass('animated fadeInLeft').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(event) {
            $(this).removeClass();
            $(this).children('#design-slide-content').load('content/nav/design-product.php', function() {
                $(this).children('img').fadeOut();
            });
        }).fadeIn();
    });
    //End product


    //Artwork
    $('#artwork').click(function(event) {
        $('#design-slide').css({
            'height': '500px',
            'top': '0px'
        });
        $('#design-slide').children('.segitiga').css({
            '-webkit-transform': 'translate(-8px,160px)',
            '-moz-transform': 'translate(-8px,160px)'
        });
        $('#design-slide #design-slide-content').css({'overflow-y' :'scroll','height':'100%'}).html('<img src="assets/img/web/preload.gif">');
        $('#design-slide').removeClass().addClass('animated fadeInLeft').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend',
            function(event) {
                $(this).removeClass();
                $(this).children('#design-slide-content').load('content/nav/design-artwork.php', function() {
                    //$(this).children('img').fadeOut();
                });
            }).fadeIn();
    });
    //End Artwork

    //Slide click
    $('.design-nav').find('a').click(function(event) {
        $('#design-slide').css('z-index', '999');
    });
    //End slide click

    //Close slider
    $('.close').click(function(event) {
        $('#design-slide').hide();
    });
    //End close
    //End click background
    //Name
    $('#name').click(function(event) {
        $('#design-slide').css({
            'height': '450px',
            'top': '0px'
        });
        $('#design-slide').children('.segitiga').css({
            '-webkit-transform': 'translate(-8px,325px)',
            '-moz-transform': 'translate(-8px,325px)'
        });
        $('#design-slide #design-slide-content').html('<img src="assets/img/web/preload.gif">');
        $('#design-slide').removeClass().addClass('animated fadeInLeft').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend',
            function(event) {
                $(this).removeClass();
                $(this).children('#design-slide-content').load('content/nav/design-name.php', function() {
                    //$(this).children('img').fadeOut();
                });
            }).fadeIn();
    });
    //End Name
    //Notes
    $('#notes').click(function(event) {
        $('#design-slide').css({
            'height': '100px',
            'top': '290px'
        });
        $('#design-slide').children('.segitiga').css({
            '-webkit-transform': 'translate(-8px,45px)',
            '-moz-transform': 'translate(-8px,45px)'
        });
        $('#design-slide #design-slide-content').html('<img src="assets/img/web/preload.gif">');
        $('#design-slide').removeClass().addClass('animated fadeInLeft').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend',
            function(event) {
                $(this).removeClass();
                $(this).children('#design-slide-content').load('content/nav/design-notes.php', function() {
                    //$(this).children('img').fadeOut();
                });
            }).fadeIn();
    });
    //End notes
    //Upload image
    $('#image').click(function(event) {
        $('#design-slide').css({
            'height': '100px',
            'top': '200px'
        });
        $('#design-slide').children('.segitiga').css({
            '-webkit-transform': 'translate(-8px,35px)',
            '-moz-transform': 'translate(-8px,35px)'
        });
        $('#design-slide #design-slide-content').html('<img src="assets/img/web/preload.gif">');
        $('#design-slide').removeClass().addClass('animated fadeInLeft').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(event) {
            $(this).removeClass();
            $(this).children('#design-slide-content').load('content/nav/design-image.php', true, function() {
                $(this).children('img').fadeOut();
            });
        }).fadeIn();
    });
    //End upload image

    //Toolbox show
    $('.t-up').click(function(event) {
        $('#design-toolbox').addClass('animated bounceInUp').fadeIn().one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(event) {});
        $('.t-up').animate({
                'bottom': -25
            },
            100, function() {
                $(this).css('z-index', '-999');
            });
        return false;
    });
    //Toolbox hide
    $('.t-down').click(function(event) {
        $('#design-toolbox').removeClass().addClass('animated bounceOutDown').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(event) {
            $(this).fadeOut();
            $(this).removeClass();
        });
        $('.t-up').animate({
                'bottom': 0
            },
            100, function() {
                $(this).css('z-index', '999');
            });
        return false;
    });
    //Tooltip
    $('.ballon').hover(function(e) {
        tt = $(this).attr('judul');
        off = $(this).offset();
        w = $(this).width();
        x = off.left;
        y = off.top;
        $('.tooltip').fadeIn().html(tt).css({
            'left': x - w,
            'top': y - 130
        });;
    }, function() {
        $('.tooltip').hide();
    });
    //End tooltip
    //End toolbox
    //Send chat
    $('.chat-show img').click(function(){
        $('.design-chat').show();
        $('.chat-chat textarea').focus();
    });
    $('.chat-close img').click(function(event) {
        $('.design-chat').hide();
    });
    function sendChat(){
        msg=$('.chat-chat textarea').val();
        $.post('core/action-design.php', {'act':'msg','a':msg}, function(data, textStatus, xhr) {
        })
        .success(function(data){
            $('.chat-area').append('<div class="usr">'+msg+'</div>');
            $('.chat-chat textarea').val('');
            $('.chat-chat textarea').focus();
        })
        .fail(function(){
            $('.chat-area').append('<div class="usr" style="color:red">Failed</div>');
        });
    }
    $('.chat-button').click(function(){
        sendChat();
    });
    $('.chat-chat textarea').keypress(function(event) {
        key=event.keyCode;
        if (key==13) {
            sendChat();
        };
    });
    //End chat
}); //End ready