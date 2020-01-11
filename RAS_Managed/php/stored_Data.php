<?php
    $conn = mysqli_connect("localhost", "jbs", "1234");
    mysqli_query($conn, 'set names utf8');
    mysqli_select_db($conn, 'autowindow');

    exec("curl -s http://192.168.35.20/php/sendData.php", $curl, $error);

    $UvEnc_Data = $_POST["UvData"];
    $DustEnc_Data = $_POST["DustData"]; 

    echo "UvEnc : " . $UvEnc_Data . "<br/>";
    echo "DustEnc : " . $DustEnc_Data . "<br/>";

    $insQuery = "insert into SensData(UvData)" . "values ('" . $UvEnc_Data . "');";
    mysqli_query($conn, $insQuery);
    $insQuery = "insert into SensData(DustData)" . "values ('" . $DustEnc_Data . "');";
    mysqli_query($conn, $insQuery);
    
?>
