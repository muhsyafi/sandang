<?php
session_start();
include 'db.php';
error_reporting(E_ALL^(E_NOTICE|E_WARNING));
$act = $_POST['act'];
$name = $_SESSION['user'];
// Get data
$a = $_POST['a'];
$b = $_POST['b'];
$c = $_POST['c'];
$d = $_POST['d'];
$e = $_POST['e'];
$f = $_POST['f'];
$g = $_POST['g'];
$h = $_POST['h'];
$i = $_POST['i'];
$j = $_POST['j'];
$k = $_POST['k'];
$l = $_POST['l'];
$m = $_POST['m'];
$n = $_POST['n'];
$o = $_POST['o'];
$p = $_POST['p'];
$q = $_POST['q'];
$r = $_POST['r'];
$s = $_POST['s'];
$t = $_POST['t'];
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
	function post_temp($link, $id, $a, $b, $c, $d) {
		$kueri = $this->push = mysqli_query($link, "insert into temp_order values('$id','$a','$b','$c','$d',now())");
		if ($kueri) {
			//
		} else {
			echo mysqli_error($link);
		}
	}
	function get_temp_order($link) {
		$kueri = $this->push = mysqli_query($link, "select * from temp_order order by date desc limit 1 ");
		if ($kueri) {
			while ($data = mysqli_fetch_array($kueri)) {
				$arr[] = array('id' => $data[0],
					'img' => $data[1],
					'choose' => $data[2],
					'price' => $data[3],
					'val' => $data[4]);
			}
			echo json_encode($arr);
		}
	}
	function save_design($link, $a, $b, $c) {
		$id = $_SESSION['id'];
		$kueri = $this->push = mysqli_query($link, "insert into design values('','$id','$b','$c',now())");
		if ($kueri) {
			echo "Succes for saving data";
		} else {
			echo mysqli_error($link);
		}
	}
	function get_design($link, $a) {
		$id = $_SESSION['id'];
		$kueri = $this->push = mysqli_query($link, "select * from design where id_user='$id' order by date_add desc limit 1");
		if ($kueri) {
			while ($data = mysqli_fetch_array($kueri)) {
				echo $data['design'];
			}
		} else {
			echo mysqli_error($link);
		}
	}
	function cek_login() {
		$sess = $_SESSION['user'];
		if (!empty($sess)) {
			echo "1";
		} else {
			echo "0";
		}
	}
	function cek_user() {
		$sess = $_SESSION['user'];
		if (!empty($sess)) {
			echo "1";
		} else {
			echo "0";
		}
	}
	function signup($link, $a, $b, $c, $d, $e) {
		$id = rand(100, 10000);
		$kueri = mysqli_query($link, "insert into user values('','$id','$a','$b','$c','$d','0')");
		if ($kueri) {
			echo "1";
		} else {
			echo "0";
		}
	}
	function login($link, $a, $b) {
		$kueri = mysqli_query($link, "select * from user where username='$a' and password='$b'");
		$data = mysqli_num_rows($kueri);
		if ($data > 0) {
			$_SESSION['user'] = $a;
			$row = mysqli_fetch_row($kueri);
			$_SESSION['id'] = $row[1];
			echo "1";
		} else {
			echo "0";
		}
	}
	function log_out() {
		session_destroy();
		session_unset();
	}
	function saveNotes($link, $a, $name) {
		$kueri = mysqli_query($link, "insert into notes values('','$name','$a',now())");
		if ($kueri) {
			echo "1";
		} else {
			echo "0";
		}
	}
	function saveImage($link, $a, $name) {
		$kueri = mysqli_query($link, "insert into design_image values('','$name','new','$a',now())");
		if ($kueri) {
			echo "1";
		} else {
			echo "0";
		}
	}
	function saveOrderName($link, $a, $b, $c, $d, $e, $f, $g, $h, $i, $name) {
		$kueri = mysqli_query($link, "insert into order_name value('','$a','$b','$c','$d','$e','$f','$g','$h','$i','$name',now())");
		if ($kueri) {
			echo "1";
		} else {
			echo "0";
		}
	}
	function saveChat($link, $a, $name) {
		$kueri = mysqli_query($link, "insert into chat values('','$a',now())");
		if ($kueri) {
			echo "1";
		} else {
			echo "0";
		}
	}
	function getData($link, $a) {
		$kueri = mysqli_query($link, "select * from category_new where cat_parent_ID='$a'");
		while ($data = mysqli_fetch_array($kueri)) {
			$product[] = array('cat_id' => $data['cat_id'],
				'cat_name' => $data['cat_name'],
				'path' => $data['path']);
		}
		echo json_encode($product);
	}
	function getDataFabric($link, $a) {
		$kueri = mysqli_query($link, "select * from fabric_detail where id='$a'");
		$product=[];
		while ($data = mysqli_fetch_array($kueri)) {
			$product=$data;
		}
		echo json_encode($product);
	}
	function getDataText($link, $a) {
		$kueri = mysqli_query($link, "select * from $a order by id asc");
		$content=[];
		while ($data = mysqli_fetch_array($kueri)) {
			$content=$data;
		}
		echo json_encode($content);
	}
	function saveOrderDetail($link,$a,$b,$c,$d,$e,$f,$g){
		$kueri = mysqli_query($link,"insert into order_detail values('','$a','$b','$c','$d','$e','$f','$g','$h')");
		if ($kueri) {
			echo "1";
		}else{
			echo "0";
		}
	}
	function saveOrder($link,$a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l,$m,$n){
		$kueri = mysqli_query($link,"insert into order_form values('','$a','$b','$c','$d','$e','$f','$g','$h','$i','$j','$k','','','$l','','$m','$n','',now(),'0')");
		if ($kueri) {
			echo "1";
		}else{
			echo "0";
		}
	}
	function updateText($link, $a, $b, $c, $d) {
		$kueri = $this->push = mysqli_query($link, "update $a set $b='$c' where id=$d");
		if ($kueri) {
			echo "1";
		} else {
			echo "0";
		}
	}

}

