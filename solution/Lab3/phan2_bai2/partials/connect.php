<?php
    $userName='root';
    $password = '';
    $dbName = 'phan2_bai2';
    $con = new mysqli("localhost", $userName, $password, $dbName);
    if(!$con){
        die(mysqli_connect_error());
    }


?>