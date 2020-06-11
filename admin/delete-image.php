<?php 
include('../includes/connection.php');
if (isset($_GET['id']) && filter_var($_GET['id'],FILTER_VALIDATE_INT,array('min_range'=>1)))
{
	$id=$_GET['id'];
	//Xóa hình ảnh trong thư mục upload
	$sql="SELECT image FROM data_image WHERE id={$id}";
	$query_a = mysqli_query($conn,$sql);
	$info_image=mysqli_fetch_assoc($query_a);
	unlink('../'.$info_image['image']);
	$query = "DELETE FROM data_image WHERE id={$id}";
	$results = mysqli_query($conn,$query) or die("Query {$query} \n <br/> Mysql errors:".mysqli_error($conn));
	header('Location: list-images.php');
}
 ?>