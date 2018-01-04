<?php
	require_once "../../../db/dbHelper.php";
function ChangeURL($path)
	{
		echo '<script type = "text/javascript">';
		echo 'location = "'.$path.'";';
		echo '</script>';
	}
	if(isset($_GET["id"]))
	{
		$id = $_GET["id"];
		
		//Kiểm tra có sản phầm thuộc về loại đang muốn xóa hay không?
		$sql = "SELECT COUNT(*) FROM sanpham WHERE MaLoaiSanPham = $id";
		$rs = load($sql);
		$row = $rs->fetch_assoc();
		
		if($row[0] == 0)
		{
			//Thực hiện xóa Loại sản phẩm ra khỏi DB
			$sql = "DELETE FROM loaisanpham WHERE MaLoaiSanPham = $id";
		}
		else
		{
			ChangeURL("../../index.php?c=3");
		}
		
		save($sql,1);
	}

	ChangeURL("../../index.php?c=3");
?>