<?php
session_start();
$Username = $_POST['Username'];
$Password = $_POST['Password'];
$connection = mysqli_connect('ec2-54-252-239-151.ap-southeast-2.compute.amazonaws.com', 'root');
mysqli_select_db($connection, "centrelink");
$query = "SELECT staffid, password FROM staff where staffID=$Username";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_array($result,MYSQLI_NUM);
$_SESSION['logID'] = $Username;
$_SESSION['staffID'] = $Username;
if (empty($Username) or empty($Password) or $row[1] != $Password) {header ('Location: loginfail.html');}
else {header ('Location: details.php');}
mysqli_close($connection);
?>