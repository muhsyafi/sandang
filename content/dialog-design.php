<ul class="tabs full-w full-h rel">
    <li class="tab-li"><input  name="tab-checked" checked="true"  type="radio" id="">
        <label class="trans">TEAM & SPORT</label>
        <div class="tab-content tab-3 pd5" id="tab-content-3">
            <label>Team Name</label><br><input type="text" name="" value="" class="text" id="tab-team" placeholder=""><br><br>
            <label>Sport Name</label><br><input type="text" name="" value="" class="text" id="tab-sport" placeholder="">
        </div>
    </li>
    <li class="tab-li"><input  name="tab-checked" type="radio" id="">
        <label class="trans">I HAVE MY ARTWORK</label>
        <div class="tab-content pd5" id="tab-content-1">
            <div class="tab-upload abs cp bord block ovh">
                <div class="tab-upload-btn btn full-w full-h">CHOOSE VECTOR FILE</div>
            </div>
            <div class="inline abs label-file"><p>Exp : *.cdr, *.ai, *.svg</p></div>
            <div class="rel artwork-link-wrapper">
                <input type="text" class="artwork-link  rel full-w font16 bord pd5" placeholder="Paste your link here, then press enter"> 
            </div>
            <div class="rel tab-upload-list">
                <ul></ul>
            </div>
        </div>
    </li>
    <li class="tab-li" id="tab-hd-li"><input name="tab-checked"  type="radio" id="tab-hd">
        <label class="trans">HOUSE DESIGN</label>
        <div class="tab-content tab-2 pd5" id="tab-content-2">
        <div class="order-continue-hd-image">
            <label></label>
            <img class="img-1 abs absc">
        </div>
        <img class="order-continue-hd-thumbnail-left act" action="right" src="assets/img/web/left.svg">
        <img class="order-continue-hd-thumbnail-right act" action="left" src="assets/img/web/right.svg">
        <div class="order-continue-hd-thumbnail">
            <div class="inner-wrapper">
            </div>
        </div>
        <div class="order-continue-hd-page abs">
            <ul class="abs ce absc">
<?php
include '../core/con.php';
$kueri = mysqli_query($link, "select count(*) as total from house_design_new");
$data = mysqli_fetch_assoc($kueri);
$data = ceil(($data['total']) / 13);
for ($i = 0; $i < $data; $i++) {

	echo "<li class='ochp inline' ident ='" . $i . "'>" . ($i + 1) . "</li>";
}?>
            </ul>
        </div>
        </div>
    </li>
    <li class="tab-li"><input  name="tab-checked" type="radio" id="">
        <label class="trans">NEW DESIGN</label>
        <div class="tab-content tab-3 pd5" id="tab-content-3">
            <textarea class="abs absc nd-textarea bord pd5" placeholder="Describe your design here"></textarea><br>
        </div>
    </li>
</ul>