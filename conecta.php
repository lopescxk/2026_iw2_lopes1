<?php
    $host = "localhost";
    $db = "teste";
    $port = "3308";
    $user = "root";
    $pass = "usbw";

    $dsn = "mysql:host=$host;dbname=$db;port=$port";
    $conn = new PDO ($dsn, $user, $pass);
?>