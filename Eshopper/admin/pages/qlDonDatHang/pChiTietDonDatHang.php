<?php
	require_once "../db/dbHelper.php";

// function ChangeURL($path)
// 	{
// 		echo '<script type = "text/javascript">';
// 		echo 'location = "'.$path.'";';
// 		echo '</script>';
// 	}
	if(!isset($_GET["id"]))
		ChangeURL("index.php?c=404");

	$id = $_GET["id"];
	$sql = "SELECT d.MaDonDatHang, d.NgayLap, d.TongThanhTien, t.TenHienThi, t.DiaChi, t.DienThoai , tt.MaTinhTrang, tt.TenTinhTrang FROM dondathang d, taikhoan t, tinhtrang tt WHERE d.MaTaiKhoan = t.MaTaiKhoan AND d.MaTinhTrang = tt.MaTinhTrang AND MaDonDatHang = $id";
	$result = load($sql);
	$row = $result->fetch_assoc();
?>
<fieldset>
	<legend>Thông tin đơn đặt hàng</legend>
	<div>
		<span>Mã đơn đặt hàng:</span>
		<?php echo $row["MaDonDatHang"]; ?>
	</div>
	<div>
		<span>Ngày đặt hàng:</span>
		<?php echo $row["NgayLap"]; ?>
	</div>
	<div>
		<span>Tên khách hàng:</span>
		<?php echo $row["TenHienThi"]; ?>
	</div>
	<div>
		<span>Số điện thoại:</span>
		<?php echo $row["DienThoai"]; ?>
	</div>
	<div>
		<span>Địa chỉ giao hàng:</span>
		<?php echo $row["DiaChi"]; ?>
	</div>
	<div>
		<span>Tổng thành tiền:</span>
		<?php echo $row["TongThanhTien"]; ?> đồng
	</div>
	<a href="pages/qlDonDatHang/xlDonDatHang.php?a=2&id=<?php echo $id; ?>" class="btnGiaoHang">
		Giao hàng
	</a>
	<a href="pages/qlDonDatHang/xlDonDatHang.php?a=1&id=<?php echo $id; ?>" class="btnThanhToan">
		Thanh toán
	</a>
	<a href="pages/qlDonDatHang/xlDonDatHang.php?a=3&id=<?php echo $id; ?>" class="btnHuy">
		Hủy đơn hàng
	</a>
	<a href="#" onclick="window.print();" class="btnInDonHang">
		In đơn hàng
	</a>
</fieldset>
<h2>Chi tiết đơn hàng</h2>
<table class="table" style="margin-top: 10px" cellspacing="0" border="1">
	<tr>
		<th scope="col" width="100">STT</th>
		<th scope="col" width="150">Tên sản phẩm</th>
		<th scope="col" width="100">Hình</th>
		<th scope="col" width="100">Số lượng</th>
		<th scope="col" width="100">Giá bán</th>
	</tr>
	<?php
		$sql = "SELECT s.TenSanPham, s.HinhURL, c.SoLuong, c.GiaBan FROM chitietdondathang c, sanpham s WHERE c.MaSanPham = s.MaSanPham AND c.MaDonDatHang = $id";
		$result = load($sql);
		$i = 1;
		while ($row = $result->fetch_assoc())
		{
			?>	
				<tr>
					<td><?php echo $i++; ?></td>
					<td><?php echo $row["TenSanPham"]; ?></td>
					<td>
						<img src="../images/shop/<?php echo $row["HinhURL"]; ?>" height="35" />
					</td>
					<td><?php echo $row["SoLuong"]; ?></td>
					<td><?php echo $row["GiaBan"]; ?></td>
				</tr>
			<?php
		}
	?>
</table>