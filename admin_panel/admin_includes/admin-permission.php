<?php
//Start session
session_start();
//Check whether the admin session is present or not
if (!isset($_SESSION['admin_id']) || (trim($_SESSION['admin_id']) == '')) {
    header("location: login.php");
    exit();
}

?>