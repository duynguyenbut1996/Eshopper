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
		
		//Kiểm tra có sản phầm thuộc về hãng đang muốn xóa hay không?
		$sql = "SELECT COUNT(*) FROM sanpham WHERE MaHangSanXuat = $id";
		$result = load($sql);
		$row = $result->fetch_assoc();;
		if($row[0] == 0)
		{
			//Thực hiện xóa hãng ra khỏi DB
			$sql = "DELETE FROM hangsanxuat WHERE MaHangSanXuat = $id";
		}
		else
		{
			//Thực hiện khóa hãng do đã có sản phầm thuộc về loại này
			ChangeURL("../../index.php?c=4");
		}
		
		save($sql,1);
	}

	ChangeURL("../../index.php?c=4");
?>