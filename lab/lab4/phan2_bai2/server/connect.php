<?php
    $userName='root';
    $password = '';
    $dbName = 'shop';
    $con = new mysqli("localhost", $userName, $password, $dbName);
    if(!$con){
        die(mysqli_connect_error());
    }
    
?>