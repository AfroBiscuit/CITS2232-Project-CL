<?php
session_start();
$officeID = $_SESSION['officeID'];
$logID = $_SESSION['logID'];
$connection = mysqli_connect('ec2-54-252-239-151.ap-southeast-2.compute.amazonaws.com', 'root');
mysqli_select_db($connection, "centrelink");
$query = "SELECT isAdmin FROM staff WHERE staffID=$logID";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_array($result,MYSQLI_NUM);
if ($row[0]==1) {header ('Location: office_admin.php');}
else {
	$query2 = "SELECT isManager FROM memberships WHERE officeCode= '$officeID' and staffID='$logID'";
	$result2 = mysqli_query($connection, $query2);
	$row2 = mysqli_fetch_array($result2,MYSQLI_NUM);
	if ($row2[0] == '1') {header ('Location: office_manager.php');}
	else {header ('Location: office.php');}
}
mysqli_close($connection);
?>