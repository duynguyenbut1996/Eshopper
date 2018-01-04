 <?php
  require_once './inc_func.php';
 require_once './db/dbHelper.php';
 if(isset($_POST["txtProId"])) {
    $sp = $_POST["txtProId"];
    $slg = 1;
    setCart($sp, $slg);
   // print_r(getCart());
}


 ?>
<div class="container">
	<form id="f" action="" method="post">
		<input type="hidden" id="txtProId" name="txtProId" />
	</form>
<div class="col-md-11">
            <h2 class="title text-center">Kết quả tìm kiếm  </h2>
            <?php
			if(isset ($_POST['search']))
			{
				$mang = $_POST['danhsach'];
				$search = strtolower($_POST['se']);
				if($mang == 1)
				{
					$sql = "select s.MaSanPham,s.TenSanPham,s.GiaSanPham,s.HinhURL from sanpham s,loaisanpham l where s.MaLoaiSanPham = l.MaLoaiSanPham and ( s.MaLoaiSanPham = '$search' or l.TenLoaiSanPham like '%$search%')";
					$rs = load($sql);
					if ($rs->num_rows == 0) {
						echo "KHÔNG CÓ SẢN PHẨM.";
					} else 
					{
					while($row = $rs->fetch_assoc()) 
					{
					?>
				<div class="col-sm-6">
					<div class="thumbnail">
						<a href="index.php?act=details&id=<?php echo $row["MaSanPham"]; ?>"><img style="width:100px" src="images/shop/<?php echo $row["HinhURL"] ?>" alt="" /></a>
						<h3><?php echo $row["TenSanPham"] ?></h3>
						<h4><?php echo number_format($row["GiaSanPham"])." vnđ" ?></h4>
							<?php if (isAuthenticated()) { ?>
								<a href="#" class="btn btn-defaul add-to-cart" role="button" onclick="setProId(<?php echo $row["MaSanPham"]; ?>);">
									<i class="fa fa-shopping-cart"></i>Đặt Hàng
								</a>
							<?php
							}
							?>
						<a href="index.php?act=details&id=<?php echo $row["MaSanPham"]; ?>" class="btn btn-danger" style=" margin-bottom:26px" role="button">
						Chi tiết
						</a>                             							
					</div>
				</div>						  
					<?php	
					}
				}
			}
					?>
                    <?php
					if($mang == 2) {
						$sql = "select s.MaSanPham,s.TenSanPham,s.GiaSanPham,s.HinhURL from sanpham s,hangsanxuat l where s.MaHangSanXuat = l.MaHangSanXuat and ( s.MaHangSanXuat = '$search' or l.TenHangSanXuat like '%$search%')";
						$rs = load($sql);
						if ($rs->num_rows == 0) {
							echo "KHÔNG CÓ SẢN PHẨM.";
						} else 
						{
						while($row = $rs->fetch_assoc()) 
						{
					?>
						<div class="col-sm-6">
									<div class="thumbnail">
									<a href="index.php?act=details&id=<?php echo $row["MaSanPham"]; ?>"><img style="width:100px" src="images/shop/<?php echo $row["HinhURL"] ?>" alt="" /></a>
									<h3><?php echo $row["TenSanPham"] ?></h3>
									<h4><?php echo number_format($row["GiaSanPham"])." vnđ" ?></h4>
									<?php if (isAuthenticated()) { ?>
				<a href="#" class="btn btn-defaul add-to-cart" role="button" onclick="setProId(<?php echo $row["MaSanPham"]; ?>);"><i class="fa fa-shopping-cart">
				</i>Đặt Hàng</a>
					<?php
				}
				?>
						<a href="index.php?act=details&id=<?php echo $row["MaSanPham"]; ?>" class="btn btn-danger" style=" margin-bottom:26px" role="button">
							Chi tiết
						</a>                             			
									
						</div>
					</div>							  
					<?php
							}
						}
					}
					?>
                    <?php
					if($mang == 3) {
						$sql = "select * from sanpham where GiaSanPham - $search < abs(100000)";
						$rs = load($sql);
						if ($rs->num_rows == 0) {
							echo "KHÔNG CÓ SẢN PHẨM.";
						} else 
						{
						while($row = $rs->fetch_assoc()) 
						{
					?>
					<div class="col-sm-6">
							<div class="thumbnail">
							<a href="index.php?act=details&id=<?php echo $row["MaSanPham"]; ?>"><img style="width:100px" src="images/shop/<?php echo $row["HinhURL"] ?>" alt="" /></a>
							<h3><?php echo $row["TenSanPham"] ?></h3>
							<h4><?php echo number_format($row["GiaSanPham"])." vnđ" ?></h4>
							<?php if (isAuthenticated()) { ?>
					<a href="#" class="btn btn-defaul add-to-cart" role="button" onclick="setProId(<?php echo $row["MaSanPham"]; ?>);"><i class="fa fa-shopping-cart"></i>Đặt Hàng</a>
						<?php
					}
					?>
					<a href="index.php?act=details&id=<?php echo $row["MaSanPham"]; ?>" class="btn btn-danger" style=" margin-bottom:26px" role="button">
						Chi tiết
					</a>                             			
							
							</div>
						</div>				  
					<?php
									}}}
					?>
                    <?php
					if($mang == 4) {
								$sql = "select * from sanpham where TenSanPham like '%$search%'";
								$rs = load($sql);
								if ($rs->num_rows == 0) {
									echo "KHÔNG CÓ SẢN PHẨM.";
								} else 
								{
								while($row = $rs->fetch_assoc()) 
									{
					?>
								<div class="col-sm-6">
									<div class="thumbnail">
										<a href="index.php?act=details&id=<?php echo $row["MaSanPham"]; ?>"><img style="width:100px" src="images/shop/<?php echo $row["HinhURL"] ?>" alt="" /></a>
										<h3><?php echo $row["TenSanPham"] ?></h3>
										<h4><?php echo number_format($row["GiaSanPham"])." vnđ" ?></h4>
										<?php if (isAuthenticated()){ ?>
									<a href="#" class="btn btn-defaul add-to-cart" role="button" onclick="setProId(<?php echo $row["MaSanPham"]; ?>);"><i class="fa fa-shopping-cart">
									</i>Đặt Hàng</a>
										<?php
									}
									?>
										<a href="index.php?act=details&id=<?php echo $row["MaSanPham"]; ?>" class="btn btn-danger" style=" margin-bottom:26px" role="button">
											Chi tiết
										</a>                             								
									</div>
								</div>				  
					<?php
									}
								}	
							}
					?>
                    <?php
					
			}
					?>
	</div>
</div>
<?php
$js = <<<JS

<script type="text/javascript">
    function setProId(id) {
        f.txtProId.value = id;
        f.submit();
    }
</script>
JS;
?>
