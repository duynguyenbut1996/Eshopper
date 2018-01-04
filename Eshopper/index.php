<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | TN-Shopper</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
   <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
   	<link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">

</head><!--/head-->

<body style="text-align:center; background-color:#FFF;">
	<?php
		include 'header.php'; 
	?><!--/header-->
	
	<?php 
		include 'slider.php';
	?><!--/slider-->
    <?php
		include 'left.php';
	?>
	
	<?php /*?><?php 
		include 'section.php';
	?><?php */?><!--/section-->
    <?php 
    if (isset($_GET["act"])) {
                    $act = $_GET["act"];
                    switch ($act) {
                        case "products":
                            include_once './products.php';
                            break;
							
                        case "manufacturer":
                            include_once './manufacturer.php';
                            break;
							
						case "details":
							include_once './details.php';
							break;

                        case "login":
                            include_once './login.php';
                            break;
                        case "register":
                            include_once './register.php';
                            break;
						case "search":
                            include_once './search.php';
                            break;
                        case "profile":
                            include_once './profile.php';
                            break;
						case "cart":
                        include_once  './inc_cart.php';
                        break;
						case "thanhtoan":
                        include_once  './thanhtoanthanhcong.php';
                        break;

                        default:
                            include_once './section.php';
                            break;
                    }
                } else {
                    include_once './section.php';
                }
                ?>
            
	
	<?php
		include 'footer.php';
    ?><!--/Footer-->
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
    <?php
        if (isset($js)) {
            echo $js;
        }
    ?>
</body>
</html>