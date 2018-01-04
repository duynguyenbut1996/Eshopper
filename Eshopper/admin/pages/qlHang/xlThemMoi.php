<?php
	require_once "../../../db/dbHelper.php";
function ChangeURL($path)
	{
		echo '<script type = "text/javascript">';
		echo 'location = "'.$path.'";';
		echo '</script>';
	}
	if(isset($_GET["txtTen"]))
	{
		$ten = $_GET["txtTen"];
			
		$sql = "INSERT INTO HangSanXuat VALUES(null,'$ten')";
		save($sql,0);
	}

	ChangeURL("../../index.php?c=4");
?>