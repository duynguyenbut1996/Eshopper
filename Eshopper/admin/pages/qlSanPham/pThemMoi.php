<form action="pages/qlSanPham/xlThemMoi.php" method="post" onsubmit="return KiemTra();" enctype="multipart/form-data">
	<fieldset class="themSanPham">
		<legend>Thêm sản phẩm mới</legend>
		<div>
			<span>Tên sản phẩm:</span>
			<input type="text" name="txtTen" id="txtTen" />
			<i id="errTen"></i>
		</div>
		<div>
			<span>Hãng sản xuất</span>
			<select name="cmbHang">
				<?php
					$sql = "SELECT * FROM hangsanxuat ";
					$result = load($sql);
					while($row = $result->fetch_assoc()){
						?>
							<option value="<?php echo $row["MaHangSanXuat"]; ?>"><?php echo $row["TenHangSanXuat"]; ?></option>
						<?php
					}
				?>
			</select>
		</div>
		<div>
			<span>Loại sản phẩm</span>
			<select name="cmbLoai">
				<?php
					$sql = "SELECT * FROM loaisanpham ";
					$result = load($sql);
					while($row = $result->fetch_assoc()){
						?>
							<option value="<?php echo $row["MaLoaiSanPham"]; ?>"><?php echo $row["TenLoaiSanPham"]; ?></option>
						<?php
					}
				?>
			</select>
		</div>
		<div>
			<span>Hình</span>
			<input type="file" name="fHinh" />
		</div>
		<div>
			<span>Giá</span>
			<input type="text" name="txtGia" id="txtGia" />
			<i id="errGia"></i>
		</div>
		<div>
			<span>Số lượng tồn</span>
			<input type="text" name="txtTon" id="txtTon" />
			<i id="errTon"></i>
		</div>
		<div>
			<span>Mô tả</span>
			<textarea name="txtMoTa"></textarea>
		</div>
		<div>
			<input type="submit" value="Thêm mới" />
		</div>
	</fieldset>
</form>
<script type="text/javascript">
	function KiemTra()
	{
		var ten = document.getElementById("txtTen");
		var err = document.getElementById("errTen");
		if(ten.value == "")
		{
			err.innerHTML = "Tên sản phẩm không được rỗng";
			ten.focus();
			return false;
		}
		else
			err.innerHTML = "";

		var ten = document.getElementById("txtGia");
		var err = document.getElementById("errGia");
		if(ten.value == "")
		{
			err.innerHTML = "Giá sản phẩm không được rỗng";
			ten.focus();
			return false;
		}
		else
			err.innerHTML = "";

		var ten = document.getElementById("txtTon");
		var err = document.getElementById("errTon");
		if(ten.value == "")
		{
			err.innerHTML = "Số lượng tồn không được rỗng";
			ten.focus();
			return false;
		}
		else
			err.innerHTML = "";

		return true;
	}
</script>