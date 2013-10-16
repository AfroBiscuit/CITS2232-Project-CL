<?php
//Connecting to sql db.
 $connect = mysqli_connect('127.0.0.1', 'root') or die(mysql_error(mysqli_connect())); 
 mysqli_select_db($connect, "test2232"); 
//Sending form data to sql db.
$officeCode = $_POST['officeCode'];
$name = $_POST['name'];
$officeType = $_POST['officeType'];
$typeCode = $_POST['typeCode'];
$streetAddress = $_POST['streetAddress'];
$suburb = $_POST['suburb'];
$postcode = $_POST['postcode'];
$state = $_POST['state'];
$openHours = $_POST['openHours'];
$postal = $_POST['postal'];
//$long = $_POST['longitude'];
//$lat = $_POST['latitude'];
mysqli_query($connect,"INSERT INTO office (officeCode, name, officeType, typeCode, streetAddress, suburb, postcode, state, openHours, postal) VALUES ('$officeCode', '$name', '$officeType', '$typeCode', '$streetAddress', '$suburb', '$postcode', '$state', '$openHours', '$postal') 
ON DUPLICATE KEY UPDATE name = '$name', officeType = '$officeType', typeCode = '$typeCode', streetAddress = '$streetAddress', suburb = '$suburb', postcode = '$postcode', state = '$state', openHours = '$openHours', postal = '$postal'") or die(mysql_error());//, '$officeType', '$typeCode', '$streetAddress', '$suburb', '$postcode', '$state', '$openHours', '$postal', '$long', '$lat')");
header('Location: test_2232.html')
?>