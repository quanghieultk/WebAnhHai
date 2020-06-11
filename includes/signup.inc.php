<?php require_once("includes/connection.php"); 
 
     if (isset($_POST["btn-submit"]))
     {
        //lấy thông tin từ form
        $username=$_POST["username"];
        $password=$_POST["password"];  
        $password_enter = $_POST["enter-password"];  
        $a="SELECT username FROM users WHERE username='".$username."' ";    
        if($username==""||$password==""||$password_enter=="")
        {
            echo '<script language="javascript">alert("Vui lòng nhập đầy đủ thông tin!!");</script>';
        }
        else if (mysqli_num_rows(mysqli_query($conn,$a))>0)
        {
            echo '<script>alert("Tên đăng nhập đã tồn tại!!");</script>';
        }
        else if($password!=$password_enter) 
        {
            echo '<script language="javascript">alert("Mật khẩu không trùng nhau!!");</script>';
        }
        else 
        {
            $sql= "INSERT INTO users(
            username,
            password,
            createdate
            ) VALUES (
            '$username',
            '$password',
            now()
        )";
            mysqli_query($conn,$sql);
            echo "chúc mừng bạn đã đăng kí thành công!!";
            header("location: index.php");
        }
    }
?>
<div class="page-signup">
                <div class="black-signup"></div>
                <section id="signup">
                    <a href="#" class="glyphicon glyphicon-remove close-signup"></a>
                  
                        <div>
                            <h2>Đăng kí tài khoản</h2>
                            <form id="signup-account" action="index.php" method="POST">
                            
                            <div class="field">
                                <label for="signup-name">Tên đăng nhập</label>
                                <input type="text" name="username" id="login-email-name">
                            </div>
                            <div class="field">
                                <label for="signup-password">Mật khẩu</label>
                                <input type="password" name="password" id="login-email-password">
                            </div>   
                            <div class="field">
                                <label for="signup-password">Nhập lại mật khẩu</label>
                                <input type="password" name="enter-password" id="login-email-name">
                            </div>        
                            <div class="btn-container">
                                <input type="submit" class="btn-signup-submit" name="btn-submit" value="Đăng kí">
                            </div>

                        </form>
                    </div>
                

            </section>     
           </div><!-- END page-signup -->  