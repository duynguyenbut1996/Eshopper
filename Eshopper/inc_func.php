<?php

require_once './db/dbHelper.php';

/*function redirect($url) {
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: $url");
}*/
function ChangeURL($path)
	{
		echo '<script type = "text/javascript">';
		echo 'location = "'.$path.'";';
		echo '</script>';
	}

//function isAuthenticated() {
//    if (!isset($_SESSION["auth"]) || $_SESSION["auth"] == 0) {
//        return false;
//    }
//    
//    return true;
//}

function isAuthenticated() {

    if (isset($_SESSION["auth"]) && $_SESSION["auth"] == 1) {
        return true;
    }

    if (isset($_COOKIE["auth_user_id"])) {
        $id = $_COOKIE["auth_user_id"];

        //
        // tái tạo thông tin cho session

        $sql = "select * from taikhoan where MaTaiKhoan = $id";
        $rs = load($sql);
        if ($rs->num_rows == 0) {
            return false;
        }

        $row = $rs->fetch_assoc();

        $u = array();
        $u["TenDangNhap"] = $row["TenDangNhap"];
        $u["MaTaiKhoan"] = $row["MaTaiKhoan"];
        $u["TenHienThi"] = $row["TenHienThi"];
        $u["DiaChi"] = $row["DiaChi"];
        $u["DienThoai"] = $row["DienThoai"];
        $u["Email"] = $row["Email"];
		$u["MaLoaiTaiKhoan"]=$row["MaLoaiTaiKhoan"];

        $_SESSION["auth"] = 1;
        $_SESSION["auth_user"] = $u;

        return true;
    }

    return false;
}

function getCart() {
    if (!isset($_SESSION["cart"])) {
        $_SESSION["cart"] = array();
    }

    return $_SESSION["cart"];
}

function setCart($id, $q) {
    if (!isset($_SESSION["cart"])) {
        $_SESSION["cart"] = array();
    }

    if (array_key_exists($id, $_SESSION["cart"])) {
        $_SESSION["cart"][$id] += $q;
    } else {
        $_SESSION["cart"][$id] = $q;
    }
}

function cart_sum_items() {
    if (!isset($_SESSION["cart"])) {
        $_SESSION["cart"] = array();
    }

    $ret = 0;
    foreach ($_SESSION["cart"] as $id => $quantity) {
        $ret += $quantity;
    }

    return $ret;
}
function remove_cart_item($id) {
    if (!isset($_SESSION["cart"])) {
        $_SESSION["cart"] = array();
    }

    foreach ($_SESSION["cart"] as $proId => $quantity) {
        if ($proId == $id) {
            unset($_SESSION["cart"][$id]);
            return;
        }
    }
}

function update_cart_item($id, $q) {
    if (!isset($_SESSION["cart"])) {
        $_SESSION["cart"] = array();
    }

    foreach ($_SESSION["cart"] as $proId => $quantity) {
        if ($proId == $id) {
            $_SESSION["cart"][$id] = $q;
            return;
        }
    }
}