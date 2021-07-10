<?php
session_start();
    include('../connection.php');
    if(isset($_POST['submit'])){
        date_default_timezone_set('Asia/Calcutta');
        $date=$_POST['date'];
        $slot=$_POST['slot'];
        $slotArray = explode("-",$slot);
        $start_slot= date('y-m-d H:i:s', strtotime($date.' '.$slotArray[0]));
        $end_slot= date('y-m-d H:i:s', strtotime($date.' '.$slotArray[1]));
       $email= $_POST['email'];
       $vehicle_type=$_POST['vehicle_type'];
       $license_num=$_POST['shop_name'];
       if(
           
       mysqli_query($conn, "INSERT INTO `slot_tab`(`start_time`, `end_time`,
        `email`, `license_number`, `status`, `vehicle_type`) VALUES 
        ('$start_slot','$end_slot','$email','$license_num','PENDING','$vehicle_type')"))
        {
            $_SESSION['email']="$email";
        //    $_SESSION['password']="$password";
            echo"<script>alert('Slot Booked');
            window.location.href='index.html';</script>";
            
        }
        else{
            echo"<script>alert('Unable to book slot');</script>";
            header("location:after-login.php");
        }

    }
?>