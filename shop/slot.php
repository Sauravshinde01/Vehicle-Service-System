<!DOCTYPE html>
<html>
<body>
<?php 
$start = date('H:i:s', strtotime('2021-06-05 10:00:0'));
$end = date('H:i:s', strtotime('2021-06-05 11:00:0'));


    date_default_timezone_set('Asia/Calcutta');
    $startTimeInterval = 60*60;
    $open = strtotime('2021-06-05 10:00:0');
    $close = strtotime('2021-06-05 18:00:0');
    echo date('Y-m-d H:i:s', time()).'<br/>';
    do{
        if( !($start == date('H:i:s',$open) && date('H:i:s',$open+$startTimeInterval) == $end) ){
            echo date('H:i:s',$open).' - '.date('H:i:s',$open+$startTimeInterval). ' <br/>';
        }

        $open = $open+$startTimeInterval;
        
    }while($open<$close);

?>
</body>
</html>