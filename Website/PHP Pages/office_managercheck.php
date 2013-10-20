<?php
session_start();
$_SESSION['officeID'] = $_POST['officeCode'];
$officeID = $_SESSION['officeID'];
$connection = mysqli_connect('ec2-54-252-239-151.ap-southeast-2.compute.amazonaws.com', 'root');
mysqli_select_db($connection, "centrelink");
<<<<<<< HEAD
$query = "SELECT isManager FROM memberships WHERE officeCode=$officeID and staffID=$_SESSION['logID']";
=======
$query = "SELECT officeManager FROM offices WHERE officeCode=$officeID";
>>>>>>> 7dab1e03b1507227fb04d7693e730d2d354bd56b
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_array($result,MYSQLI_NUM);
if ($row[0]==1) {header ('Location: office_manager.php');}
else {header ('Location: office.php');}
mysqli_close($connection);
?>