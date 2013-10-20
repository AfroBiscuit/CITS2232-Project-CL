<?php
//Connecting to sql db.
$connection = mysqli_connect('ec2-54-252-239-151.ap-southeast-2.compute.amazonaws.com', 'root');
mysqli_select_db($connection, "centrelink");
//Sending form data to sql db.
session_start();
$officeCode = $_SESSION['officeID'];
$name = $_POST['OfficeName'];
$officeType = $_POST['OfficeType'];
$typeCode = $_POST['TypeCode'];
$streetAddress = $_POST['StreetAddress'];
$suburb = $_POST['Suburb'];
$postcode = $_POST['Postcode'];
$state = $_POST['State'];
$openHours = $_POST['OpenHours'];
$postal = $_POST['Postal'];
mysqli_query($connection,"INSERT INTO offices (officeCode, name, officeType, typeCode, streetAddress, suburb, postcode, state, openHours, postal) VALUES ('$officeCode', '$name', '$officeType', '$typeCode', '$streetAddress', '$suburb', '$postcode', '$state', '$openHours', '$postal') 
ON DUPLICATE KEY UPDATE officeCode = '$officeCode', name = '$name', officeType = '$officeType', typeCode = '$typeCode', streetAddress = '$streetAddress', suburb = '$suburb', postcode = '$postcode', state = '$state', openHours = '$openHours', postal = '$postal'") or die(mysql_error());//, '$officeType', '$typeCode', '$streetAddress', '$suburb', '$postcode', '$state', '$openHours', '$postal', '$long', '$lat')");
$logID = $_SESSION['logID'];
$query = "SELECT isAdmin FROM staff WHERE staffID=$logID";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_array($result,MYSQLI_NUM);
if ($row[0]==1) {header ('Location: office_admin.php');}
else {header ('Location: office_manager.php');}
mysqli_close($connection);
?>