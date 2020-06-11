<?php 
// Kiểm tra xem kết quả trả về có đúng hay không
function kt_query($result,$query)
{
	global $conn;	
	if(!$result)
	{
		die("Query {$query} \n <br/> MYSQL Error:".mysqli_error($conn));
	}
}
 ?>
