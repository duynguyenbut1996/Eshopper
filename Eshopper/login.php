<?php
require_once './db/dbHelper.php';
require_once './inc_func.php';

if (isset($_POST["btnLogin"])) {
    $uid = $_POST["txtUID"];
    $pwd = $_POST["txtPWD"];
    $enc_pwd = substr(md5($pwd),0,20);
	echo $uid;
	echo $enc_pwd;

    $sql = "select * from taikhoan where TenDangNhap = '$uid' and MatKhau = '$enc_pwd'";
    $rs = load($sql);
    if ($rs->num_rows == 0) {
        $login_fail = 1;
    } else{

        $_SESSION["auth"] = 1;

        $row = $rs->fetch_assoc();
        $u = array();
        $u["TenDangNhap"] = $row["TenDangNhap"];
        $u["MaTaiKhoan"] = $row["MaTaiKhoan"];
        $u["TenHienThi"] = $row["TenHienThi"];
        $u["DiaChi"] = $row["DiaChi"];
        $u["DienThoai"] = $row["DienThoai"];
        $u["Email"] = $row["Email"];
		$u["MaLoaiTaiKhoan"]=$row["MaLoaiTaiKhoan"];
        //print_r($u);
        $_SESSION["auth_user"] = $u;
		if($row["MaLoaiTaiKhoan"] == 2)
			{
				//Tài khoản Admin
				ChangeURL("./admin/index.php");
			}

        // $_COOKIE["auth_user_id"] = $row["f_ID"];

        $remember = isset($_POST["chkRememberMe"]) ? true : false;
        if ($remember) {
            $expire = time() + 7 * 24 * 60 * 60;
            setcookie("auth_user_id", $row["MaTaiKhoan"], $expire);
        }

        //$_SESSION["auth_username"] = $row["f_Username"];
        //$_SESSION["auth_id"] = $row["f_ID"];

        ChangeURL("index.php");
    }

}
?>
<div class="container">
<div class="col-md-10">


            <h2 class="title text-center">Đăng nhập  </h2>

        <div class="panel-body">
            <form class="form-horizontal" action="" method="post" id="loginForm">

                <?php
                if (isset($login_fail) && $login_fail == 1) {
                    ?>
                    <div class="alert alert-warning alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <span>Đăng nhập thất bại</span>
                    </div>
                    <?php
                }
                ?>

                <div class="row">
                <div class="col-md-3">
                </div>
                    <div class="col-md-4 col-md-offset-1">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="txtUID" name="txtUID" placeholder="Tên đăng nhập">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="password" class="form-control" id="txtPWD" name="txtPWD" placeholder="Mật khẩu">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-5">
                                <label style="font-weight: normal">
                                    <input type="checkbox" name="chkRememberMe" /> Ghi nhớ
                                </label>
                            </div>
                            <div class="col-sm-6">
                                <button type="submit" class="btn btn-primary pull-right" name="btnLogin" id="btnLogin">
                                    <i class="fa fa-check"></i> Đăng nhập
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

</div>
</div>