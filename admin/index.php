<?php
	session_start();
	require_once "../db/dbHelper.php";
	function ChangeURL($path)
	{
		echo '<script type = "text/javascript">';
		echo 'location = "'.$path.'";';
		echo '</script>';
	}
	if(!isset($_SESSION["auth_user"]["MaLoaiTaiKhoan"]) || $_SESSION["auth_user"]["MaLoaiTaiKhoan"] != 2)
	{
	ChangeURL('../index.php');
	}
	
	$c = 0;
	if(isset($_GET["c"]))
		$c = $_GET["c"];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Phân hệ quản lý</title>
	<link rel="stylesheet" type="text/css" href="css/admin.css" />
	<link href=".././css/bootstrap.min.css" rel="stylesheet"/>
</head>
<body>
	<div id="header">
		<a href="index.php">
			Hệ thống quản lý sản phẩm TN-SHOP
		</a>
	</div>
	<div id="menu" class="table">
		<?php 
			include "modules/mMenu.php"; 
			include "modules/mLogin.php";
		?>
	</div>
	<div id="content">
		<?php
			switch ($c) {
				case 0:
					include "pages/pIndex.php";
					break;
				case 1:
					include "pages/qlTaiKhoan/pIndex.php";
					break;
				case 2:
					include "pages/qlSanPham/pIndex.php";
					break;
				case 3:
					include "pages/qlLoai/pIndex.php";
					break;
				case 4:
					include "pages/qlHang/pIndex.php";
					break;
				case 5:
					include "pages/qlDonDatHang/pIndex.php";
					break;
				default:
					include "pages/pError.php";
					break;
			}
		?>
	</div>

</body>
</html>