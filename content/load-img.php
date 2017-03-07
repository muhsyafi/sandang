<script type="text/javascript">
  $(document).ready(function() {// Ready
    $('.hd-img').click(function(event) { // Box Image
      id=$(this).attr('id');
      console.log(id);
      TINY.box.show({iframe:'content/hd-box.php?id='+id+'',boxid:'frameless',width:740,height:450,fixed:true,maskid:'greyemask',maskopacity:40});
      return false;
       }); // end box
    }); //end ready
</script>
<?php
include '../core/db.php';
$start = $_GET['start'];
$kueri = mysqli_query($link, "select * from house_design_new order by id asc limit $start,20");
while ($data = mysqli_fetch_array($kueri)) {
	?>

  <a href="#" class="hd-img" id="<?php echo ($data['id'])?>">
  <div class="house-design-img-wrapper">
    <div class="house-design-img">
      <img width="60px" height="100px"  src="assets/img/house_design_small/<?php echo ($data['name'] . '/' . $data['img'])?>">
    </div>
    <div class="house-design-text">
      <p><?php echo ($data['name'])?></p>
    </div>
  </div>
  </a>
<?php }?>