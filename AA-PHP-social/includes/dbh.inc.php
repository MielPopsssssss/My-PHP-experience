<?php

$servername = "localhost";
$dBusername = "INSERT USERNAME";
$dBpassword = "INSERT THE PASSWORD";
$dBname = "aaphpsocial";

$conn = mysqli_connect($servername, $dBusername, $dBpassword, $dBname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    echo "Connection failed: ";
}
