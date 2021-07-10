<?php
session_start();
	include('../connection.php');
	$email=$_POST['email'];
	$password=$_POST['password'];

	$sql = "select * from login_tab where email = '$email' and password = '$password' ";
	$result = mysqli_query($conn, $sql);
	$count = mysqli_num_rows($result);
	if($count == 1){
		$_SESSION['email']="$email";
		$_SESSION['password']="$password";
		echo"<script>window.alert('You have successfully Logged in');
		window.location.href='after-login.php';</script>";
	}
	else{
		echo "<script >window.alert('plz enter correct email/password');window.location.href='index.html';</script>";
		header("location:index.html");
		}
?>
