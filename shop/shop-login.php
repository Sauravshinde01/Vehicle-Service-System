<?php
session_start();
include('../connection.php');
if(isset($_POST['login'])){
    $email=$_POST['shop-email'];
	$password=$_POST['shop-pass'];
	$sql = "SELECT * FROM `shop_login` WHERE `email`='$email' AND `password`='$password'";
	
    $count =0;
    $result = mysqli_query($conn, $sql);
    if($result){	
	$count = mysqli_num_rows($result);
}
	if($count == 1){
		$sql1 = "SELECT * from shop_reg WHERE email= '$email'";
		$result1= mysqli_query($conn, $sql1);
		mysqli_error($conn);
		$license_number ;
		while($data = mysqli_fetch_array($result1)){
			$license_number=$data['license_number'];
			break;
		}
		$_SESSION['email']="$email";
		$_SESSION['password']="$password";
		$_SESSION['license_number']=$license_number;
		echo"<script>window.alert('You have successfully Logged in ');</script>";
        header("location:dashboard.php");
	}
	else{
		echo "<script>window.alert('plz enter correct email/password');</script>";
		header("location:shop.html");
		}
    }
?>