<?php
include '../koneksi.php';
 
$username = $_POST['username'];
$password = $_POST['password'];
 
$login = mysqli_query($con,"select * from user where username='$username' and password='$password'");
$cek = mysqli_num_rows($login);
 
if($cek > 0){
	session_start();
	$_SESSION['username'] = $username;
	$_SESSION['status'] = "login";
	header("location:../index.php");
}else{
	header("location:index.php");	
}
 
?>