<?php
//Connecting to sql db.
$connection = mysqli_connect('ec2-54-252-239-151.ap-southeast-2.compute.amazonaws.com', 'root');
mysqli_select_db($connection, "centrelink");
//Sending form data to sql db.
session_start();
$staffID = $_SESSION['staffID'];
$officeID = $_SESSION['officeID'];
mysqli_query($connection,"INSERT INTO memberships (staffID, officeCode, isManager) VALUES ('$staffID', '$officeID', '0')
ON DUPLICATE KEY UPDATE staffID = '$staffID', officeCode = '$officeID', isManager = '0'") or die(mysql_error());
mysqli_close();
header('Location: officeredirect.php')
?>