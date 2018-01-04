<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> +84 120 506 3085</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> shopruouonline@gmail.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="https://www.facebook.com/duyUS05" target="_blank"><i class="fa fa-facebook"></i></a></li>
								<li><a href="https://twitter.com/?lang=vi" target="_blank"><i class="fa fa-twitter"></i></a></li>
								<li><a href="https://www.linkedin.com/" target="_blank"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="https://dribbble.com/" target="_blank"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="https://plus.google.com/collections/featured" target="_blank"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
                    </div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
                         <?php
                require_once './inc_func.php';
                if (isAuthenticated() == false) {
                    ?>
								<li><a href="index.php?act=register"><i class="fa fa-user"></i> Đăng kí</a></li>
                                <li><a href="index.php?act=login"><i class="fa fa-lock"></i> Đăng Nhập</a></li>
                    <?php
                } else {
                    ?>
                    <li>
                        <a href="index.php?act=cart">Giỏ hàng có <?php echo cart_sum_items(); ?> sản phẩm!</a>
                    </li>
								<li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
						<?php echo $_SESSION["auth_user"]["TenHienThi"]; ?> <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="index.php?act=profile">
                                    <i class="fa fa-user"></i>
                                    Xem thông tin cá nhân
                                </a>
                            </li>
                            <li>
                                <a href="logout.php">
                                    <i class="fa fa-sign-out"></i>
                                    Thoát
                                </a>
                            </li>
                        </ul>
                    </li>
                    <?php
                }
                ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-7">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="index.php" class="active"><i class="fa fa-home" aria-hidden="true"> Home</i></a></li>
								<li class="dropdown"><a href="#"><i class="fa fa-hand-o-right" aria-hidden="true"> Cửa hàng</i>
<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="products.php">Sản Phẩm</a></li>
										<li><a href="cart.html">Giỏ Hàng</a></li> 
										<li><a href="login.html">Đăng Nhập</a></li> 
                                    </ul>
                                </li> 
								<li><a href="contact-us.html"><i class="fa fa-envelope-o" aria-hidden="true"> Liện Hệ</i></a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-5">
						<div>
                        <form method="post" action="index.php?act=search" >
                        <div class="col-sm-4">
							<input name="se" class="form-control" type="text" placeholder="Search" />
                            </div>
                            <div class="col-sm-5">
							<select name="danhsach" class="form-control" type="text" placeholder="Search theo"/>
                            		<option value="1">Theo loại sản phẩm</option>
                                    <option value="2">Theo hãng sản xuất</option>
                                    <option value="3">Theo giá sản phẩm </option>
                                    <option value="4">Theo tên sản phẩm</option>
                            </select>
                            </div>
                         <div   class="col-sm-3">
                           <a href="index.php?act=search">
                           <button class="btn btn-danger" type="submit" name="search" style="border:#FFF">
                           <i class="fa fa-search" aria-hidden="true"></i>
                           </button></a>
</div>
                            </form>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header>