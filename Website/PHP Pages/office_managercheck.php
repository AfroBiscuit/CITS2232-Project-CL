<?php
session_start();
$_SESSION['officeID'] = $_POST['officeCode'];
$officeID = $_SESSION['officeID'];
$connection = mysqli_connect('ec2-54-252-239-151.ap-southeast-2.compute.amazonaws.com', 'root');
mysqli_select_db($connection, "centrelink");
$query = "SELECT isManager FROM memberships WHERE officeCode=$officeID and staffID=$_SESSION['logID']";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_array($result,MYSQLI_NUM);
if ($row[0]==1) {header ('Location: office_manager.php');}
else {header ('Location: office.php');}
mysqli_close($connection);
?>