<?php
session_start();
include 'db.php';
error_reporting(E_ALL^(E_NOTICE|E_WARNING));
$act = $_GET['act'];
$name = $_SESSION['user'];
// Get data
$a = $_GET['a'];
$b = $_GET['b'];
$c = $_GET['c'];
$d = $_GET['d'];
$e = $_GET['e'];
$f = $_GET['f'];
$g = $_GET['g'];
$h = $_GET['h'];
$i = $_GET['i'];
$j = $_GET['j'];
$k = $_GET['k'];
$l = $_GET['l'];
$m = $_GET['m'];
$n = $_GET['n'];
$o = $_GET['o'];
$p = $_GET['p'];
$q = $_GET['q'];
$r = $_GET['r'];
$s = $_GET['s'];
$t = $_GET['t'];
// End get data
class Core {

	function post_order($link, $a, $b, $c, $d, $e, $f, $g, $h, $i, $j, $k, $l, $m, $n, $o, $p, $q, $r, $t) {
		$kueri = $this->push = mysqli_query($link, "insert into order_form values('','$a','$b','$c','$d','$e','$f','$g','$h','$i','$j','$k','$l','$m','$n','$o','$p','$q','$r',now(),0)");
		if ($kueri) {
			//
		} else {
			echo mysqli_error($link);
		}

	}