$init = new Core();

if ($act == 'post_order') {
	$init->post_order($link, $a, $b, $c, $d, $e, $f, $g, $h, $i, $j, $k, $l, $m, $n, $o, $p, $q, $r, $s, $t);
} else if ($act == 'post_next') {
	$init->post_next($link, $a, $b, $c, $d);
} else if ($act == 'post_contact') {
	$init->post_contact($link, $a, $b, $c, $d, $e, $f, $g, $h);
} else if ($act == 'post_temp') {
	$id = rand(100, 10000);
	$_SESSION['id_order'] = $id;
	$init->post_temp($link, $id, $a, $b, $c, $d);
} else if ($act == 'get_temp_order') {
	$init->get_temp_order($link);
} else if ($act == 'save_design') {
	$init->save_design($link, $name, $b, $c);
} else if ($act == 'get_design') {
	$init->get_design($link, $name);
} else if ($act == 'cek_login') {
	$init->cek_login();
} else if ($act == 'login') {
	$init->login($link, $a, $b);
} else if ($act == 'logout') {
	$init->log_out();
} else if ($act == 'signup') {
	$init->signup($link, $a, $b, $c, $d);
} else if ($act == 'save_note') {
	if ($name != null) {
		$init->saveNotes($link, $a, $name);
	} else {
		echo "00";
	}
} else if ($act == 'save_image') {
	if ($name != null) {
		$init->saveImage($link, $a, $name);
	}
} else if ($act == 'save_order_name') {
	if ($name != null) {
		$init->saveOrderName($link, $a, $b, $c, $d, $e, $f, $g, $h, $i, $name);
	} else {
		echo "00";
	}
} else if ($act == 'msg') {
	$init->saveChat($link, $a, $name);
} else if ($act == 'get-session') {
	$init->cek_user();
} else if ($act == 'get-data') {
	$init->getData($link, $a);
} else if ($act == 'save-order-detail'){
	$init->saveOrderDetail($link,$a,$b,$c,$d,$e,$f,$g,$h);
} else if ($act == 'save-order'){
	$init->saveOrder($link,$a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l,$m,$n);
} else if($act=='get-data-fabric'){
	$init->getDataFabric($link,$a);
}elseif ($act == 'update-text'){
	$init->updateText($link,$a,$b, $c, $d);
}
?>