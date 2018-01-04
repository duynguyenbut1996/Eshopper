 <?php
  require_once './inc_func.php';
 require_once './db/dbHelper.php';
 if(isset($_POST["txtProId"])) {
    $sp = $_POST["txtProId"];
    $slg = 1;
    setCart($sp, $slg);
    print_r(getCart());
	if (isset($_GET["id"])) {
                $id = $_GET["id"];
	}

	ChangeURL("index.php?act=products&id=$id");
}
 ?>
 <section>
<div class="container">
        	
				<div class="col-sm-10" >
                <form id="f" action="" method="post">
                            <input type="hidden" id="txtProId" name="txtProId" />
                        </form>
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Sản Phẩm Theo Loại </h2>
 <?php
            if (isset($_GET["id"])) {
                $id = $_GET["id"];
                $sql = "select * from sanpham where MaLoaiSanPham = $id";
                $rs = load($sql);
                if ($rs->num_rows == 0) {
                    echo "KHÔNG CÓ SẢN PHẨM.";
                } else 
				{
				while($row = $rs->fetch_assoc()) 
				{
?>
								<div class="col-sm-6">
                                			<div class="thumbnail" >
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
				}}}
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