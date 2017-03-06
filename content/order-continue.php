<script type="text/javascript">
$(document).ready(function() {
$('#accordion').accordion({ icons: { "header": "ui-icon-plus", "activeHeader": "ui-icon-minus" } });
$('.accordion').accordion();
});
</script>
<!--<div class="alert"><div><img id="preload" src="assets/img/web/preload-2.gif"></div></div>-->
<div class="order-continue-popup">
    <div class="outer-wrapper">
        <div class="order-continue-hd-image">
            <label></label>
            <img class="img-1">
        </div>
        <img class="order-continue-hd-thumbnail-left act" action="right" src="assets/img/web/left.svg">
        <img class="order-continue-hd-thumbnail-right act" action="left" src="assets/img/web/right.svg">
        <div class="order-continue-hd-thumbnail">
            <div class="inner-wrapper">
            </div>
        </div>
        <div class="order-continue-hd-page abs">
            <ul>
<?php
$kueri = mysqli_query($link, "select count(*) as total from house_design_new");
$data = mysqli_fetch_assoc($kueri);
$data = ceil(($data['total']) / 14);
for ($i = 0; $i < $data; $i++) {

	echo "<li class='ochp' id ='" . $i . "'>" . ($i + 1) . "</li>";
}?>
            </ul>
        </div>
        <a href="#" class="btn" id="order-continue-hd-select"><div>Select</div></a>
    </div>
</div>
<div class="order-continue-wrapper">
    <h2>Custom Artwork</h2><br>
    <div style="float: left; width: 100%; margin-bottom:5px">
        <div class="accordion" id="section1">I HAVE MY ARTWORK<span></span></div>
        <div class="container">
            <div class="content">
                <div class="order-continue-artwork">
                    <div class="order-continue-artwork-image">
                    </div>
                    <div class="order-continue-artwork-temp"></div>
                    <div class="order-continue-artwork-upload">
                        <form name="form-image" enctype="multipart/form-data" id="form-image" method="post" action="core/upload-artwork.php">
                            <input name="image-artwork" type="file" id="order-continue-file"><label style="font-size:16px; line-height:2em">Upload</label>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="accordion" id="section2">HOUSE DESIGN<span></span></div>
        <div class="container">
            <div class="content">
                <div class="order-continue-hd">
                    <a href="#" class="btn" id="order-continue-hd-popup"><div>Select Design</div></a>
                </div>
            </div>
        </div>
        <div class="accordion" id="section3">NEW DESIGN<span></span></div>
        <div class="container">
            <div class="content">
                <div class="order-continue-nd">
                    <div class="checkbox"><label for="order-continue-nd-check" class="label-label">Upload your logos</label><input type="checkbox" id="order-continue-nd-check"><label class="label-check" for="order-continue-nd-check"></label></div>
                    <div class="order-continue-nd-temp"></div>
                    <div class="order-continue-nd-upload">
                        <div class="order-continue-nd-upload-form">
                            <form name="form-nd" enctype="multipart/form-data" id="form-nd" method="post" action="core/upload-nd.php">
                                <input name="image-nd" type="file" id="order-continue-nd-file"><label>Upload</label>
                            </form>
                        </div>
                    </div>
                    <div class="order-continue-nd-image">
                    </div>
                    <textarea id="order-continue-nd-text"></textarea>
                    <p>Please write a description of your design</p>
                </div>
            </div>
        </div>
<!--        <div class="accordion" id="section4">CREATE DESIGN<span></span></div>
        <div class="container">
            <div class="content">
                <div class="order-continue-cd">
                	<div class="order-continue-cd-img"></div>
                    <a href="?menu=design" class="btn" id="order-continue-cd-popup"><?php //include 'assets/img/web/button/design.svg'?></a>
                </div>
            </div>
        </div>
        -->
    </div>
    <a href="" class="btn btn-backward"><?php include 'assets/img/web/button/back.svg'?></a>
    <a href="" class="btn btn-submit"><?php include 'assets/img/web/button/submit.svg'?></a>
</div>