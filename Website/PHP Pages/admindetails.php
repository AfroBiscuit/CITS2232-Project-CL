<?php
session_start();
$_SESSION['staffID'] = $_POST['staffID'];
header ('Location: details.php');
?>