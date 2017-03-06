<?php
session_start();
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
require_once '../core/con.php';
?>
<div id="1" class="sw2-child">
	<div class="inline full-h sw2-child-1"></div>
	<div class="inline rel full-h sw2-child-2 bord">
		<div class="sw2c-tittle full-w rel abu tab"><div class="tabc ce">Select Product</div></div>
		<div class="sw2c-content ovh full-w rel"><div class="full-h abs ovs full-w120 full-h120">
<?php
$kueri = mysqli_query($link, "select * from category_new where cat_parent_ID=0 order by cat_name");
while ($data = mysqli_fetch_array($kueri)) {
	echo "<div class='full-w rel cat tab' ident='" . $data['cat_id'] . "' name='" . $data['cat_name'] . "'><div class='tabc pd5l cp trans hvb'>" . $data['cat_name'] . "</div></div>";
}
?>
			</div>
		</div>
	</div>
	<div class="inline full-h sw2-child-3 bord pd5">
		<p>Sublimation Apparel | FASTEST turnaround for Custom fabrics adrenaline Jerseys | shipped in 15 business days and 28 business days during peak season.</p>
	</div>
</div>

<div id="2" class="sw2-child">
	<div class="inline full-h sw2-child-1">
		<div class="shop-image rel inline"></div>
	</div>
	<div class="inline full-h sw2-child-2 bord">
		<div class="sw2c-tittle full-w rel abu tab"><div class="tabc ce tittle-two up"></div></div>
		<div class="sw2c-content ovh full-w rel"><div class="full-h abs ovs full-w120 full-h120 list">

			</div>
		</div>
	</div>
	<div class="inline full-h sw2-child-3"></div>
</div>

<div id="3" class="sw2-child">
	<div class="inline full-h sw2-child-1"></div>
	<div class="inline full-h sw2-child-2 bord">
		<div class="sw2c-tittle full-w rel abu tab"><div class="tabc ce tittle-three up"></div></div>
		<div class="sw2c-content three ovh full-w rel"><div class="full-h abs ovs full-w120 full-h120 list">

			</div>
		</div>
	</div>
	<div class="inline full-h sw2-child-3"></div>
</div>


<div id="4" class="sw2-child">
	<div class="inline full-h sw2-child-1"></div>
	<div class="inline full-h sw2-child-2 bord">
		<div class="sw2c-tittle full-w rel abu tab"><div class="tabc ce tittle-four up"></div></div>
		<div class="sw2c-content four ovh full-w rel"><div class="full-h abs ovs full-w120 full-h120 list">

			</div>
		</div>
	</div>
	<div class="inline full-h sw2-child-3"></div>
</div>

<div id="5" class="sw2-child">
	<div class="inline full-h sw2-child-2 bord full-w">
		<div class="sw2c-tittle full-w rel abu tab"><div class="tabc ce tittle-design up">DESIGN</div></div>
		<div class="sw2c-content five ovh full-w rel"><div class="abs full-h full-w list">
			<?php  include 'dialog-design.php'; ?>
			</div>
		</div>
	</div>
<!--	<div class="inline full-h sw2-child-3 bord"></div> -->
</div>

<div id="6" class="sw2-child">
	<div class="inline full-h sw2-child-2 bord">
		<div class="sw2c-tittle full-w rel abu tab"><div class="tabc ce tittle-five up"></div></div>
		<div class="sw2c-content six ovh full-w rel"><div class="full-h abs ovs full-w120 full-h120 list">

			</div>
		</div>
	</div>
<!--	<div class="inline full-h sw2-child-3 bord"></div> -->
</div>

<div id="7" class="sw2-child">
	<div class="inline full-h sw2-child-2 bord full-w">
		<div class="sw2c-tittle full-w rel abu tab"><div class="tabc ce tittle-seven up"></div></div>
		<div class="sw2c-content six ovh full-w rel"><div class="full-h abs ovs full-w120 full-h120 list">
				<div class="custom-1 full-h inline">
					<div class="full-w pd5l">
						<h4>Logo Placement (optional)</h4>
						<small>Choose your additional logo positions by simply upload of the logo(s) in the button below.</small><br>
						<span>Have you been given permission to use all logos listed?</span><br>
						<input type="checkbox" name="" value="" id="author"><label for="author">&nbsp;I am authorized to use all logos listed.</label>&nbsp;&nbsp;
						<input type="checkbox" name="" value="" id="other-shirts"><label for="other-shirts">&nbsp;Other shirts</label>
						<select class="custom-select" style="display:none;">
						</select>
						<br>
						<div class="full-w custom-list">
							<ul>
								<?php $list = array('1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','R1','R2','L1','L2','Other','Other','Other','Other'); 
									$random = $_SESSION['random'];
									foreach ($list as $key => $val) {
								?>
								<li class="list-upload list-<?php echo $val; ?>">
									<span><?php echo $val; ?></span>
									<div class="custom-upload">
										<label>Choose File</label>
										<form id="form-file" name="form-file" action="core/upload-admin.php?path=../assets/logo/<?php echo $random; ?>" method="post" enctype="multipart/form-data">
											<input type="file" name="gambar" value="" placeholder="" class="custom-file">
										</form>
									</div>
								</li>
								<?php } ?>
							</ul>
						</div>
					</div>
				</div>
				<div class="custom-2 full-h inline">
					<img src="assets/img/web/custom.png" width="100%">
				</div>
			</div>
		</div>
	</div>
<!--	<div class="inline full-h sw2-child-3 bord"></div> -->
</div>