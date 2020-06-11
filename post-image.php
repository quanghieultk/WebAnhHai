<?php 
include('account/includes/login_required.php');
include('account/includes/header.php');
 ?>
 <style type="text/css">
	.redcolor
	{
		color: red;
	}
	.greencolor
	{
		color: green;
	}
	#post_image
	{
		width: 1000px; 
		margin: 70px auto;
	}
</style>
<div id="post_image">
	<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
		<?php
		
		include("includes/connection.php");
		if($_SERVER['REQUEST_METHOD']=='POST')
		{
			$errors= array();
			if(empty($_POST['title']))
			{
				$errors[]='title';
			}
			else 
			{
				$title=$_POST['title'];
			} 
			if(empty($_POST['ordernum']))
			{
				$errors[]='ordernum';
			}
			else 
			{
				$ordernum = $_POST['ordernum'];
			}
			$link=$_POST['link'];
			if(empty($errors))
			{
				//Upload ảnh
				if(($_FILES['img']['type']!="image/gif")
					&& ($_FILES['img']['type']!="image/png")
					&& ($_FILES['img']['type']!="image/jpeg")
					&& ($_FILES['img']['type']!="image/jpg"))
				{
					$message_a = "<p class='redcolor'>File không đúng định dạng</p>";
				}
				else if ($_FILES['img']['size']>1000000)
				{
					$message_a="<p class='redcolor'>Kích thước phải nhỏ hơn 1MB</p>";
				}
				else if ($_FILES['img']['size']=='')
				{
					$message_a = "<p class='redcolor'>Bạn chưa chọn file ảnh</p>";
				}
				else 
				{
					$img = $_FILES['img']['name'];
					$link_img = 'upload/'.$img;
					move_uploaded_file($_FILES['img']['tmp_name'],"upload/".$img);
				}
				$query = "INSERT INTO data_image(title,link,image,date_time) VALUES('{$title}','{$link}','{$link_img}',now())";
				$results = mysqli_query($conn,$query) or die("Query {$query} \n <br/> Mysql errors:".mysqli_error($conn));
				if (mysqli_affected_rows($conn)==1)
				{
					echo "<p class='greencolor'>Thêm mới thành công</p>";
					$_POST['title']='';
					$_POST['link']='';
				}
				else 
				{
					echo "<p class='redcolor'>Thêm mới không thành công</p>";
				}
			}
			else
			{
				$message="<p class='redcolor'>Bạn hãy nhập đầy đủ thông tin</p>";
			}
		}
		?>
		<form name="add_images" method="POST" enctype="multipart/form-data">
			<?php 
				if (isset($message)) {
					echo $message;
				}
			 ?>
			<h3>Thêm mới ảnh</h3>
			<div class="form-group">
				<label>Title</label>
				<input type="text" name="title" value="<?php if(isset($_POST['title'])) {echo $_POST['title'];}   ?>" class="form-control" placeholder="Title">
				<?php 
					if(isset($errors)&& in_array('title', $errors))
					{
						echo "<p class='redcolor'>Bạn chưa nhập tiêu đề</p>";
					}
				 ?>
			</div>
			<div class="form-group">
				<label>Hình ảnh</label>
				<input type="file" name="img" value="">
				<img src="<?php echo $link_img;?>">
				<?php 
					if(isset($message_a)) echo $message_a;
				 ?>
			</div> <!-- Tải ảnh lên -->
			<div class="form-group">
				<label>Link</label>
				<input type="text" name="link" value="<?php if(isset($_POST['link'])) {echo $_POST['link'];}   ?>" class="form-control" placeholder="Link">
				<?php 
					if(isset($errors)&& in_array('link', $errors))
					{
						echo "<p class='redcolor'>Bạn chưa nhập link video</p>";
					}
				 ?>
			</div>
			<div class="form-group">
				<label>Thứ tự</label>
				<input type="text" name="ordernum" value="<?php if(isset($_POST['ordernum'])) {echo $_POST['ordernum'];}   ?>"class="form-control" placeholder="Thứ tự">
			</div>
			<input type="submit" name="submit" class="btn btn-primary" value="Thêm mới">
		</form>
		
	</div>

</div>
 <?php 
include('includes/footer.inc.php');
  ?>