	function post_next($link, $a, $b, $c, $d) {
		$kueri = $this->push = mysqli_query($link, "update order_form set file_link='$b', design='$c', user_comments='$d', status='1' where cust_id='$a'");
		if ($kueri) {
			//
		} else {
			echo mysqli_error($link);
		}

	}
	function post_contact($link, $a, $b, $c, $d, $e, $f, $g, $h) {
		$kueri = $this->push = mysqli_query($link, "insert into contact values('','$a','$b','$c','$d','$e','$f','$g','$h','','',now(),'0')");
		if ($kueri) {
			//
		} else {
			echo mysqli_error($link);
		}
	}
	function get_house_design($link, $a, $b) {
		$kueri = $this->push = mysqli_query($link, "select a.id, a.name, b.path from house_design_new a inner join  house_design_img b on a.id=b.id order by a.id asc limit $a,$b");
		if ($kueri) {
			while ($data = mysqli_fetch_array($kueri)) {
				$arr[] = array(
					'id' => $data['id'],
					'name' => $data['name'],
					'path' => $data['path']);
			}
			$jArr = json_encode($arr);
			echo $jArr;

		} else {
			echo mysqli_error($link);
		}
	}
	function get_product($link, $a) {
		$kueri = $this->push = mysqli_query($link, "select * from category_new where cat_parent_ID=$a order by cat_name asc");
		while ($data = mysqli_fetch_array($kueri)) {
			echo "<div class='acr-content-wrapper' svg='assets/img/home-product/" . $data['path'] . '/' . $data['cat_image'] . '.svg' . "'>";
			include '../assets/img/home-product/' . $data['path'] . '/' . $data['cat_image'] . '.svg';
			echo "</div>";
		}
		//echo json_encode($arr);
	}
	function get_product_shop($link, $a) {
		$kueri = $this->push = mysqli_query($link, "select * from category_new where cat_parent_ID=$a order by cat_name asc");
		while ($data = mysqli_fetch_array($kueri)) {
			echo "<div class='svg-wrapper inline rel bord cp' ident='" . $data['cat_id'] . "'>";
			echo "<div class='svg inline' svg='assets/img/home-product/" . $data['path'] . '/' . $data['cat_image'] . '.svg' . "'>";
			include '../assets/img/home-product/' . $data['path'] . '/' . $data['cat_image'] . '.svg';
			echo "</div>";
			echo "<div class='label tab'><div class='tabc'>" . $data['cat_name'] . "</div></div></div>";
		}
		//echo json_encode($arr);
	}
	function getImage($link) {
		$kueri = $this->push = mysqli_query($link, "select * from design_image order by time_add desc limit 1");
		while ($data = mysqli_fetch_array($kueri)) {
			$arr = array('design' => $data['design']);
		}
		echo json_encode($arr);
	}
	function getCustomer($link, $a) {
		$kueri = $this->push = mysqli_query($link, "select * from customers where cust_id='$a'");
		while ($data = mysqli_fetch_array($kueri)) {
			$arr = array('cust_id' => $data['cust_id'],
				'first_name' => $data['first_name'],
				'last_name' => $data['last_name'],
				'username' => $data['username'],
				'email_id' => $data['email_id'],
				'contact_name' => $data['contact_name'],
				'team_name' => $data['team_name'],
				'address_line_1' => $data['address_line_1'],
				'address_line_2' => $data['address_line_2'],
				'street' => $data['street'],
				'city' => $data['city'],
				'state' => $data['state'],
				'country' => $data['country'],
				'zip_code' => $data['zip_code'],
				'ship_street' => $data['ship_street'],
				'ship_city' => $data['ship_city'],
				'ship_state' => $data['ship_state'],
				'ship_zip_code' => $data['ship_zip_code'],
				'ship_country' => $data['ship_country'],
				'ship_address_line_1' => $data['ship_address_line_1'],
				'ship_address_line_2' => $data['ship_address_line_2'],
				'phone' => $data['phone'],
				'cell' => $data['cell']);
		}
		echo json_encode($arr);
	}
	function deleteCustomer($link, $a) {
		$kueri = $this->push = mysqli_query($link, "delete from customers where cust_id='$a'");
		if ($kueri) {
			echo "1";
		} else {
			echo "0";
		}
	}
	function changeTitle($link, $a) {
		$kueri = $this->push = mysqli_query($link, "update cms set title='$a'");
		if ($kueri) {
			echo "1";
		} else {
			echo "0";
		}
	}
	function changeAdminPassword($link, $a, $name) {
		$kueri = $this->push = mysqli_query($link, "update user set password='$a' where username='$name'");
		if ($kueri) {
			echo "1";
		} else {
			echo "0";
		}
	}
	function uploadAdminImg($link, $a) {
		$kueri = $this->push = mysqli_query($link, "update cms set img='$a'");
		if ($kueri) {
			echo "1";
		} else {
			echo "0";
		}
	}
	function dataDelete($link, $a) {
		$kueri = $this->push = mysqli_query($link, "delete from category_new where cat_id='$a'");
		if ($kueri) {
			echo "1";
		} else {
			echo "0";
		}

	}
	function productGet($link, $a) {
		$kueri = $this->push = mysqli_query($link, "select * from category_option where cat_id='$a'");
		while ($data = mysqli_fetch_array($kueri)) {
			$arr[] = array('cat_opt_id' => $data['cat_opt_id'],
				'cat_opt_name' => $data['cat_opt_name'],
				'cat_opt_type' => $data['cat_opt_type'],
				'price' => $data['price'],
				'size' => $data['size']);
		}
		echo json_encode($arr);
	}
	function productUpdate($link, $a, $b, $c) {
		$kueri = $this->push = mysqli_query($link, "update category_option set $b='$c' where cat_opt_id='$a'");
		if ($kueri) {
			echo "1";
		} else {
			echo "0";
		}
	}
	function hdDelete($link, $a) {
		$kueri = $this->push = mysqli_query($link, "delete from house_design_new where id='$a'");
		if ($kueri) {
			echo "1";
		} else {
			echo "0";
		}
	}
	function hdSave($link, $a, $b) {
		$kueri = $this->push = mysqli_query($link, "update house_design_new a, house_design_img b set a.img='$b',b.img='$b' where a.id='$a' and b.id='$a'");
		if ($kueri) {
			echo "1";
		} else {
			echo "0";
		}
	}
	function hdInsertSmall($link, $a, $b) {
		$kueri = $this->push = mysqli_query($link, "insert into house_design_new values('','$a','$b')");
		if ($kueri) {
			echo "1";
		} else {
			echo "0";
		}

	}
	function hdInsertBig($link, $a, $b) {
		$kueri = $this->push = mysqli_query($link, "insert into house_design_img select * from house_design_new order by id desc limit 1");
		if ($kueri) {
			echo "1";
		} else {
			echo "0";
		}

	}
	function getOption($link, $a, $b) {
		$kueri = $this->push = mysqli_query($link, "select * from category_option where cat_id='$a' and cat_opt_type='$b' and cat_opt_name<>'3x - 5x Sizes' and cat_opt_name <> '6x - 7x Sizes'");
		while ($data = mysqli_fetch_array($kueri)) {
			$arr[] = array('cat_opt_id' => $data['cat_opt_id'],
				'cat_opt_name' => $data['cat_opt_name'],
				'price' => $data['price'],
				'size' => $data['size']);
		}
		echo json_encode($arr);
	}
	function getFabric($link, $a) {
		$kueri = $this->push = mysqli_query($link, "select * from `fabric_detail` a, `category_option` b where b.`cat_opt_name`=a.`title` and b.cat_id='$a'");
		while ($data = mysqli_fetch_array($kueri)) {
			$arr[] = array('cat_opt_id' => $data['cat_opt_id'],
				'cat_opt_name' => $data['cat_opt_name'],
				'price' => $data['price'],
				'content' => $data['content'],
				'size' => $data['size']);
		}
		echo json_encode($arr);
	}
	function getSizes($link, $a) {
		$kueri = $this->push = mysqli_query($link, "select * from size order by id");
		while ($data = mysqli_fetch_array($kueri)) {
			$arr[] = array('id' => $data['id'],
				'sizes' => $data['sizes'],
				'price'	=> $data['price']);
		}
		echo json_encode($arr);

	}
	function getSizesQuantity($link, $a) {
		$kueri = $this->push = mysqli_query($link, "select * from category_option where cat_opt_id='$a' and cat_opt_type='options'");
		while ($data = mysqli_fetch_array($kueri)) {
			$arr[] = array('cat_opt_id' => $data['cat_opt_id'],
				'cat_opt_name' => $data['cat_opt_name'],
				'price' => $data['price']);
		}
		echo json_encode($arr);

	}
	function gallerySave($link, $a) {
		$kueri = $this->push = mysqli_query($link, "insert into gallery values('','$a',now())");
		if ($kueri) {
			echo "1";
		} else {
			echo "0";
		}
	}
	function galleryDelete($link, $a) {
		$kueri = $this->push = mysqli_query($link, "delete from gallery where id='$a'");
		if ($kueri) {
			echo "1";
		} else {
			echo "0";
		}
	}
	function galleryGet($link, $a) {
		$kueri = $this->push = mysqli_query($link, "select * from gallery order by date_add desc limit $a,15");
		while ($data = mysqli_fetch_array($kueri)) {
			$arr[] = array('id' => $data['id'],
				'img' => $data['img']);
		}
		echo json_encode($arr);
	}
	function adminCreate($link, $a, $b) {
		$kueri = $this->push = mysqli_query($link, "insert into user values('','','$a','$a','$a','$b','1')");
		if ($kueri) {
			echo "1";
		} else {
			echo "0";
		}

	}
	function adminCheck($link, $a) {
		$kueri = $this->push = mysqli_query($link, "select * from user where username='$a'");
		$data = mysqli_num_rows($kueri);
		if ($data > 0) {
			echo "1";
		} else {
			echo "0";
		}
	}
	function getPrice($link, $a) {
		$kueri = $this->push = mysqli_query($link, "select price from category_option where cat_id='$a' and cat_opt_type='pricing'");
		while ($data = mysqli_fetch_array($kueri)) {
			$arr[] = $data;
		}
		echo json_encode($arr);
	}
	function getDesign($path){
		$dir = '../assets/img/hd-new/'.$path;
		$file = scandir($dir);
		foreach ($file as $key => $data) {
			if ($data != '.' && $data != '..' && $data != 'large' && $data != '.DS_Store') {
				$arr[] = $data;
			}
		}
		echo json_encode($arr);
	}
}

