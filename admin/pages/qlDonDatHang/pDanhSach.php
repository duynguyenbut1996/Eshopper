
<table class="table" cellspacing="0" border="1">
	<tr>
		<th scope="col" width="100">STT</th>
		<th scope="col" width="150">Mã đơn đặt hàng</th>
		<th scope="col" width="100">Ngày lập</th>
		<th scope="col" width="200">Khách hàng</th>
		<th scope="col" width="100">Tình trạng</th>
		<th scope="col" width="200">Thao tác</th>
	</tr>
	<?php

		$sql = "SELECT d.MaDonDatHang, d.NgayLap, d.MaTinhTrang, t.TenHienThi, tt.TenTinhTrang FROM dondathang d, taikhoan t, tinhtrang tt WHERE d.MaTaiKhoan = t.MaTaiKhoan AND d.MaTinhTrang = tt.MaTinhTrang ORDER BY d.MaTinhTrang, d.NgayLap";
		$result =load($sql);
		$i = 1;
		while ($row = $result->fetch_assoc())
		{
			$c = "";
			switch($row["MaTinhTrang"]){
				case 2:
					$c = "classGiaoHang";
					break;
				case 1:
					$c = "classThanhToan";
					break;
				case 3:
					$c = "classHuy";
					break;
			}
			?>	
				<tr class="<?php echo $c; ?>">
					<td><?php echo $i++; ?></td>
					<td><?php echo $row["MaDonDatHang"]; ?></td>
					<td><?php echo $row["NgayLap"]; ?></td>
					<td><?php echo $row["TenHienThi"]; ?></td>
					<td><?php echo $row["TenTinhTrang"]; ?></td>
					<td>
						<a href="index.php?c=5&a=2&id=<?php echo $row["MaDonDatHang"] ?>">
							<img src="images/edit.png" />
						</a>
					</td>
				</tr>
			<?php
		}
	?>
</table>