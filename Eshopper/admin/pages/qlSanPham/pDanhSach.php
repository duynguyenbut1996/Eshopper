<a href="index.php?c=2&a=3">
	<img src="images/new.png" />
</a>
<table class="table" cellspacing="0" border="1">
	<tr>
		<th scope="col" width="100">STT</th>
		<th scope="col" width="300">Tên sản phẩm</th>
		<th scope="col" width="100">Hình</th>
		<th scope="col" width="100">Giá</th>
		<th scope="col" width="100">Ngày nhập</th>
		<th scope="col" width="100">Số lượng tồn</th>
		<th scope="col" width="100">Số lượng bán</th>
		<th scope="col" width="100">Số lược xem</th>
		<th scope="col" width="100">Loại</th>
		<th scope="col" width="100">Hãng</th>
		<th scope="col" width="100">Mô tả</th>
		<th scope="col" width="200">Thao tác</th>
	</tr>
	<?php
		$sql = "SELECT s.MaSanPham, s.TenSanPham, s.HinhURL, s.GiaSanPham, s.NgayNhap, s.SoLuongTon, s.SoLuongBan, s.SoLuocXem, s.MoTa,  l.TenLoaiSanPham, h.TenHangSanXuat FROM sanpham s, loaisanpham l, hangsanxuat h WHERE s.MaLoaiSanPham = l.MaLoaiSanPham AND s.MaHangSanXuat = h.MaHangSanXuat ORDER BY s.MaSanPham DESC";
		$result = load($sql);
		$i = 1;
		while ($row = $result->fetch_assoc())
		{
			?>	
				<tr>
					<td><?php echo $i++; ?></td>
					<td><?php echo $row["TenSanPham"]; ?></td>
					<td>
						<img src="../images/shop/<?php echo $row["HinhURL"]; ?>" height="50px" />
					</td>
					<td><?php echo $row["GiaSanPham"]; ?></td>
					<td><?php echo $row["NgayNhap"]; ?></td>
					<td><?php echo $row["SoLuongTon"]; ?></td>
					<td><?php echo $row["SoLuongBan"]; ?></td>
					<td><?php echo $row["SoLuocXem"]; ?></td>
					<td><?php echo $row["TenLoaiSanPham"]; ?></td>
					<td><?php echo $row["TenHangSanXuat"]; ?></td>
					<td>
						<?php 
							if(strlen($row["MoTa"]) > 20)
								$sMoTa = substr($row["MoTa"], 0, 20)."...";
							else
							 	$sMoTa = $row["MoTa"]; 
							echo $sMoTa;
						?>
						<div class="fullMoTa">
							<?php echo $row["MoTa"]; ?>
						</div>
					</td>
					<td>
						<a href="pages/qlSanPham/xlKhoa.php?id=<?php echo $row["MaSanPham"] ?>" onclick="return confirm('ban co muon xoa san pham nay')">
							<img src="images/delete.png" />
						</a>
						<a href="index.php?c=2&a=2&id=<?php echo $row["MaSanPham"] ?>">
							<img src="images/edit.png" />
						</a>
					</td>
				</tr>
			<?php
		}
	?>
</table>