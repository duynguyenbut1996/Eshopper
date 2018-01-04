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

		if(isset($_POST["txtMoTa"]))
			$MoTa = $_POST["txtMoTa"];
		else
			$MoTa = "";
		
		//Thực hiện upload file
		move_uploaded_file($_FILES["fHinh"]["tmp_name"], "../../../images/shop/".$_FILES["fHinh"]["name"]);

		if(file_exists("../../../images/shop/".$_FILES["fHinh"]["name"]))
			$hinhURL = $_FILES["fHinh"]["name"];
		else
			$hinhURL = "errorUpload.png";

		$ngayNhap = date("Y-m-d H:i:s");

		$sql = "INSERT INTO sanpham(TenSanPham, HinhURL, GiaSanPham, NgayNhap, SoLuongTon, SoLuongBan, SoLuocXem, MoTa, MaLoaiSanPham, MaHangSanXuat) 
							VALUES ('$ten','$hinhURL',$gia,'$ngayNhap',$ton,0,0,'$MoTa',$loai,$hang)";
		
		save($sql,0);
	}

	ChangeURL("../../index.php?c=2");
?>