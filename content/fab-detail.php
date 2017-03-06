<style type="text/css">
  .fab-container{
    height: auto;
    width: 100%;
  }
  .fab-detail{
    height: auto;
    width: 350px;
  }
  .fab-detail table tr td{
    border: 1px solid #999999;
    height: 25px;
    padding-left: 10px;
  }
  .lft_rw{
    width: 40%;
  }
  .rit_rw{
    width: 200px;
  }
  h1, h3{
    text-align: center;
    margin: 1px;
  }
  p{
    font-size: 20px;
    line-height: 200%;
    padding: 10px;
  }
  h3{
    font-size: 16px;
  }
.fab-strech{
  height: 130px;
  width: 230px;
  margin-left: 100px;
}
  .fab-text{
    margin: 0 auto;
    height: 400px;
    width: 100%;
  }
</style>
<div class="fab-container">

<?php
  $kueri = mysqli_query($link,"select * from fabric_detail where id='$product'");
  while ($data=mysqli_fetch_array($kueri)) {
    
 ?>
  <div class="fab-text">
      <h1><?php echo($data['title']) ?></h1>
      <p><?php echo($data['content']) ?></p>
      <h3>Composition : <?php echo($data['compos']) ?></h3>
      <h3>Weight : <?php echo($data['weight']) ?></h3>
  </div>
  <div class="fab-detail" style="display:inline-block">
      <div class="fab-table">
        <table  cellspacing="0" cellpadding="0" border="1">
      <tr>
        <td class="lft_rw">Feel</td>
        <td class="rit_rw"><?php echo($data['feel']) ?></td>
      </tr>
      <tr>
        <td class="lft_rw">Durability</td>
        <td class="rit_rw"><?php echo($data['durab']) ?></td>
      </tr>
      <tr>
        <td class="lft_rw">Impact</td>
        <td class="rit_rw"><?php echo($data['impact']) ?></td>
      </tr>
      <tr>
        <td class="lft_rw">Thickness</td>
        <td class="rit_rw"><?php echo($data['thick']) ?></td>
      </tr>
      <tr>
        <td class="lft_rw">Breathability</td>
        <td class="rit_rw"><?php echo($data['breat']) ?></td>
      </tr>
    </table>
      </div>
  </div>
        <div class="fab-strech" style="display:inline-block">
              <table border="1" cellspacing="0" cellpadding="0" class="fab_tabl_new" height="130">
                <tr>
                    <td class="lft_rw lft_rw_1">&nbsp;&nbsp;Strech</td>
                    <td class="rit_rw">
              <table width="" border="0" cellspacing="0" cellpadding="0" align="center">
                <tr>
                  <td width="35"><img src="assets/img/web/stretch.png" width="33" height="115" /></td>
                  <td>30%</td>
                  <td align="center" class="pding"><p><strong>45%</strong></p><img src="assets/img/web/stretch_1.png" width="115" height="33" /></td>
              </tr>
              </table>
        </td>
      </tr>
     </table>
      </div>
    <?php } ?>
</div>