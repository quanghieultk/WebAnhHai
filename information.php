<style type="text/css">
	.redcolor 
	{
		color:red;
	}
	.greencolor
	{
		color: green;
	}

</style>
<title>Thông tin cá nhân</title>
<link rel="stylesheet" type="text/css" href="account/includes/change_ps_style.css">
<?php 
	include('account/includes/login_required.php');
	include('account/includes/header.php');
 ?>
<?php 
	include('includes/connection.php');
	if(isset($_POST['submit']))
	{
		$email=$_POST['email'];
		$fullname=$_POST['fullname'];
		$info=$_POST['info'];
		if(($_FILES['img']['type']!="image/gif")
					&& ($_FILES['img']['type']!="image/png")
					&& ($_FILES['img']['type']!="image/jpeg")
					&& ($_FILES['img']['type']!="image/jpg"))
				{
					$message = "<p class='redcolor'>File không đúng định dạng</p>";
				}
				else if ($_FILES['img']['size']>1000000)
				{
					$message="<p class='redcolor'>Kích thước phải nhỏ hơn 1MB</p>";
				}
				else if ($_FILES['img']['size']=='')
				{
					$message = "<p class='redcolor'>Bạn chưa chọn file ảnh</p>";
				}
				else 
				{
					$img = $_FILES['img']['name'];
					$link_img = 'account/images/'.$img;
					move_uploaded_file($_FILES['img']['tmp_name'],"account/images/".$img);
				}
		$query = "UPDATE users
					SET email='{$email}',
						fullname='{$fullname}',
						info='{$info}',
						avatar='{$link_img}'
					WHERE id={$_SESSION['uid']}	
					";
		$results = mysqli_query($conn,$query) or die("Query {$query} \n <br/> Mysql errors:".mysqli_error($conn));
		if (mysqli_affected_rows($conn)==1)
		{
			$message_1= "<p class='greencolor'>Thay đổi thành công</p>";
		}
		else 
		{
			$message_1= "<p class='redcolor'>Thay đổi không thành công</p>";
		}
	}
 ?>

	<form method="POST" id="change_ps" enctype="multipart/form-data">
		<?php 
			if(isset($message_1)) echo $message_1;
		 ?>
		<h2>Cập nhật thông tin cá nhân</h2>
		<div class="form-group">
			<?php  
			$query="SELECT * FROM users WHERE id={$_SESSION['uid']}";
					$result = mysqli_query($conn,$query);
					$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
			?>
			<label>Email</label>
			<input type="text" name="email" class="form-control" 
			value="<?php echo $row['email'];?> ">
		</div>
		<div class="form-group">
			<label>Tên đăng nhập</label>
			<input type="text" name="username" class="form-control" value="<?php echo $_SESSION['username']?>" disabled="true">
		</div>
		<div class="form-group">
			<label>Tên hiển thị</label>
			<input type="text" name="fullname" class="form-control" value="<?php echo $row['fullname'];?>">
		</div>
		<div class="form-group">
			<h4 style="font-weight: bold; font-size: 14px;">Avatar</h4>
			<img width="80px" height="80px" style="margin-bottom: 10px;" src="<?php echo $row['avatar'];?>">
			<input type="file" name="img" value="">
			<?php 
				if(isset($message)) echo $message;
			 ?>
		</div>	
		<div class="form-group">
			<label>Giới thiệu</label>
			<input type="text" name="info" class="form-control" value="<?php echo $row['info']; ?>">
		</div>
		<input type="submit" name="submit" class="btn btn-primary" value="Cập nhật">
		<a href="_1.php" class="btn btn-primary" id="btn_cancel">Hủy bỏ</a>
	</form>


<?php 
	include('includes/footer.inc.php');
 ?> 