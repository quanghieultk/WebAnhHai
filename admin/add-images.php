<style type="text/css">
	.redcolor
	{
		color: red;
	}
	.greencolor
	{
		color: green;
	}
</style>
<?php
	include("includes/header.php");
	include("includes/sidebar.php");
?>
<div style="width: 1200px; float: left; margin: 65px 0px 0px 10px">
	<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
		<?php
		include('../includes/images_helper.php');
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
					$message = "File không đúng định dạng";
				}
				else if ($_FILES['img']['size']>1000000)
				{
					$message="Kích thước phải nhỏ hơn 1MB";
				}
				else if ($_FILES['img']['size']=='')
				{
					$message = "Bạn chưa chọn file ảnh";
				}
				else 
				{
					$img = $_FILES['img']['name'];
					$link_img = 'upload/'.$img;
					move_uploaded_file($_FILES['img']['tmp_name'],"../upload/".$img);
					//Xử lí Resize, Crop hình ảnh
					// $temp = explode('.',$img);
					// if($temp[1]=='jpeg' or $temp[1]=='JPEG')
					// {
					// 	$temp[1]='jpg';
					// }
					// $temp[1]=strtolower($temp[1]);
					// $thumb='upload/resized/'.$temp[0].'_thumb'.'.'.$temp[1];
					// $imageThumb= new Image('../'.$link_img);
					// //Resize ảnh
					// if($imageThumb->getWidth()>700)
					// {
					// 	$imageThumb->resize(700,'resize');
					// }	
					// $imageThumb->save($temp[0].'_thumb','../upload/resized');
				}
				$query = "INSERT INTO data_image(title,link,image,ordernum) VALUES('{$title}','{$link}','{$link_img}',$ordernum)";
				$results = mysqli_query($conn,$query) or die("Query {$query} \n <br/> Mysql errors:".mysqli_error($conn));
				if (mysqli_affected_rows($conn)==1)
				{
					echo "<p class='greencolor'>Thêm mới thành công</p>";
					$_POST['title']='';
					$_POST['link']='';
					$_POST['ordernum']='';
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
	include('includes/footer.php');
 ?>