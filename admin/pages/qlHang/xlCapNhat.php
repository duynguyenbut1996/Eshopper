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
		$ten = $_GET["txtTen"];
		$sql = "UPDATE HangSanXuat SET TenHangSanXuat = '$ten' WHERE MaHangSanXuat = $id";
		
		save($sql,1);
	}

	ChangeURL("../../index.php?c=4");
?>