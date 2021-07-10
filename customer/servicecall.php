<?php
include('../connection.php');
if (! empty($_GET["services"])) {
    
    $services = $_GET["services"];
    echo $services;
    $query = "SELECT `service_name` FROM `services` WHERE 'service_name' = '$_GET[services]' ";
    $ServicesResult =  mysqli_query($conn,$query);

echo "<select id='time' name='time' >";
echo "<option value disabled selected class='form-group'>Time</option>";

while ($row = mysqli_fetch_array($ServicesResult,MYSQLI_ASSOC)) {
    echo $row["time"];
    echo "<option value='$row[time]' class='form-control'>".$row['time']."</option>";
 
    }
echo "</select>";
}
?>