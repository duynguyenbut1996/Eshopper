<?php 
	require_once './inc_func.php';
 require_once './db/dbHelper.php';
?>
<?php
if (isset($_POST["txtXProId"])) {
    $id = $_POST["txtXProId"];
    remove_cart_item($id);
}

if (isset($_POST["txtUProId"])) {
    $id = $_POST["txtUProId"];
    $q = $_POST["txtUQ"];
    update_cart_item($id, $q);
}

if (isset($_POST["btnCheckout"]) && $_POST['txtTotal']) {
    $total = $_POST["txtTotal"];
    $userid = $_SESSION["auth_user"]["MaTaiKhoan"];
    $order_date = date('Y-m-d H:i:s', time());

    $sql = "insert into dondathang values(null,'$order_date',$total, $userid,2)";
    $order_id = save($sql, 0);

    foreach ($_SESSION["cart"] as $id => $quantity) {
        $sql = "select * from sanpham where MaSanPham=$id";
        $rs = load($sql);
        $row = $rs->fetch_assoc();
		$soluongton = $row["SoLuongTon"];
		$soluongban = $row["SoLuongBan"];
        $price = $row["GiaSanPham"];
		$soluongtonmoi = $soluongton - $quantity;
		$soluongbanmoi = $soluongban + $quantity;
        $amount = $price * $quantity;
        $sql = "insert into chitietdondathang values(null,$quantity, $price, $order_id, $id, $amount)";
        save($sql, 0);
		$sql = "update sanpham set SoLuongTon = $soluongtonmoi WHERE MaSanPham=$id ";
		save($sql,1);
		$sql = "update sanpham set SoLuongBan = $soluongbanmoi WHERE MaSanPham=$id ";
		save($sql,1);
    }
	unset($_SESSION["cart"]);
	ChangeURL('index.php?act=thanhtoan');
}
?>
<div class="container">
<div class="col-md-10">
    <h2 class="title text-center">	Giỏ hàng của bạn </h2>
        <div  align="center">
            <form action="" method="post" name="f">
                <input type="hidden" name="txtXProId" />
                <input type="hidden" name="txtUProId" />
                <input type="hidden" name="txtUQ" />
            </form>
            <?php
					if(isset ($_SESSION['cart']))
					{
						?>
            <table class="table table-hover" style="text-align:center">
                <thead>
                    <tr>
                    
                        <th class="col-sm-5">			Sản phẩm</th>
                        <th class="col-sm-2">Giá</th>
                        <th class="col-sm-2">Số lượng</th>
                        <th class="col-sm-2">Thành tiền</th>
                        <th class="col-sm-1">&nbsp;</th>
                    </tr>
                </thead>
                <tbody> 
                    <?php
                    $total = 0;
                    foreach ($_SESSION["cart"] as $id => $quantity) {
                        $sql = "select * from sanpham where MaSanPham=$id";
                        $rs = load($sql);
                        $row = $rs->fetch_assoc();
                        ?>
                        <tr>
                       
                            <td align="left"><img src="./images/shop/<?php echo $row['HinhURL'] ?>" width="30px"/><?php echo $row["TenSanPham"]; ?></td>
                            <td align="left"><?php echo number_format($row["GiaSanPham"]); ?></td>
                            <td align="left"><input id="txtQ_<?php echo $row["MaSanPham"]; ?>" style="width: 50px" type="text" 
                            value="<?php echo $quantity; ?>" /></td>
                            <td align="left"><?php echo number_format($row["GiaSanPham"] * $quantity); ?></td>
                            <td align="left">
                                <a  href="javascript:;" role="button" title="Xoá" 
                                onclick="setXProId(<?php echo $row["MaSanPham"]; ?>);">
                                   <i style="width:20px" class="fa fa-times" aria-hidden="true"></i>

                                </a>
                                <a class="" href="javascript:;" role="button" title="Cập nhật" 
                                onclick="setUProId(<?php echo $row["MaSanPham"]; ?>);">
                                   <i class="fa fa-pencil" aria-hidden="true"></i>


                                </a>
                            </td>
                        </tr>
                        <?php
                        $total += $row["GiaSanPham"] * $quantity;
                    }
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td align="left"><h4>Total:</h4></td>
                        <td align="left" class="text-danger" colspan="2">
                            <h4><?php echo number_format($total); ?></h4>                            
                        </td>
                    </tr>
                </tfoot>
            </table>
                    <?php
					}?>    
            <form action="" method="post">
                <input type="hidden" name="txtTotal" value="<?php echo $total; ?>" />
                
                <div class="row">
                    <div class="col-md-12">
                        <a class="btn btn-success" href="index.php" role="button">
                            <i class="fa fa-mail-reply"></i> Tiếp tục mua hàng
                        </a>
                        <button type="submit" id="btnCheckout" name="btnCheckout" class="btn btn-danger">
                            <i class="fa fa-check"></i> Thanh toán
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

                    
<?php

$js = <<<JS
<script type="text/javascript">
    function setXProId(id) {
        f.txtXProId.value = id;
        f.submit();
    }
        
    function setUProId(id) {
        var idQ = "txtQ_" + id;
        var txtQ = document.getElementById(idQ);
        var q1 = txtQ.value;
        f.txtUProId.value = id;
        f.txtUQ.value = q1;
        
        f.submit();
    }
</script>
JS;
?>
