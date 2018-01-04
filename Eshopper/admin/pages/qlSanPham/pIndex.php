<h1>Quản lý sản phẩm</h1>
<?php
	$a = 1;
	if(isset($_GET["a"]))
		$a = $_GET["a"];

	switch ($a) {
		case 1:
			include "pDanhSach.php";
			break;
		case 2:
			include "pCapNhat.php";
			break;
		case 3:
			include "pThemMoi.php";
			break;
		default:
			include "pError.php";
			break;
	}
?>