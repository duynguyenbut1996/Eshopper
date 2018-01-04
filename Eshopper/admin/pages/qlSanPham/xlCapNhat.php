<?php
	require_once "../../../db/dbHelper.php";
	function ChangeURL($path)
	{
		echo '<script type = "text/javascript">';
		echo 'location = "'.$path.'";';
		echo '</script>';
	}
	if(isset($_POST["txtTen"]))
	{
		$ten = $_POST["txtTen"];
		$gia = $_POST["txtGia"];
		$hang = $_POST["cmbHang"];
		$loai = $_POST["cmbLoai"];
		$ton = $_POST["txtTon"];
		$ban = $_POST["txtBan"];
		$id = $_POST["id"];

		if(isset($_POST["txtMoTa"]))
			$MoTa = $_POST["txtMoTa"];
		else
			$MoTa = "";
		
		if(isset($_FILES["fHinh"]) && $_FILES["fHinh"]["size"] > 0)
		{	
			//Thực hiện upload file
			move_uploaded_file($_FILES["fHinh"]["tmp_name"], "../../../images/shop/".$_FILES["fHinh"]["name"]);

			if(file_exists("../../../images/shop/".$_FILES["fHinh"]["name"]))
				$hinhURL = $_FILES["fHinh"]["name"];
			else
				$hinhURL = "errorUpload.png";
		
			$sql = "UPDATE sanpham SET TenSanPham = '$ten', GiaSanPham = $gia, MaLoaiSanPham = $loai, MaHangSanXuat = $hang, SoLuongTon = $ton, SoLuongBan = $ban, MoTa = '$MoTa', HinhURL = '$hinhURL' WHERE MaSanPham = $id";
		}
		else
		{
			$sql = "UPDATE sanpham SET TenSanPham = '$ten', GiaSanPham = $gia, MaLoaiSanPham = $loai, MaHangSanXuat = $hang, SoLuongTon = $ton, SoLuongBan = $ban, MoTa = '$MoTa' WHERE MaSanPham = $id";
		}
		
		echo $sql;
		
		save($sql,1);
	}

	ChangeURL("../../index.php?c=2");
?>