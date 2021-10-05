<?php

    session_start();
    $servername = "localhost";
    $UserName = "root";
    $password = "";
    $DBname = "speedtypingonline";
    $conn = new mysqli($servername, $UserName, $password,$DBname);
    if($conn->connect_error)
    {
        die("Connection failed: " . $conn->connect_error);
    }
?>