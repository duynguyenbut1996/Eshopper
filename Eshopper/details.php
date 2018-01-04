 <?php
 require_once './inc_func.php';
 require_once './db/dbHelper.php';
 if (isset($_POST["btnAddToCart"])) {
    $sp = $_GET["id"];
    $slg = $_POST["txtQuantity"];
    setCart($sp, $slg);
    //print_r(getCart());
	ChangeURL("index.php?act=details&id=$sp");

}
if(isset($_POST["txtProId"])) {
    $sp = $_POST["txtProId"];
    $slg = 1;
    setCart($sp, $slg);
    print_r(getCart());
}
if (isset($_GET["id"])) {
                $id = $_GET["id"];
				
	}

//ChangeURL("index.php?act=details&id=$id");
 ?>

<section>
<div class="container">
    	
				<div class="col-sm-10" style="margin-left: 5%" >
                <form id="f" action="" method="post">
                            <input type="hidden" id="txtProId" name="txtProId" />
                        </form>
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Chi tiết sản phẩm </h2>
 <?php
            if (isset($_GET["id"])) {
                $id = $_GET["id"];
				
                $sql = "select * from sanpham where MaSanPham = $id";
                $rs = load($sql);
				
                if ($rs->num_rows == 0) {
                    echo "KHÔNG CÓ SẢN PHẨM.";
                } else 
				{
				while($row = $rs->fetch_assoc()) 
				{
					$soluocxem = $row["SoLuocXem"] + 1;
					$sql = "update sanpham set SoLuocXem = $soluocxem 
					where MaSanPham = $id";
					save($sql,1);
?>
								<div class="col-sm-12">
                                <center>		
											<img style="width:300px" src="images/shop/<?php echo $row["HinhURL"] ?>" alt="" />
                                            <b><p>
                                            	View:<?php												
												 echo $row["SoLuocXem"] + 1 ;
												 ?>
                                            	Số lượng bán:<?php echo $row["SoLuongBan"]; ?>
                                            </p></b>
                                            <p>
                                            	<?php echo $row["MoTa"] ?>
                                            </p>
                                            <h4><?php echo number_format($row["GiaSanPham"])." vnđ" ?></h4>
                                             <?php
												$sql = "select l.TenLoaiSanPham from loaisanpham l,sanpham s 
												where l.MaLoaiSanPham = s.MaLoaiSanPham and s.MaSanPham = $id";
												$rs = load($sql);
												if ($rs->num_rows == 0) {
													echo "KHÔNG CÓ SẢN PHẨM.";
												} else 
												{
												while($row = $rs->fetch_assoc()) 
												{
											?>
                                            	<b><p>Loại sản phẩm : <?php echo $row["TenLoaiSanPham"]; ?></p></b>
                                            <?php
                                            }}
                                            ?>
                                            <?php
												$sql = "select l.TenHangSanXuat from hangsanxuat l,sanpham s 
												where l.MaHangSanXuat = s.MaHangSanXuat and s.MaSanPham = $id";
												$rs = load($sql);
												if ($rs->num_rows == 0) {
													echo "KHÔNG CÓ SẢN PHẨM.";
												} else 
												{
												while($row = $rs->fetch_assoc()) 
												{
											?>
                                            	<b><p>Hãng sản xuất : <?php echo $row["TenHangSanXuat"]; ?></p></b>
                                            <?php
                                            }}
                                            ?>
                                             <?php if (isAuthenticated()) {
                        ?>
                                             <form class="form-horizontal" id="cartAdd-form" method="post" action="">
                            <div class="form-group">
                            <div class="col-sm-4">
                                    <div class="input-group" style="margin-left: 370px;">
                                        <input type="number" id="txtQuantity" name="txtQuantity" class="form-control" 
                                            placeholder="Số lượng" value="1" style="width: 80px">
                                        <span class="input-group-btn">
                                            <button class="btn btn-defaul add-to-cart" type="submit" name="btnAddToCart">
                                                <i class="fa fa-shopping-cart"> Đặt hàng</i>
                                            </button>
                                        </span>
                                    </div><!-- /input-group -->
                                </div>
                            </div>
                        </form>     
						 </center>
						</div>                              
					<?php
				}}}}else{
                ChageURL("index.php");
				}

				?>
    </div>
				
</div>
</section>
<div class="container">
    			<div class="col-sm-2"></div>
				<div class="col-sm-10" style="margin-right:200" >
		<h2 class="title text-center">Sản Phẩm Cùng Loại</h2>
      <?php
											$sql = "select * from sanpham where MaLoaiSanPham = (select l.MaLoaiSanPham from loaisanpham l,sanpham s where l.MaLoaiSanPham = s.MaLoaiSanPham and s.MaSanPham = $id) limit 5 ";
											$rs = load($sql);
							
										while ($row = $rs->fetch_assoc()) {
										?>
                                     	  <div class="col-sm-4">
                                			<div class="thumbnail" style="width:260px; height:260px">
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
<div class="container">
    	<div class="col-sm-2"></div>
				<div class="col-sm-10" style="margin-right:200" >

    <h2 class="title text-center">Sản Phẩm Cùng Hãng Sản Xuất</h2>
     <?php
											$sql = "select * from sanpham where MaHangSanXuat = (select l.MaHangSanXuat from hangsanxuat l,sanpham s where l.MaHangSanXuat = s.MaHangSanXuat and s.MaSanPham = $id) limit 5 ";
											$rs = load($sql);
							
										while ($row = $rs->fetch_assoc()) {
										?>
                                     	  <div class="col-sm-4">
                                			<div class="thumbnail" style="width:260px; height:260px">
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
