<?php
//Connecting to sql db.
$connection = mysqli_connect('ec2-54-252-239-151.ap-southeast-2.compute.amazonaws.com', 'root');
mysqli_select_db($connection, "centrelink");
//Sending form data to sql db.
session_start();
$staffID = $_SESSION['staffID'];
$officeID = $_SESSION['officeID']
mysqli_query($connection,"INSERT INTO membership (staffID, officeCode) VALUES ('$staffID', '$officeID')
ON DUPLICATE KEY UPDATE staffID = '$staffID', officeCode = '$officeID'") or die(mysql_error());
mysqli_close();
header('Location: office.php')
?>