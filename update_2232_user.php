<?php
//Connecting to sql db.
$connection = mysqli_connect('ec2-54-252-239-151.ap-southeast-2.compute.amazonaws.com', 'root');
mysqli_select_db($connection, "centrelink");
//Sending form data to sql db.
session_start();
$staffID = $_SESSION['staffID'];
$fn = $_POST['FirstName'];
$ln = $_POST['LastName'];
$em = $_POST['Email'];
$st = $_POST['StreetAddress'];
$sub = $_POST['Suburb'];
$pc = $_POST['Postcode'];
$sta = $_POST['searchstate'];
$ph = $_POST['Phone'];
mysqli_query($connection,"INSERT INTO staff (staffID, firstName, lastName, email, streetAddress, suburb, postcode, state, phone) VALUES ('$staffID', '$fn', '$ln', '$em', '$st', '$sub', '$pc', '$sta', '$ph')
ON DUPLICATE KEY UPDATE staffID = $staffID, firstName = '$fn', lastName = '$ln', email = '$em', streetAddress = '$st', suburb = '$sub', postcode = '$pc', state = '$sta', phone = '$ph'") or die(mysql_error());
mysqli_close();
header('Location: details.php')
?>