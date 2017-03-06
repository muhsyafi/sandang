<?php 
$dir    = 'assets/img/house_design';
$files1 = scandir($dir);
$count_img = count($files1);
 ?>
 <style>
   #page{
     background-color: white;
   }
   img:hover{
    opacity: 1;
   }
   img{
    cursor: pointer;
   }
   #file-upload{
    display: block;
    height: 32px;
    position: relative;
    opacity: 0;
    z-index: 99;
   }
   .label-upload{
    top: 0;
    position: absolute;
    text-align: center;
    line-height: 2em;
    height: 32px;
    width: 200px;
    color: black;
    background-color: #999999;
   }
   .btn-nav{
      position: absolute;
      width: 64px;
      height: 32px;
      color: black;
      background-color: #999999;
      padding: 8px 8px;
      bottom: 110;
      display: none;
   }
   .btn-nav-front{left: 50;}
   .btn-nav-back{right: 50;}
 </style>


<div class="container-design">
  <div class="design-artwork">
    <span>Custom Artwork</span>
  </div>
  <table>
    <tr>
      <td style="vertical-align:middle">
          <span>I have my artwork</span>
      </td>
      <td style="vertical-align:middle; position:relative">
          <form id="artwork-upload">
            <input type="file" id="file-upload"><label class="label-upload">Upload</label>
          </form>
      </td>
    </tr>
    <tr>
      <td style="vertical-align:top">
        <div class="design-house">    
        <table class="img-thumbnail">
          <tr>
            <td class="img-dropdown" colspan="2">Choose Design</td>
            <td></td>
          </tr>
          <tr class="img-checked img-hide">
            <td class="img-img">
              <img src="">
            </td>
            <td class="img-name"></td>
          </tr>
        </table>    
            <?php 
              
              $kueri = mysqli_query($link,"select * from house_design_new order by id asc");
              while ($data=mysqli_fetch_array($kueri)) {
                $image='<table class="img-thumbnail img-drop-img img-hide">';
                $image.='<tr>';
                $image.='<td class="img-mini" style="width:80px" image="'.$data['id'].'" id="'.$data['name'].'">';
                $image.='<img height="80px" src="assets/img/house_design/'.$data['name'].'/a.JPG">';
                $image.='</td>';
                $image.='<td  class="img-mini" image="'.$data['id'].'" id="'.$data['name'].'">';
                $image.='<span id="'.$data['name'].'">'.$data['name'].'</span>';
                $image.='</td>';
                $image.='</tr>';
                $image.='</table>';
                echo($image);
              }
            ?>
        </div>
      </td>
      <td style="vertical-align:top">
        <div class="design-image">
          <div class="design-thumbnail">
            <img src=""><h1>Please choose design</h1>
                <a class="btn-nav btn-nav-front" id="img-front" href="#">Front</a>
                <a class="btn-nav btn-nav-back" id="img-back" href="#">Back</a>
          <div></div>
          <div class="design-comment">
            <textarea id="design-comments" placeholder="Additional Comments"></textarea>
            </div>
            </div>
      </td>
    </tr>
    <tr>
      <td><span>Create a new design</span></td><td style="position:relative;height:32px"><a href="" class="label-upload">New Design</a></td>
    </tr>
    <tr>
      <td>
        <div>
          <span>
            <a class="btn-back" href="?menu=order">Back</a>
          </span>
        </div>
      </td>
      <td>
        <div>
          <span>
            <a class="btn-submit" id="order-submit" href="#">Submit</a>
          </span>
        </div>
      </td>
    </tr>
  </table>
  <div class="design-online">
    <span>Design Your Artwork Online</span>
  </div>
  <div class="design-download">
    <span>Dowdload Template</span>
  </div>
  </div>
  <input type="hidden" id="user-id">
  <script>
  $(document).ready(function() {//Ready
      $.ajax({
        url: 'content/cookie.php',
        type: 'GET',
        dataType: 'text',
        data: {'act': 'get-user-id'},
      })
      .done(function(data) {
        $('#user-id').val(data);
      });      
  });//end ready
  </script>