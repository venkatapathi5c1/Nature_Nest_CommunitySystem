<?php
// session start
session_start();
// error reporting zero to disable errors
error_reporting(0);

$conn = mysqli_connect("localhost", "root", "", "house_rental");

if(mysqli_connect_errno()){
echo "Connection Fail".mysqli_connect_error();
}

  ?>
