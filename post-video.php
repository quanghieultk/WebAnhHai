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
	#post_video
	{
		width: 1000px;
		margin: 70px auto;
	}
</style>
<div id="post_video" ">
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
			if(empty($_POST['link']))
			{
				$errors[]='link';
			}
			else
			{
				$link = $_POST['link'];
			}
			if(empty($errors))
			{
				$query = "INSERT INTO data_video(title,link,date_time) VALUES('{$title}','{$link}',now())";
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
		<form name="add_video" method="POST">
			<?php 
				if (isset($message)) {
					echo $message;
				}
			 ?>
			<h3>Thêm mới video</h3>
			<div class="form-group">
				<label>Tiêu đề</label>
				<input type="text" name="title" value="<?php if(isset($_POST['title'])) {echo $_POST['title'];}   ?>" class="form-control" placeholder="Title">
				<?php 
					if(isset($errors)&& in_array('title', $errors))
					{
						echo "<p class='redcolor'>Bạn chưa nhập tiêu đề</p>";
					}
				 ?>
			</div>
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
			<input type="submit" name="submit" class="btn btn-primary" value="Thêm mới">
		</form>
		
	</div>

</div>
<?php 
	include('includes/footer.inc.php');
 ?>