<style type="text/css">
@CHARSET "UTF-8";
#left_nav {
width:250px;
}
#body {
width:90%;
float:left;
margin:10px;
}
.accordion {
margin: 0;
padding:10px;
height:20px;
border:#f0f0f0 1px solid;
background: white;
font-family: "myFont";
text-decoration:none;
text-transform:uppercase;
color: #000;
font-size:1em;
cursor: pointer;
}
.accordion-open {
background:#999999;
color: #fff;
}
.accordion-open span {
display:block;
float:right;
padding:10px;
}
.accordion-open span {
background:url(assets/img/web/minus.png) center center no-repeat;
}
.accordion-close span {
display:block;
float:right;
background:url(assets/img/web/plus.png) center center no-repeat;
padding:10px;
}
div.container {
padding:0;
margin:0;
}
div.content {
background:white;
margin: 0;
padding:0px;
font-size:.9em;
line-height:1.5em;
font-family:"myFont";
}
div.content ul, div.content p {
padding:0;
margin:0;
padding:3px;
}
div.content ul li {
list-style-position:inside;
line-height:25px;
}
div.content ul li a {
color:#555555;
}
code {
overflow:auto;
}
</style>
<script type="text/javascript">
$(document).ready(function() {
$('#accordion').accordion({ icons: { "header": "ui-icon-plus", "activeHeader": "ui-icon-minus" } });
$('.accordion').accordion();
});
</script>
<div style="float: left; width: 100%; height: auto; margin: 0px 0px; ">
    <div style="float: left; width: 100%;">
        <div class="accordion" id="section1">BASIC JERSEY SLEEVED & SLEEVELESS, POLO & BAND COLLAR SHIRT<span></span></div>
        <div class="container">
            <div class="content">
                <?php include('sizes/basic-jersey-sleeved.htm') ?>
            </div>
        </div>
        <div class="accordion" id="section2">HOCKEY JERSEY<span></span></div>
        <div class="container">
            <div class="content">
                <?php include('sizes/hockey-jersey.htm') ?>
            </div>
        </div>
        <div class="accordion" id="section3">PAINTBALL JERSEY<span></span></div>
        <div class="container">
            <div class="content">
                <?php include('sizes/paintball-jersey.htm') ?>
            </div>
        </div>
        <div class="accordion" id="section9">MEN'S T-SHIRT<span></span></div>
        <div class="container">
            <div class="content">
                <?php include('sizes/men-tshirt.htm') ?>
            </div>
        </div>
        <div class="accordion" id="section4">PULLOVER AND HOODIE<span></span></div>
        <div class="container">
            <div class="content">
                <?php include('sizes/pullover-hoodie.htm') ?>
            </div>
        </div>
        <div class="accordion" id="section5">BASEBALL PANTS<span></span></div>
        <div class="container">
            <div class="content">
                <?php include('sizes/baseball-pants.htm') ?>
            </div>
        </div>
        <div class="accordion" id="section10">BASEBALL KNICKER<span></span></div>
        <div class="container">
            <div class="content">
                <?php include('sizes/baseball-kniker.htm') ?>
            </div>
        </div>
        <div class="accordion" id="section6">SOFTBALL PANTS (KNEE HIGH)<span></span></div>
        <div class="container">
            <div class="content">
                <?php include('sizes/softball-pants.htm') ?>
            </div>
        </div>
        <div class="accordion" id="section7">ARM BAND SLEEVES<span></span></div>
        <div class="container">
            <div class="content">
                <?php include('sizes/arm-band-sleeves.htm') ?>
            </div>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
    </div>
</div>