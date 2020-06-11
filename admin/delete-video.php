<?php 
include('../includes/connection.php');
if(isset($_GET['id']) && filter_var($_GET['id'],FILTER_VALIDATE_INT,array('min_range'>=1)))
{
	$id=$_GET['id'];
	$sql_xoa="DELETE FROM SanPham WHERE id={$id}";
	$results = mysqli_query($conn,$query) or die("Query {$query} \n <br/> Mysql errors:".mysqli_error($conn));
	header('Location: list-video.php');


	$sql_add = "EXECUTE AddSanPham $gia,'{$ten}','{$hinhAnh}',$nhaCungCap,$nguoiBanHang,$danhMuc";
    $result_add = sqlsrv_query($conn,$sql_add);
}
else
{
	header('Location: list-video.php');
}
?>
