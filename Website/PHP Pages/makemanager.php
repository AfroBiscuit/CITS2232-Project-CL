<?php
$connection = mysqli_connect('ec2-54-252-239-151.ap-southeast-2.compute.amazonaws.com', 'root');
mysqli_select_db($connection, "centrelink");
session_start();
$staffID = $_POST['staffID'];
$officeID = $_SESSION['officeID'];
mysqli_query($connection,"INSERT INTO membership (staffID, officeCode, isManager) VALUES ('$staffID', '$officeID', '1')
ON DUPLICATE KEY UPDATE staffID = '$staffID', officeCode = '$officeID', isManager = '1'") or die(mysql_error());
mysqli_close();
header('Location: office_admin.php');
?>