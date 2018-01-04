<a href="index.php?c=4&a=3">
	<img src="images/new.png" />
</a>
<table class="table" cellspacing="0" border="1">
	<tr>
		<th scope="col" width="100">STT</th>
		<th scope="col" width="300">Tên hãng sản xuất</th>
		<th scope="col" width="200">Thao tác</th>
	</tr>
	<?php
		$sql = "SELECT * FROM hangsanxuat";
		$result = load($sql);
		$i = 1;
		while ($row = $result->fetch_assoc())
		{
			?>	
				<tr>
					<td><?php echo $i++; ?></td>
					<td><?php echo $row["TenHangSanXuat"]; ?></td>
					<td>
						<a href="pages/qlHang/xlKhoa.php?id=<?php echo $row["MaHangSanXuat"] ?>">
							<img src="images/delete.png" />
						</a>
						<a href="index.php?c=4&a=2&id=<?php echo $row["MaHangSanXuat"] ?>">
							<img src="images/edit.png" />
						</a>
					</td>
				</tr>
			<?php
		}
	?>
</table>