<?php
include('../connection.php');
if (!( empty($_GET["state"]) && empty($_GET["state"]))) {
    
    $state = $_GET["state"];
    $city = $_GET["city"];
    $query = "SELECT `shop_name`, `license_number` FROM `shop_reg` where shop_state = '$_GET[state]' and shop_city = '$_GET[city]' ";
    $shopResult =  mysqli_query($conn,$query);
    
echo "<select id='service_center' class='form-control' name='shop_name' required>";
echo "<option value disabled selected class='form-group'>Select Shop</option>";

while ($row = mysqli_fetch_array($shopResult,MYSQLI_ASSOC)) {
    echo "<option value=".$row['license_number']." class='form-group'>".$row['shop_name']."</option>";
    }
echo "</select>";
}else{
    echo "error";
}
?>