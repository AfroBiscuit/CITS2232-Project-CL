<?php
//Connecting to sql db.
$connection = mysqli_connect('ec2-54-252-239-151.ap-southeast-2.compute.amazonaws.com', 'root');
mysqli_select_db($connection, "centrelink");
//Sending form data to sql db.
session_start();
$query = "SELECT MAX(staffID) FROM staff";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_array($result,MYSQLI_NUM);
$staffID = $row[0] + 1;
$pw = $_POST['Password_register'];
$fn = $_POST['FirstName'];
$ln = $_POST['LastName'];
$em = $_POST['Email'];
$st = $_POST['StreetAddress'];
$sub = $_POST['Suburb'];
$pc = $_POST['Postcode'];
$sta = $_POST['searchstate'];
$ph = $_POST['Phone'];
mysqli_query($connection,"INSERT INTO staff (staffID, password, firstName, lastName, email, streetAddress, suburb, postcode, state, phone) VALUES ('$staffID', '$pw', '$fn', '$ln', '$em', '$st', '$sub', '$pc', '$sta', '$ph')
ON DUPLICATE KEY UPDATE staffID = $staffID, password = '$pw', firstName = '$fn', lastName = '$ln', email = '$em', streetAddress = '$st', suburb = '$sub', postcode = '$pc', state = '$sta', phone = '$ph'") or die(mysql_error());
$_SESSION['logID'] = $staffID;
$_SESSION['staffID'] = $_SESSION['logID'];
header('Location: details.php');
mysqli_close();
?>