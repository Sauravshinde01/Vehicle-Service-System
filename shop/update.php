<?php
    include('../connection.php');
    if (isset($_POST['submit'])) {
        $query= mysqli_query($conn, "UPDATE `slot_tab` SET `status`='COMPLETE' WHERE `id`=$_GET[id]");
        echo"Great Success!!!";

        $licenseNumber = $_POST['license_number'];
        $tableRowCount = $_POST['row_count'];
        $service = "servicename";
        $cost = "servicecost";
        $date = $_POST['date'];
        $custEmailId = $_POST['email'];
        $totalCost = 0;
        $billId;

        // calculating totalcost
        for($i = 0; $i <= $tableRowCount ; $i++){
            $totalCost = $totalCost + $_POST[$cost.$i];
        }

        //insert into bill table
       $insertBill = "INSERT INTO `bill_tab`(`cust_email`, `license_number`, `date`, `total_cost`) 
                    VALUES ('$custEmailId','$licenseNumber','$date','$totalCost')";
        mysqli_query($conn, $insertBill);
        //fetch letest index which insert above
        $billId = mysqli_insert_id($conn);

        //store multiple service with same billId into service table 
        for($i = 0; $i <= $tableRowCount ; $i++){
            $tempService = $_POST[$service.$i];
            $tempCost = $_POST[$cost.$i];
            $serviceQuery = "INSERT INTO `services`(`bill_id`, `service`, `cost`)
                        VALUES ('$billId','$tempService','$tempCost')";
            mysqli_query($conn, $serviceQuery);
        }
        echo"<script>alert('Successfully Updated');
        window.location.href='dashboard.php';</script>";
    }
    else{
        echo "OOPS!! Bye.";
        echo"<script>alert('Unsuccessful');
        window.location.href='dashboard.php';</script>";
    }
?>