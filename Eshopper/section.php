<?php
	require_once './inc_func.php';
	require_once './db/dbHelper.php';
	if(isset($_POST["txtProId"])) {
    $sp = $_POST["txtProId"];
    $slg = 1;
    setCart($sp, $slg);
	ChangeURL("index.php");
    print_r(getCart());
}
?>

<form id="f" action="" method="post">
                            <input type="hidden" id="txtProId" name="txtProId" />
                        </form>
<section>
		<div class="container" <style />
        	
				<div class="col-sm-10 padding-right">
					<div class="features_items" style="margin-left: 7%">
						<h2 class="title text-center">Sản Phẩm Mới</h2>	
                                        <?php
											$sql = "select * from sanpham order by NgayNhap  DESC limit 10";
											$rs = load($sql);
							
										while ($row = $rs->fetch_assoc()) {
										?>
                                        
                                     	  <div class="col-sm-3">
                                			<div class="thumbnail" style="width:200px; height:260px">
											<a href="index.php?act=details&id=<?php echo $row["MaSanPham"]; ?>"><img style="width:100px" src="images/shop/<?php echo $row["HinhURL"] ?>" alt="" /></a>
                                            <h3><?php echo $row["TenSanPham"] ?></h3>
											<h4><?php echo number_format($row["GiaSanPham"])." vnđ" ?></h4>
                                            <?php if (isAuthenticated()) { ?>
											<a href="#" class="btn btn-defaul add-to-cart" role="button" onclick="setProId(<?php echo $row["MaSanPham"];
											 ?>);"><i class="fa fa-shopping-cart">
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
								?>
      							</div>
                            <div class="features_items"><!--features_items-->
						<h2 class="title text-center">Sản Phẩm Bán Chạy Nhất</h2>
						 <?php
											$sql = "select * from sanpham order by SoLuongBan  DESC limit 10";
											$rs = load($sql);
							
										while ($row = $rs->fetch_assoc()) {
										?>
                                     	  <div class="col-sm-3">
                                			<div class="thumbnail" style="width:200px; height:260px">
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
								?>
							</div>
		
						<h2 class="title text-center">Sản Phẩm Xem Nhiều Nhất</h2>
						 <?php
											$sql = "select * from sanpham order by SoLuocXem  DESC limit 10";
											$rs = load($sql);
							
										while ($row = $rs->fetch_assoc()) {
										?>
                                     	  <div class="col-sm-3">
                                			<div class="thumbnail" style="width:200px; height:260px">
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
								?>
                                 </div>
                                </div>
	
</section>

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