<?php
include 'algotest.php';
include 'dbconfig.php';
session_start();

$email = $_SESSION['email'];

$sql = "SELECT time from users where email = '$email'";
$result = mysqli_query($con, $sql);
$row = $result->fetch_assoc();
$tsl = $row["time"];

$tmps = encrypter($_SESSION['tmps'], $tsl);

$sql = "UPDATE users set pswd = '$tmps' where email = '$email'";
	if(!mysqli_query($con, $sql))
{
  echo 'Entry Unsuccessful';

}
else
{
  echo 'Logout Sucessfull';
  //header('location:../welcome.php');
}

session_destroy();
echo 'Logout Sucessfull';
header('location:index.php')
?>