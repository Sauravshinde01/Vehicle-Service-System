<?php
include ("connection.php");

if(isset($_POST['submit'])){

    $partName=$_POST['part_name'];
    $partNo=$_POST['part_number'];
    $revno=$_POST['rev_no'];
    $setup=$_POST['no_of_setup'];
    $cost;
    
    for($i=1 ;$i<=$setup ; $i++)
    {
        $machine = $_POST['machine_number'.$i];
        $program=$_POST['program_number'.$i];
        $cost=$_POST['cost'.$i];
        $time=$_POST['time'.$i];
        
        $tok= strtok($machine,', ');

        while ($tok != null) {
            //echo $tok;
            $pm= "Insert into machine_part(Machine_Nm,Prog_No) values ('$tok','$program')";
            mysql_query($pm,$con);
            $tok= strtok(', ');    
        }
        $partdetails= "insert into parts_details(Rev_No,Setup_No,Setup_Time,Prog_No,Cost) values ('$revno','$i','$time','$program','$cost')";
        mysql_query($partdetails,$con);    
    }

    $parts="insert into parts (Name,No,Rev_No,Cost,Setups) values ('$partName','$partNo','$revno','$cost','$setup')";
    mysql_query($parts,$con);
    echo "<script>window.location.href='new_part.php'</script>";
}
?>