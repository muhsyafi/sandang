<script type="text/javascript" src="assets/js/fabric.min.js"></script>
<link rel="stylesheet" type="text/css" href="assets/css/design.css">
<link rel="stylesheet" href="assets/css/spectrum.css" type="text/css">
<div class="tooltip"></div>
<div class="design-container"><!-- container -->
	<div class="design-nav">
		<div id="design-slide"><div class="close"><img src="assets/img/web/delete.png"></div><div class="segitiga"><div class="segitiga-white"></div><div class="segitiga-block"></div></div><div id="design-slide-content"><img src="assets/img/web/preload.gif"></div></div>
		<div class="design-curve"><img src="assets/img/web/curve.png"></div>
		<ul>&nbsp;&nbsp;Choose Product
		<div class="design-curve"><img src="assets/img/web/curve.png"></div>
			<li class="li-product"><a id="produk" >Products</a></li>
		<!--	<li class="li-color"><a id="color" >Product Colors</a></li> -->
		</ul>
		<div class="design-curve"><img src="assets/img/web/curve.png"></div>
		<ul>&nbsp;&nbsp;Edit Artwork
		<div class="design-curve"><img src="assets/img/web/curve.png"></div>
			<li class="li-artwork"><a id="artwork" >Artwork</a></li>
			<div class="design-slide-artwork"><img src="assets/img/web/preload.gif"></div>
			<li class="li-text"><a id="text" >Add Text</a></li>
			<li class="li-image"><a id="image" >Upload Image</a></li>
<!--			<li class="li-name"><a id="name" >Name and Numbers</a></li> -->
		</ul>
		<div class="design-curve"><img src="assets/img/web/curve.png"></div>
		<ul>&nbsp;&nbsp;Finalize
		<div class="design-curve"><img src="assets/img/web/curve.png"></div>
			<li class="li-notes"><a id="notes" >Notes</a></li>
		</ul>
	</div>
	<div id="result-upload"></div>
	<div id="loader"><img src="assets/img/web/preload-2.gif"></div>
	<div class="design-area">
	<div class="get-design">Get this design<img src="assets/img/web/delete.png"></div>
	<div class="info"></div>
	<div class="box"><label>Username</label><input type="text" id="username" class="user-text" placeholder="Username"><label>Password</label><input type="password" class="user-text" id="password" placeholder="Password"><a class="btn" id="login-cancel">Cancel</a><a class="btn" id="login-login">Login</a></div>
	<div class="box-signup"><label>First Name</label><input type="text" class="signup-text" id="signup-first"><br><label>Last Name</label><input type="text" class="signup-text" id="signup-last"><br><label>Email Address</label><input type="text" class="signup-text" id="signup-email"><br><label>Your Password</label><input type="password" class="signup-text" id="signup-password"><br><label>Retype Password</label><input type="password" class="signup-text" id="signup-re-password"><a class="btn" id="signup-cancel">Cancel</a><a class="btn" id="signup-signup">Signup</a></div>
		<canvas id="paper" width="500" height="450"></canvas>
		<a href="#" class="t-up" judul="Show Toolbox"></a>
		<div id="design-toolbox">
			<a href="#"  class="ballon t-undo" judul="Undo your design"></a>
			<a href="#"  class="ballon t-redo" judul="Redo your design"></a>
			<a href="#"  class="ballon t-setting" judul="Your Account"></a>
			<a href="#"  class="ballon t-switch" judul="Switch to Back"></a>
			<a href="#"  class="ballon t-all" judul="Select All"></a>
			<a href="#"  class="ballon t-zoom-out" judul="Zoom Out"></a>
			<a href="#"  class="ballon t-zoom-in" judul="Zoom In"></a>
			<a href="#"  class="ballon t-pen" judul="Enter Draw Mode"></a>
			<a href="#"  class="ballon t-load" judul="Load Design"></a>
			<a href="#"  class="ballon t-save" judul="Save Design"></a>
			<a href="#"  class="ballon t-export" judul="Export to Image"></a>
			<a href="#"  class="ballon t-down" judul="Hide Toolbox"></a>
		</div>
		<div id="design-account">
			<ul><li action="login">Sign In</li><li action="logout">Sign Out</li><li action="signup">Sign Up</li></ul>
		</div>
		<div id="design-context-menu">
			<ul>
				<li action="color">Color :
					<input type="text" class="color">
				</li>
				<li action="front">To Front</li>
				<li action="back">To Back</li>
				<li action="delete">Delete</li>
				<li action="clear">Clear Canvas</li>
			</ul>
		</div>
	</div>
	<div class="design-prop">
		<div class="design-atribut"></div>
	</div>
	<div class="chat-show">
		<img src="assets/img/web/chat.png">
	</div>
	<div class="design-chat">
		<div class="chat-close">
			<img src="assets/img/web/delete.png">
		</div>
		<div class="chat-area">
		</div>
		<div class="chat-chat inline"><textarea placeholder="Type message here..."></textarea></div>
		<a href="#" class="chat-button inline btn">Send</a>
	</div>
</div><!-- end container -->
<script type="text/javascript" src="assets/js/jquery.ui.js"></script>
<script src="assets/js/spectrum.js"></script>
<script type="text/javascript" src="assets/js/iris.js"></script>
<script type="text/javascript" src="assets/js/canvas.js"></script>
<script type="text/javascript" src="assets/js/jquery.form.min.js"></script>
<script type="text/javascript" src="assets/js/design.js"></script>
