<?php
require_once './db/dbHelper.php';


if (isset($_POST["btnRegister"])) {

    //
    // kiểm tra captcha


    if (empty($_SESSION['captcha']) || strtolower(trim($_POST['txtCaptcha'])) != ($_SESSION['captcha'])) {
        echo "WRONG CAPTCHA";
    } else {
        $uid = $_POST["txtUID"];
        $pwd = $_POST["txtPWD"];
        $enc_pwd = md5($pwd);

        $fullname = $_POST["txtFullName"];
        $email = $_POST["txtEmail"];
        $str_dc = $_POST["txtDC"];
		$str_sdt = $_POST["txtsdt"];
        
        $sql = "insert into taikhoan(MaTaiKhoan,TenDangNhap,MatKhau,TenHienThi,DiaChi,DienThoai,Email,MaLoaiTaiKhoan) values(null,'$uid', '$enc_pwd', '$fullname','$str_dc','$str_sdt', '$email', 1)";

        $id = save($sql, 0);
		
        echo $id;

    }
}
?>
<div class="container">

<div class="col-md-9">
    
            <h2 class="title text-center">Đăng Kí Người Dùng  </h2>
<div class="panel panel-default">
        <div class="panel-body">
            <form class="form-horizontal" action="" method="post" id="registerForm" onsubmit="return validate();">       
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="txtUID" placeholder="Tên đăng nhập"><br>
                            </div>
                            <div class="col-sm-6">
                                <input type="email" class="form-control" name="txtEmail" placeholder="Email"><br>
                            </div>
                            <div class="col-sm-6">
                            <input type="password" class="form-control" name="txtPWD" placeholder="Mật khẩu"><br>
                                
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="txtFullName" placeholder="Họ tên"><br>
                            </div>
                             
                            <div class="col-sm-6">
                                <input type="password" class="form-control" name="txtConfirmPWD" placeholder="Nhập lại mật khẩu"><br>
                            </div>
                        	 <div class="col-sm-6">                                                
                                <input type="text" class="form-control" name="txtDC" placeholder="Địa chỉ"><br>
                            </div>
                       
                            <div class="col-sm-6">
                                <img onclick="this.src = 'cool-php-captcha-0.3.1/captcha.php?' + Math.random();"  style="cursor: pointer" id="captchaImg" src="cool-php-captcha-0.3.1/captcha.php" /><br>
                            </div>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" name="txtsdt" placeholder="Số điện thoại"><br>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="txtCaptcha" name="txtCaptcha" placeholder="Captcha"><br>
                            </div>
                            
                            
                        </div>
                    </div>
                </div>
                
                <div class="row">
                        <div class="form-group">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-success pull-right" name="btnRegister">
                                    <i class="fa fa-check"></i> Đăng ký
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
