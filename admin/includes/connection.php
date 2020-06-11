<?php 
$server_username = "root";
$server_password = "";
$server_host = "localhost";
$database = 'website';
$conn= mysqli_connect($server_host,$server_username,$server_password,$database);
if(!$conn)
{
	die("Lỗi kết nối dữ liệu");
	exit();
}
mysqli_query($conn,"SET NAMES 'UTF8'");
 