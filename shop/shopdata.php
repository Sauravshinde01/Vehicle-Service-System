<?php
    include('../connection.php');
    
    if(isset($_POST['submit'])){
        $working_hours=$_POST['workhours'];
        $opening_time=$_POST['start_time'];
        $closing_time=$_POST['end_time'];
        $license_num=$_POST['license_number'];
        $holiday=$_POST['holiday'];
        $services_a_day=$_POST['servicesday'];
        $max_time=$_POST['maxtime'];
        $vehicle_type=$_POST['vehicletype'];
        $user_check_query= "SELECT * FROM `shop_details` WHERE `license_number` = '$license_num'";
        $result=mysqli_query($conn, $user_check_query);
        $count=0;
        if($result){
            $count=mysqli_num_rows($result);
        }
        if($count>0){
            echo "<script>alert('Data with this license number already exist');</script>";
            header("location:dashboard.php");
        }
        else{
            $result=mysqli_query($conn, "INSERT INTO `shop_details`(`working_hours`, `opening_time`, 
            `closing_time`, `license_number`, `holiday`, `services_in_day`, `max_time_to_service`,
             `vehicle_type`) VALUES ('$working_hours','$opening_time','$closing_time','$license_num','$holiday',
             '$services_a_day','$max_time','$vehicle_type')");
             echo"<script>alert('Data Inserted Successfully');</script>";
             header("location:dashboard.php");
        }
        
        
    }
    else {
        echo "invalid";
    }
    
?>