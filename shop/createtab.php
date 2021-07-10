<?php

if(isset($_GET['setup']))
{

    echo "<tbody id='replace'>";
    for ($i=1; $i <= $_GET['setup']; $i++) { 
    echo '<tr>';
    echo "<td><input type='text' id='service_name".$i."' name='service_name".$i."' class='form-control' value='".$i."
    ' style='text-align:center;'></td>";		
    echo "<td><input type='text' id='time_needed".$i."' name='time_needed".$i."' class='form-control' required></td>";		
    echo "<td><input type='text' id='cost".$i."' name='cost".$i."' class='form-control' required></td>";
	// echo "<td><input type='text' name='time".$i."' class='form-control' required></td>";											
	// echo "<td><input type='text' name='cost".$i."' class='form-control' required></td>";											
	echo "</tr>";											
    }							
    echo "</tbody>";			
}
?>