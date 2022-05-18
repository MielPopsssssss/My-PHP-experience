<?php

$servername = "localhost";
$dBusername = "Gus";
$dBpassword = "Augarsalex2003!";
$dBname = "aaphpsocial";

$conn = mysqli_connect($servername, $dBusername, $dBpassword, $dBname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    echo "Connection failed: ";
}
