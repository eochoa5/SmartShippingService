<?php
$db_conx = mysqli_connect("localhost", "root", "", "smart_shipping");

if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
    exit();
} 
?>
