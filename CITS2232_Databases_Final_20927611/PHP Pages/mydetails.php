<?php
session_start();
$_SESSION['staffID'] = $_SESSION['logID'];
header ('Location: details.php');
?>