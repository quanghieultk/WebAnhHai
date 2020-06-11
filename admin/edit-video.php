<?php ob_start(); ?>  <!-- Tạo bộ nớ đệm -->
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
		include("includes/connection.php");
		//Kiểm tra ID có phải là kiểu số không
		if(isset($_GET['id']) && filter_var($_GET['id'],FILTER_VALIDATE_INT,array('min_range'>=1)))
		{
			$id=$_GET['id'];
		}
		else
		{
			header('Location: list-video.php');
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
			if(empty($_POST['link']))
			{
				$errors[]='link';
			}
			else
			{
				$link = $_POST['link'];
			}
			if(empty($_POST['ordernum']))
			{
				$errors[]='ordernum';
			}
			else 
			{
				$ordernum = $_POST['ordernum'];
			}
			if(empty($errors))
			{
				$query = "UPDATE data_video
						SET title='{$title}',
							link ='{$link}',
							ordernum={$ordernum}
						WHERE 
							id= {$id}		
				";
				$results = mysqli_query($conn,$query) or die("Query {$query} \n <br/> Mysql errors:".mysqli_error($conn));
				if (mysqli_affected_rows($conn)==1)
				{
					echo "<p class='greencolor'>Sửa video thành công</p>";
				}
				else 
				{
					echo "<p class='redcolor'>Sửa video không thành công</p>";
				}
			}
			else
			{
				$message="<p class='redcolor'>Bạn hãy nhập đầy đủ thông tin</p>";
			}
		}

		$query_id="SELECT title,link,ordernum FROM data_video WHERE id={$id}";
		$results_id=mysqli_query($conn,$query_id) or die("Query {$query} \n <br/> Mysql errors:".mysqli_error($conn));
		//Kiểm tra ID có tồn tại không
		if(mysqli_num_rows($results_id)==1)
		{
			list($title,$link,$ordernum) = mysqli_fetch_array($results_id,MYSQLI_NUM);
		}
		else
		{
			$message="<p class='redcolor'>ID video không tồn tại</p>";
		}
		?>
		<form name="add_video" method="POST">
			<?php 
				if (isset($message)) {
					echo $message;
				}
			 ?>
			<h3>Sửa video: <?php if(isset($title)) {echo $title;} ?></h3>
			<div class="form-group">
				<label>Title</label>
				<input type="text" name="title" value="<?php if($title) {echo $title;}   ?>" class="form-control" placeholder="Title">
				<?php 
					if(isset($errors)&& in_array('title', $errors))
					{
						echo "<p class='redcolor'>Bạn chưa nhập tiêu đề</p>";
					}
				 ?>
			</div>
			<div class="form-group">
				<label>Link</label>
				<input type="text" name="link" value="<?php if($link) {echo $link;}   ?>" class="form-control" placeholder="Link">
				<?php 
					if(isset($errors)&& in_array('link', $errors))
					{
						echo "<p class='redcolor'>Bạn chưa nhập link video</p>";
					}
				 ?>
			</div>
			<div class="form-group">
				<label>Thứ tự</label>
				<input type="text" name="ordernum" value="<?php if($ordernum) {echo $ordernum;}   ?>"class="form-control" placeholder="Thứ tự">
			</div>
			<input type="submit" name="submit" class="btn btn-primary" value="Sửa video">
		</form>
		
	</div>

</div>
<?php include('includes/footer.php'); ?>

<?php ob_flush(); ?>