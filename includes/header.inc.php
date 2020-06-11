 <?php 
    session_start();
    ob_start(); 
    if(isset($_SESSION['uid']))
    {
        header('Location: _1.php');
    } 
?>
<!DOCTYPE html>
<html lang="vi">
<head>
	<meta charset="utf-8">
	<title> Hài vl! Nơi mang lại tiếng cười cho bạn. </title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="vendor/css/bootstrap.css"/>
	<link rel="stylesheet" href="vendor/css/font-awesome.min.css"/>
    <link rel="stylesheet" type="text/css" href="style_css/normalize.css"/>
	<!-- <link rel="stylesheet" href="vendor/bootstrap-4.1.3/dist/css/bootstrap.css"> -->
	<!--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	 -->
	<link rel="stylesheet" href="style_css/style.css"/>
</head>
<body>
    <div id="wrapper">
            <div id="header">
                <div id="header-content">
                    <div id="head-menu">
                        <ul>
                        <li><a href="index.php">Trang chủ</a></li>
                        <li>
                            <a href="##">Ảnh mới</a>
                            <ul class="sub-menu">
                                <li><a href="#" title="meme">Ảnh meme</a></li>
                                <li><a href="#">Troll bóng đá</a></li>
                                <li><a href="#">Rage comic</a></li>
                            </ul>
                        </li>
                        <li><a href="##">Xem nhiều nhất</a></li>
                        <li><a href="##">Video</a></li>
                        <li><a href="##">Ảnh chế</a></li>
                        <li><a href="##">Liên hệ</a></li>
                        </ul>
                    </div> <!-- END head-menu -->
                <div class="head-right">
                    <div class="search">
                        <span class="icon"><i class="fa fa-search"></i></span>
                        <input type="search" id="search" placeholder="Search..." />
                    </div>
                    <div id="visitor">
                        <a href="#" id="login-button" class="btn-mute">Đăng nhập</a>
                        <a href="#" id="signup-button" >Đăng kí</a>  
                    </div>
                </div><!-- END head-right -->
                </div><!-- END header-content -->
                
            </div><!-- END header -->