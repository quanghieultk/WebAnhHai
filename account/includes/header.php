
<!DOCTYPE html>
<html lang="vi">
<head>
	<meta charset="utf-8">
	<title> Hài vl! Nơi mang lại tiếng cười cho bạn. </title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="vendor/css/bootstrap.css"/>
	<link rel="stylesheet" href="vendor/css/font-awesome.min.css"/>
    <link rel="stylesheet" type="text/css" href="style_css/normalize.css"/>
	<link rel="stylesheet" type="text/css" href="account/includes/headright_style.css"/>
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
                        <li><a href="##">Video</a></li>
                        <li><a href="##">Xem nhiều nhất</a></li>
                        <li><a href="##">Ảnh chế</a></li>
                        <li>
                            <a href="##">Đăng bài</a>
                            <ul class="sub-menu">
                                <li><a href="post-image.php">Đăng ảnh</a></li>
                                <li><a href="post-video.php">Đăng video</a></li>
                            </ul>
                        </li>
                        <li><a href="##">Liên hệ</a></li>
                        </ul>
                    </div> <!-- END head-menu -->

                    <div id="right_header">
                        <div id="symbol">
                            <a href="#" style="color: gray" class="glyphicon glyphicon-user"></a>
                        </div>  
                        <div id="hello">
                            Xin chào:&nbsp;<?php if(isset($_SESSION['username'])) {echo $_SESSION['username'];} ?> 
                        </div>
                        <div id ="detail">
                            <a href="#" class="fa fa-caret-down"></a>          
                        <div id="menu">
                            <ul>
                                <li><a href="information.php" title="Thông tin cá nhân">Thông tin cá nhân</a></li>
                                <li><a href="change-password.php">Đổi mật khẩu</a></li>
                                <li><a href="account/includes/log-out.php">Log out</a></li>
                            </ul>
                        </div> 
                        </div> <!-- END detail -->
                    </div><!-- END right_header -->     
                </div><!-- END header-content -->
                <div class="clear"></div>
            </div><!-- END header -->