<?php

if(isset($_GET['setup']))
{

    echo "<tbody id='replace'>";
    for ($i=1; $i <= $_GET['setup']; $i++) { 
    echo '<tr>';
    echo "<td><input type='text' id='setup_no' name='setup_no".$i."' class='form-control' value='".$i."' style='text-align:center;' disabled></td>";		
    echo "<td><input type='text' id='machine' name='machine_number".$i."' class='form-control' required></td>";		
    echo "<td><input type='text' name='program_number".$i."' class='form-control' required></td>";
	echo "<td><input type='text' name='time".$i."' class='form-control' required></td>";											
	echo "<td><input type='text' name='cost".$i."' class='form-control' required></td>";											
	echo "</tr>";											
    }							
    echo "</tbody>";			
}
?>