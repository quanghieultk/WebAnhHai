<?php ob_start();  ?>

 <style type="text/css">
     .redcolor{
        color: red;
        margin: 0px 0px 0 50px;
     }
 </style>
 <?php 
 require_once("includes/connection.php");
 require_once("includes/function.php");
 if (isset($_POST["login_submit"]))
 {
   //Kiểm tra người dung có nhập đầy đủ thông tin không
    $errors = array();
    if(empty($_POST["login_username"]))
    {
        $errors[]='username';
    }
    else 
    {
       $login_username = $_POST["login_username"];
   }
   if (empty($_POST["login_password"])) 
   {
    $errors[]='password';   
    }
    else 
    {
        $login_password=($_POST["login_password"]);
    }
    if (empty($errors))
    {
        //------------------------------------------------------//           
        $query = "SELECT id, username, password, fullname FROM users WHERE username='{$login_username}' AND password='{$login_password}'";
        $result = mysqli_query($conn,$query);
        kt_query($result,$query);
        if(mysqli_num_rows($result)==1)
        {
            list($id,$username,$password) = mysqli_fetch_array($result,MYSQLI_NUM);
            $_SESSION['uid']=$id;
            $_SESSION['username']=$username;
            header('Location: _1.php');
        }
        else 
        {
            $message="<p class='redcolor'>Tài khoản hoặc mật khẩu không đúng </p>";
        }
        //------------------------------------------------------//    

                    //làm sạch thông tin
        // $login_username = strip_tags($login_username);
        // $login_username = addslashes($login_username);
        // $login_password = strip_tags($login_password);
        // $login_password = addslashes($login_password);
        // $sql="SELECT * FROM users WHERE username='".$login_username."' and password='".$login_password."' ";
        // $query = mysqli_query($conn,$sql);
        // $num_rows = mysqli_num_rows($query);
        // if ($num_rows==0) 
        // {
        //     $message= "<p class='redcolor'>Tên đăng nhập hoặc mật khẩu không đúng</p>";
        // } 
        // else 
        // {
        //             //lấy ra thông tin người dùng và nhập vào sesstion.
        //     while ($data=mysqli_fetch_array($query))
        //     {
        //         $_SESSION["id"]=$data["id"];
        //         $_SESSION["username"]=$data["username"];
        //         $_SESSION["fullname"]=$data["fullname"];
        //         $_SESSION["is_block"]=$data["is_block"];
        //         $_SESSION["permision"]=$data["permision"];
        //     }
        //     header('location: index.php');
        // }
    }
    else 
    {
        $message="<p class='redcolor'>Bạn hãy nhập đầy đủ thông tin!</p>";
    }
}
?>
<div class="page-login">
    <div class="black"></div>
    <section id="login">
        <a href="#" class="glyphicon glyphicon-remove close"></a>

        <div>
            <h2>Đăng nhập</h2>
            <p class="lead">Đăng nhập bằng facebook/google</p>
            <div class="symbol">
                <button type="button" class="btn btn-lg btn-fb"><i class="fa fa-facebook pr-1"></i> Facebook</button>

                <button type="button" class="btn btn-gplus"><i class="fa fa-google-plus pr-1"></i> Google</button>
            </div>
            <form id="login-email" action="index.php" method="POST">
                <input type="hidden" name="next">
                <p class="lead">Đăng nhập bằng tài khoản</p>
                 <?php 
                    if (isset($message))
                    {
                        echo $message;
                    }
                 ?>
                <div class="field">
                    <label for="login-email-name">Tên đăng nhập</label>
                    <input type="text" name="login_username" id="login-email-name">
                    <?php 
                        if(isset($errors)&& in_array('username',$errors))
                        {
                            echo "<p class='redcolor'>Tên đăng nhập không được để trống.</p>";
                        }    
                     ?>
                </div>
                <div class="field">
                    <label for="login-email-password">Mật khẩu</label>
                    <input type="password" name="login_password" id="login-email-password">
                    <?php 
                        if(isset($errors)&&in_array('password',$errors))
                        {
                            echo "<p class='redcolor'>Mặt khẩu không được để trống.</p>";
                        }
                     ?>
                </div>        
                <div class="btn-container">
                    <input type="submit" class="btn-left" name="login_submit" value="Đăng nhập">
                    <a href="#" class="forgot-password">Quên mật khẩu?</a>
                </div>

            </form>
        </div>


    </section>     
</div><!-- END page-login -->

<?php ob_end_flush(); ?>