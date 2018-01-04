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
		$a = $_GET["a"];
		
		$sql = "UPDATE dondathang SET MaTinhTrang = $a WHERE MaDonDatHang = $id";
		save($sql,1);

		//Cập nhật số lượng tồn của Sản phẩm đối với các đơn hàng bị Hủy
		if($a == 3)
		{
			$sql = "SELECT MaSanPham, SoLuong FROM chitietdondathang WHERE MaDonDatHang = $id and MaSanPham " ;
			$result = load($sql);
			while($row = $result->fetch_assoc())
			{
				$soLuong = $row["SoLuong"];
				$maSanPham = $row["MaSanPham"];
				
				$sql = "UPDATE sanpham SET SoLuongTon = SoLuongTon + $soLuong WHERE MaSanPham = $maSanPham";
				save($sql,1);
			}
		}
	}

ChangeURL("../../index.php?c=5");
?>