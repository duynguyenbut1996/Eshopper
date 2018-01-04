<?php
// function ChangeURL($path)
// 	{
// 		echo '<script type = "text/javascript">';
// 		echo 'location = "'.$path.'";';
// 		echo '</script>';
// 	}
	if(!isset($_GET["id"]))
	ChangeURL("index.php?c=404");

	$id = $_GET["id"];
	$sql = "SELECT * FROM hangsanxuat WHERE MaHangSanXuat = $id";
	$result = load($sql);
	$row = $result->fetch_assoc();
?>
<form action="pages/qlHang/xlCapNhat.php" method="get" onsubmit="return KiemTra();">
	<fieldset>
		<h3 style="margin-bottom:20px">Cập nhật thông tin hãng sản xuất</h3>
		<div>
			<span>Tên hãng sản xuất:</span>
			<input class="form-control" style="display: unset;width: 30%" type="text" name="txtTen" id="txtTen" value="<?php echo $row["TenHangSanXuat"]; ?>" />
			<input type="hidden" name="id" value="<?php echo $row["MaHangSanXuat"]; ?>" />
			<input class="btn" type="submit" value="Cập nhật" />
		</div>
		<div id="error"></div>
	</fieldset>
</form>
<script type="text/javascript">
	function KiemTra()
	{
		var ten = document.getElementById("txtTen");
		var err = document.getElementById("error");
		if(ten.value == "")
		{
			err.innerHTML = "Tên hãng sản xuất không được rỗng";
			ten.focus();
			return false;
		}
		else
			err.innerHTML = "";

		return true;
	}
</script>