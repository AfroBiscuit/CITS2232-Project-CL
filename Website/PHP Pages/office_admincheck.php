<?php
session_start();
$_SESSION['officeID'] = $_POST['officeCode'];
header ('Location: office_admin.php');
?>