$init = new Core();

if ($act == 'post_order') {
	$init->post_order($link, $a, $b, $c, $d, $e, $f, $g, $h, $i, $j, $k, $l, $m, $n, $o, $p, $q, $r, $s, $t);
} else if ($act == 'post_next') {
	$init->post_next($link, $a, $b, $c, $d);
} else if ($act == 'post_contact') {
	$init->post_contact($link, $a, $b, $c, $d, $e, $f, $g, $h);
} else if ($act == 'get_house_design') {
	$init->get_house_design($link, $a, $b);
} elseif ($act == 'get_product') {
	$init->get_product($link, $a);
} elseif ($act == 'get_image') {
	if ($name != null) {
		$init->getImage($link);
	}
} elseif ($act == 'get_customers') {
	$init->getCustomer($link, $a);
} elseif ($act == 'delete_customer') {
	$init->deleteCustomer($link, $a);
} elseif ($act == 'change-title') {
	$init->changeTitle($link, $a);
} elseif ($act == 'change-password') {
	$init->changeAdminPassword($link, $a, $name);
} elseif ($act == 'save-admin-img') {
	$init->uploadAdminImg($link, $a);
} elseif ($act == 'delete-data') {
	$init->dataDelete($link, $a);
} elseif ($act == 'get-product') {
	$init->productGet($link, $a);
} elseif ($act == 'update-product') {
	$init->productUpdate($link, $a, $b, $c);
} elseif ($act == 'delete-house-design') {
	$init->hdDelete($link, $a);
} elseif ($act == 'save-house-design') {
	$init->hdSave($link, $a, $b);
} elseif ($act == 'get_product_shop') {
	$init->get_product_shop($link, $a);
} elseif ($act == 'get-option') {
	$init->getOption($link, $a, $b);
} elseif ($act == 'get-sizes') {
	$init->getSizes($link);
} elseif ($act == 'save-gallery') {
	$init->gallerySave($link, $a);
} elseif ($act == 'get-fabric') {
	$init->getFabric($link, $a);
} elseif ($act == 'create-admin') {
	$init->adminCreate($link, $a, $b);
} elseif ($act == 'check-user') {
	$init->adminCheck($link, $a);
} elseif ($act == 'insert-hd-small') {
	$init->hdInsertSmall($link, $a, $b);
} elseif ($act == 'insert-hd-big') {
	$init->hdInsertBig($link, $a, $b);
} elseif ($act == 'delete-gallery') {
	$init->galleryDelete($link, $a);
} elseif ($act == 'get-gallery') {
	$init->galleryGet($link, $a);
} elseif ($act == 'get-sizes-quantity') {
	$init->getSizesQuantity($link, $a);
} elseif ($act == 'get-price') {
	$init->getPrice($link, $a);
} else if($act == 'get-hd-new'){
	$init->getDesign($a);
}

?>