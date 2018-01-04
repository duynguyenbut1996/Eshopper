<table class="table" cellspacing="0" border="1">
	<tr>
		<th scope="col" width="100">Mã tài khoản</th>
		<th scope="col" width="200">Tên đăng nhập</th>
		<th scope="col" width="200">Tên hiển thị</th>
		<th scope="col" width="200">Địa chỉ</th>
		<th scope="col" width="150">Điện thoại</th>
		<th scope="col" width="200">Email</th>
		<th scope="col" width="150">Loại tài khoản</th>
		<th scope="col" width="100">Thao tác</th>
	</tr>
	<?php
		$sql = "SELECT t.MaTaiKhoan, t.TenDangNhap, t.TenHienThi, t.DiaChi, t.DienThoai, t.Email, l.TenLoaiTaiKhoan FROM taikhoan t, loaitaikhoan l WHERE t.MaLoaiTaiKhoan = l.MaLoaiTaiKhoan";
		$rs = load($sql); 
		while ($row = $rs->fetch_assoc())
		{
			?>	
				<tr>
					<td><?php echo $row["MaTaiKhoan"]; ?></td>
					<td><?php echo $row["TenDangNhap"]; ?></td>
					<td><?php echo $row["TenHienThi"]; ?></td>
					<td><?php echo $row["DiaChi"]; ?></td>
					<td><?php echo $row["DienThoai"]; ?></td>
					<td><?php echo $row["Email"]; ?></td>
					<td><?php echo $row["TenLoaiTaiKhoan"]; ?></td>
					<td>
						<a href="pages/qlTaiKhoan/xlKhoa.php?id=<?php echo $row["MaTaiKhoan"] ?>"  onclick="return confirm('ban co muon xoa tai khoan nay')">
							<img src="images/delete.png" />
						</a>
						<a href="index.php?c=1&a=2&id=<?php echo $row["MaTaiKhoan"] ?>">
							<img src="images/edit.png" />
						</a>
					</td>
				</tr>
			<?php
		}
	?>
</table>