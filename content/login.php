<script type="text/javascript">
	$.post('core/action-design.php', {'act': 'get-session'}, function(data, textStatus, xhr) {
	})
	.success(function(data){
		if (data=='1') {
			window.location.href='admin';
		} else {
			//window.location.href='?menu=login';
		};
	});
</script>
<style type="text/css">
	.login{
		width: 400px;
		height: auto;
		margin: 0 auto;
		background: #999999;
		text-align: center;
		padding-top: 20px;
	}
	#username,#password{
		width: 80%;
		margin: 10px;
		height: 32px;
		border: 2px solid #999999;
		padding:5px;
		font-size: 14px;
	}
	.login-cancel,.login-login{
		display: inline-block;
		vertical-align: top;
		zoom: 1; /* Fix for IE7 */
		*display: inline; /* Fix for IE7 */
		border: 2px solid white;
		margin-bottom: 20px;
		margin-top: 10px;
		background: #999999;
	}
</style>
<div class="login">
	<input type="text" class="user-text" id="username" placeholder="Username">
	<input type="password" class="user-text" id="password" placeholder="Password">
	<a href="#" class="login-cancel"><?php include 'assets/img/web/button/cancel.svg'?></a>
	<a href="#" class="login-login"><?php include 'assets/img/web/button/login.svg'?></a>
</div>
<script>
	$(document).ready(function() {
	$('.login-cancel').click(function(){
		$('#username,#password').val('');
	});
	$('.login-login').click(function(){
		loginBox();
		return false;
	});
	$('#password').keypress(function(event) {
		key=event.keyCode;
		if (key==13) {
			loginBox();
		};
	});
    function loginBox() {
        var user = $('#username').val();
        var pass = $('#password').val();
        if (user && pass) {
            loginUser(user, pass);
        } else {
            $('.user-text').filter(function(index) {
                return !this.value;
            }).css('border', '1px solid red');
        }
    }
    function loginUser(user, pass) {
        $.post('core/action-design.php', {
            'act': 'login',
            'a': user,
            'b': pass
        })
            .success(function(data) {
                if (data == 1) {
                	window.location.reload();
                } else {
                    $('.user-text').css('border', '1px solid red');
                }
            })
    }
	});
</script>