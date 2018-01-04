<a href="index.php?c=3&a=3">
	<img src="images/new.png" />
</a>
<table class="table" cellspacing="0" border="1">
	<tr>
		<th scope="col" width="100">STT</th>
		<th scope="col" width="300">Tên tên loại sản phẩm</th>
		<th scope="col" width="200">Thao tác</th>
	</tr>
	<?php
		$sql = "SELECT * FROM loaisanpham";
		$rs = load($sql);
		$i = 1;
		while ($row = $rs->fetch_assoc())
		{
			?>	
				<tr>
					<td><?php echo $i++; ?></td>
					<td><?php echo $row["TenLoaiSanPham"]; ?></td>
					<td>
						<a href="pages/qlLoai/xlKhoa.php?id=<?php echo $row["MaLoaiSanPham"] ?>" onclick="return confirm('ban co muon xoa san pham nay')">
							<img src="images/delete.png" />
						</a>
						<a href="index.php?c=3&a=2&id=<?php echo $row["MaLoaiSanPham"] ?>">
							<img src="images/edit.png" />
						</a>
					</td>
				</tr>
			<?php
		}
	?>
</table>