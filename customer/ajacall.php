<?php
include('../connection.php');
if (! empty($_GET["state"])) {
    
    $state = $_GET["state"];
    echo $state;
    $query = "SELECT shop_city FROM `shop_reg` WHERE shop_state = '$_GET[state]' GROUP BY shop_city";
    $cityResult =  mysqli_query($conn,$query);

echo '<select id="city" name="city" onchange="getShop()" >';
echo "<option value disabled selected class='form-group'>Select City</option>";

while ($row = mysqli_fetch_array($cityResult,MYSQLI_ASSOC)) {
    echo $row["shop_city"];
    echo "<option value='$row[shop_city]' class='form-control'>".$row['shop_city']."</option>";
 
    }
echo "</select>";
}
?>