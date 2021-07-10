<?php
	include('../connection.php');
    
    if(isset($_POST['submit']))
    {
        $first_name=$_POST['first_name'];
        $last_name=$_POST['last_name'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $cpassword=$_POST['cpassword'];
        $mobile_num=$_POST['mobile_num'];
        $vehicle_type=$_POST['vehicle_type'];
        $vehicle_num=$_POST['vehicle_num'];
        $document_upload=$_POST['document_upload'];
        
        $user_check_query="SELECT * FROM `registration_tab` WHERE `email`= '$email' AND `mobile_number`= '$mobile_num'";
        $result=mysqli_query($conn,$user_check_query);
        $count = 0;
        if($result){
            $count=mysqli_num_rows($result);
        }
        
        if($count >0){
            echo"<script>alert('Email or mobile number already registered. Kindly Login');</script>";
        } 
        else{
            if($password != $cpassword){
                echo"<script>alert('passwords does not match');</script>";
            }
            elseif(strlen($mobile_num)>10 || strlen($mobile_num)<10){
                echo"Please enter valid mobile number";
            }
            elseif(strlen($vehicle_num)>9 || strlen($vehicle_num)<9){
                echo"Enter valid vehicle number";
            }
            else{
                $result=mysqli_query($conn,"INSERT INTO `registration_tab`(`first_name`, `last_name`, 
            `email`, `password`, `confirm_password`, `mobile_number`, `vehicle_type`, `vehicle_number`, 
            `document_upload`) VALUES ('$first_name','$last_name', '$email','$password','$cpassword',
            '$mobile_num','$vehicle_type','$vehicle_num','$document_upload')" );
                mysqli_query($conn, "INSERT INTO `login_tab`(`email`, `password`) VALUES ('$email','$password')");
                echo"<script>alert('Registered Successfully...');
                window.location.href='index.html'</script>";
            }
                
            }
        }
        else{
            echo "invalid";
        }
    
?>