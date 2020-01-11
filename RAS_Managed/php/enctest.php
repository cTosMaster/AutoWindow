<?php
    $conn = mysqli_connect("localhost", "jbs", "1234");
    mysqli_query($conn, 'set names utf8');
    mysqli_select_db($conn, 'autowindow');

    $plaintext = "1708";
    $plaintext2 = "0";
    $key = "key";

    $key = substr(hash('sha256', $key, true), 0, 32);
    echo "key binary : " . $key . "<br/>";
    
    $iv = chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) .
          chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) .
          chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0);

    $encrypted = base64_encode(openssl_encrypt($plaintext, 'aes-256-cbc', $key, OPENSSL_RAW_DATA, $iv));
    $encrypted2 = base64_encode(openssl_encrypt($plaintext2, 'aes-256-cbc', $key, OPENSSL_RAW_DATA, $iv));
    $decrypted = openssl_decrypt(base64_decode($encrypted), 'aes-256-cbc', $key, OPENSSL_RAW_DATA, $iv);
    $insQuery = "insert into SensData(date, UvData, DustData)" . "values ('2019-05-27 15:08', '" . $encrypted . "', '" . $encrypted2 . "');";
   
    mysqli_query($conn, $insQuery);

    echo "plaintext : " . $plaintext . "<br/>";
    echo "enc : " . $encrypted . "<br/>";
    echo "dec : " . $decrypted . "<br/>";
?>
