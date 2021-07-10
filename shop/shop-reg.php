<?php
include('../connection.php');
if(isset($_POST['submit'])) {
    
    $full_name=$_POST['fullname'];
    $mobile_num=$_POST['mobile_num'];
    $aadhar_num=$_POST['aadhar_num'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $birthdate=$_POST['birthdate'];
    $gender=$_POST['gender'];
    $owner_state=$_POST['owner_state'];
    $owner_city=$_POST['owner_city'];
    $owner_address=$_POST['owner_address'];
    $owner_pincode=$_POST['owner_pincode'];
    //shop details
    $name=$_POST['shopname'];
    $license=$_POST['license'];
    $shop_address=$_POST['address'];
    $ownership=$_POST['ownership'];
    $shop_state=$_POST['state'];
    $shop_city=$_POST['city'];
    $shop_pincode=$_POST['pincode'];

    // echo $email.'</br>';

    $user_check_query="SELECT * FROM `shop_reg` WHERE `email`=`$email` AND `license_number`=`$license`";
    $result=mysqli_query($conn,$user_check_query);
    $count = 0;
    echo"hi";
    if ($result) {
        $count=mysqli_num_rows($result);
    }
    if ($count>0) {
        echo"<script>alert('This License number already exist. Kindly Login');</script>";
    }
    else{
        
        if (strlen($mobile_num)>10 || (strlen($mobile_num)<10)) {
            echo"<script>alert('Enter valid Mobile Number');</script>";
        }
        elseif(strlen($aadhar_num)>12 || (strlen($aadhar_num)<10)){
            echo"<script>alert('Enter valid Aadhar Number');</script>"; 
        } 
        elseif(strlen($shop_pincode)>6 || (strlen($shop_pincode)<6)){
            echo"<script>alert('Enter valid Pin Code');</script>";
        }
        elseif(strlen($owner_pincode)>6 || (strlen($owner_pincode)<6)){
            echo"<script>alert('Enter valid Pin Code');</script>";
        }
        else{
           $sqlStatement =  "INSERT INTO `shop_reg`(`full_name`, `mobile_number`, `aadhar_number`,
           `email`, `password`, `birthdate`, `gender`, `owner_state`, `owner_city`, `owner_address`, 
           `owner_pincode`, `shop_name`, `license_number`, `shop_address`, `ownership`, `shop_state`, 
           `shop_city`, `shop_pincode`) VALUES ('$full_name','$mobile_num','$aadhar_num','$email',
           '$password','$birthdate','$gender','$owner_state','$owner_city','$owner_address','$owner_pincode',
           '$name','$license','$shop_address','$ownership','$shop_state','$shop_city','$shop_pincode')";
// echo $sqlStatement.'<br>';
         if(mysqli_query($conn,$sqlStatement)){
        
            mysqli_query($conn, "INSERT INTO `shop_login`(`email`, `password`) VALUES ('$email','$password')");
            // header("location:shopdetails.php?license_number=".$license);
            echo"<script>alert('You have successfully registered...Please login');
            window.location.href='shop.html'</script>";
         }
        echo mysqli_error($conn);
               
        }
    }
}
else{
    echo"invalid";
}

?>