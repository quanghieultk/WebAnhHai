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
		//Kiểm tra ID có phải là kiểu số không
		if(isset($_GET['id']) && filter_var($_GET['id'],FILTER_VALIDATE_INT,array('min_range'>=1)))
		{
			$id=$_GET['id'];
		}
		else
		{
			header('Location: list-images.php');
			exit();
		}
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
				if ($_FILES['img']['size']=='')
				{
					$link_img=$_POST['img_hi'];
				}
				else
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
					
					else 
					{
						$img = $_FILES['img']['name'];
						$link_img = 'upload/'.$img;
						move_uploaded_file($_FILES['img']['tmp_name'],"../upload/".$img);
					}
					//Xóa ảnh trong thư mục
					$sql="SELECT image FROM data_image WHERE id={$id}";
					$query_a = mysqli_query($conn,$sql);
					$infoimage=mysqli_fetch_assoc($query_a);
					unlink('../'.$infoimage['image']);
				}
				$query=
				$query = "UPDATE data_image
							SET title='{$title}',
							 	image='{$link_img}',
							 	link='{$link}',
							 	ordernum={$ordernum}
							WHERE id={$id};	
				";
				$results = mysqli_query($conn,$query) or die("Query {$query} \n <br/> Mysql errors:".mysqli_error($conn));
				if (mysqli_affected_rows($conn)==1)
				{
					echo "<p class='greencolor'>Sửa thành công</p>";
					$_POST['title']='';
					$_POST['link']='';
					$_POST['ordernum']='';
				}
				else 
				{
					echo "<p class='redcolor'>Bạn chưa sửa!!</p>";
				}
			}
			else
			{
				$message="<p class='redcolor'>Bạn hãy nhập đầy đủ thông tin</p>";
			}
		}
		$query_id="SELECT title,image,link,ordernum FROM data_image WHERE id={$id}";
		$results_id=mysqli_query($conn,$query_id) or die("Query {$query} \n <br/> Mysql errors:".mysqli_error($conn));
		//Kiểm tra ID có tồn tại không
		if(mysqli_num_rows($results_id)==1)
		{
			list($title,$image,$link,$ordernum) = mysqli_fetch_array($results_id,MYSQLI_NUM);
		}
		else
		{
			$message="<p class='redcolor'>ID ảnh không tồn tại</p>";
		}
		?>
		<form name="add_images" method="POST" enctype="multipart/form-data">
			<?php 
				if (isset($message)) {
					echo $message;
				}
			 ?>
			<h3>Sửa ảnh</h3>
			<div class="form-group">
				<label>Title</label>
				<input type="text" name="title" value="<?php if(isset($title)) {echo $title;}   ?>" class="form-control" placeholder="Title">
				<?php 
					if(isset($errors)&& in_array('title', $errors))
					{
						echo "<p class='redcolor'>Bạn chưa nhập tiêu đề</p>";
					}
				 ?>
			</div>
			<div class="form-group">
				<label>Hình ảnh</label>
				<p><img width="100px"  src="../<?php echo $image; ?>"></p>
				<input type="hidden" name="img_hi" value="<?php echo $image; ?>">

				<input type="file" name="img" value="">
			</div> <!-- Tải ảnh lên -->
			<div class="form-group">
				<label>Link</label>
				<input type="text" name="link" value="<?php if(isset($link)) {echo $link;}   ?>" class="form-control" placeholder="Link">
			</div>
			<div class="form-group">
				<label>Thứ tự</label>
				<input type="text" name="ordernum" value="<?php if(isset($ordernum)) {echo $ordernum;}   ?>"class="form-control" placeholder="Thứ tự">
			</div>
			<input type="submit" name="submit" class="btn btn-primary" value="Sửa">
		</form>
		
	</div>

</div>
<?php 
	include('includes/footer.php');
 ?>