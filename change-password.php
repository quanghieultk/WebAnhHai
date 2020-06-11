<link rel="stylesheet" type="text/css" href="account/includes/change_ps_style.css">
<title> Cập nhật mật khẩu </title> 
<style type="text/css">
	.redcolor
	{
		color: red;
	}

</style>
<?php 
	include('account/includes/login_required.php');
    include('account/includes/header.php');
?>          
<?php 
	include('includes/connection.php');
	include('includes/function.php');
	if(isset($_POST['submit']))
	{
		$matkhaucu = $_POST['old_password'];
		$matkhaumoi = trim($_POST['new_password']);
		$query= "SELECT id, password FROM users WHERE password='{$matkhaucu}'AND id={$_SESSION['uid']}";
		$result = mysqli_query($conn,$query);
		kt_query($result,$query);
		if(mysqli_num_rows($result)==1)
		{
			if(trim($_POST['new_password']) != trim($_POST['again_password']))
			{
				$message="<p class='redcolor'>Mật khẩu mới không giống nhau</p>";
			}
			else
			{
				$query_up = "UPDATE users 
							SET password=trim('{$matkhaumoi}')
							WHERE 
							id={$_SESSION['uid']}";
				$result_up = mysqli_query($conn,$query_up);
				kt_query($result_up,$query_up);
				if(mysqli_affected_rows($conn)==1)
				{
					$message="<p style='color:green'>Đổi mật khẩu thành công</p>";
				}
				else
				{
					$message="<p class='redcolor'>Đổi mật khẩu không thành công</p>";
				}
			}
		}
		else 
		{
			$message="<p class='redcolor'>Mật khẩu cũ không đúng</p>";
		}
	}
?>
	<form method="POST" name="change_password" id="change_ps">
		<?php 
		if(isset($message))
		{
			echo $message;
		}

		 ?>
		<h2>Cập nhật mật khẩu</h2>
		<div class="form-group">	
			<label>Tài khoản</label>
			<input type="text" name="username" value="<?php echo $_SESSION['username']; ?>" disabled="true" class="form-control">
		</div>
		<div class="form-group">	
			<label>Mật khẩu cũ</label>
			<input type="password" name="old_password" class="form-control">
		</div>
		<div class="form-group">
			<label>Mật khẩu mới</label>
			<input type="password" name="new_password" class="form-control">
		</div>	
		<div class="form-group">
			<label>Nhập lại mật khẩu</label>
			<input type="password" name="again_password" class="form-control">	
		</div>
		<input type="submit" name="submit" class="btn btn-primary" value="Thay đổi">
		<a href="_1.php" class="btn btn-primary" id="btn_cancel">Hủy bỏ</a>
	</form>


<?php 
    include('includes/footer.inc.php');
 ?>