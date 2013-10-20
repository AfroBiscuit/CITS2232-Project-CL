<?php
session_start();
$_SESSION['officeID'] = $_POST['officeCode'];
header ('Location: edit_office.php');
?>