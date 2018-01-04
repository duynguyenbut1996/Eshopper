<?php
require_once './inc_func.php';
require_once './db/dbHelper.php';

if (isAuthenticated() == false) {
    ChangeURL("index.php?act=login");
}
?>
<div class="container">
<div class="col-md-10">
    
            <h2 class="title text-center">Thông tin người dùng</h2>
        
        <div class="form-group">
            <form method="post">
            
            <div class="col-sm-6">
            Tên hiện thị : <input class="form-control" type="text" name="tht" value="<?php echo$_SESSION["auth_user"]["TenHienThi"] ?>">
            <br><br>            
            </div>
            <div class="col-sm-6">
            Địa chỉ : <input class="form-control" type="text" name="dc" value="<?php echo   $_SESSION["auth_user"]["DiaChi"] ?>"><br><br>
            </div>
            <div class="col-sm-6">
            Điện thoại : <input class="form-control" type="text" name="dt" value="<?php echo   $_SESSION["auth_user"]["DienThoai"] ?>"><br><br>
            </div>
            <div class="col-sm-6">
            Email : <input class="form-control" type="text" name="email" value="<?php echo   $_SESSION["auth_user"]["Email"] ?>"><br><br>
            </div>
			<input type="hidden" name="ma" value="<?php echo   $_SESSION["auth_user"]["MaTaiKhoan"] ?>"><br><br>
            <input class="btn btn-danger" type="submit" name="update" value="UPDATE">
            </form>

        </div>
        <?php 
		if(isset($_POST['update']))
		{
			$tht = $_POST['tht'];
			$dc = $_POST['dc'];
			$dt = $_POST['dt'];
			$email = $_POST['email'];
			$ma = $_POST['ma'];
			
			$sql = "update taikhoan set TenHienThi = '$tht' , DiaChi = '$dc',DienThoai = '$dt',Email = '$email' where MaTaiKhoan = '$ma'";
			save($sql,1);
			echo '<h1>'.'Update thành công , thông tin sẽ được cập nhật trong lần đăng nhập tiếp theo'.'</h1>';
			
		}
		?>

        <h2 class="title text-center">Đổi mật khẩu</h2>
        <form method="post" style="text-align:left">
        Mật khẩu cũ &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp;  &nbsp;  <input type="password" name="pc"><br><br>
        Mật khẩu mới  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; <input type="password" name="pn"><br><br>
        Nhập lại mật khẩu mới   <input type="password" name="rpn"><br><br>
        <input type="hidden" name="ma" value="<?php echo   $_SESSION["auth_user"]["MaTaiKhoan"] ?>">
        <input type="submit" name="doipass" value="Đổi mật khẩu">
        </form>
    	 <?php 
		 if(isset($_POST['doipass']))
		{
			$ma = $_POST['ma'];
			$m = $_POST['pc'];
			$mm = $_POST['pn'];
			$r = $_POST['rpn'];
			$matkhaumoi = substr(md5($mm),0,20);
			$sql = "select MatKhau from taikhoan where MaTaiKhoan = '$ma' ";
			$rs = load($sql);
			$row = $rs->fetch_assoc();
			if($row['MatKhau'] == substr(md5($m),0,20) )
			{
				if($mm == $r)
				{
				$sql = "update taikhoan set MatKhau = '$matkhaumoi'  where MaTaiKhoan = '$ma'";
				save($sql,1);
				echo '<h1>'.'Update mật khẩu thành công '.'</h1>';
				}
				else{
					echo '<h1>'.'Update mật khẩu Thất bại , nhập lại mật khẩu mới không đúng '.'</h1>';
				}
			}
			else{
			
			
			echo '<h1>'.'Update thất bại mật khẩu cũ không đúng'.'</h1>';
			}
		}
		?>
</div>
</div>