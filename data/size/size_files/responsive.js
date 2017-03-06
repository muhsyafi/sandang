$(document).ready(function() { //Ready
    //Menu
    $('.menu-caret a').click(function(event) {
        cls = $(this).attr('class');
        if (cls == '') {
            $('.menu-caret img').css({
                '-webkit-transform': 'rotate(180deg)',
                '-moz-transform': 'rotate(180deg)'
            });
            $('.menu-primary ul').slideDown('1000', 'easeOutBounce', function() {
                $('.menu-caret a').addClass('menu-active');
            });
        } else {
            if (cls == 'menu-active') {
                $('.menu-caret img').css({
                    '-webkit-transform': 'rotate(0deg)',
                    '-moz-transform': 'rotate(0deg)'
                });
                $('.menu-primary ul').slideUp('1000', 'easeOutBounce', function() {
                    $('.menu-caret a').removeClass('menu-active');
                });
            };
        }
    });
    //Menu
    //Slide-content
    $('.slide-content-small a').hover(function() {
    	off=$(this).offset();
    	x=off.left;
    	y=off.top;
    	title=$(this).find('h4').html();
    	$('.tooltip').html(title).fadeIn().css({
    		'left': x,
    		'top': y
    	});;
    }, function() {
    	/* Stuff to do when the mouse leaves the element */
    });
    //End slide-content

    //Splash Gallery
    $('.contentImagesSmall img').click(function(event) {
    	eq=$(this).index();
    	src=$(this).attr('src');
        src=src.replace('home-gallery-small','home-gallery');
    	$('.splash').fadeIn();
    	$('.splash img').attr('src', src);
    });
    $('.splash').click(function(event) {
    	if (!$(event.target).is('img')) {
            $('.splash').fadeOut();
        };
    });
    //Swipe
    $('.splash img').click(function(event) {
        //$(this).animate({left:'100%'}, 100);
    });
    //End swipe
    //End splash
}); //End ready