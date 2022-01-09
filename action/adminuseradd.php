<?php
session_start();
include 'dbconfig.php';
include 'algotest.php';
if($_SESSION['role']!='admin')
{
  header("refresh:0; url=../".$_SESSION['role'].".php");
}


$name = $_POST["name"];
$email = $_POST["email"];
$tsl = time();
$pswd = encrypter($_POST["pswd"], $tsl);
$role = $_POST["role"];


$sql = "SELECT * from users where email = '$email'";
$result = mysqli_query($con, $sql);
$num = mysqli_num_rows($result);
if($num == 1)
{
	echo "User already exists";
	header("refresh:1; url=../admin.php");
}

else
{
$sql = "INSERT INTO users (time, name, email, pswd, role) values ('$tsl', '$name','$email','$pswd','$role')";


if(!mysqli_query($con, $sql))
{
    echo 'Entry Unsuccessful';

}
else
{
    echo 'Entry Sucessfull';
}
header("refresh:1; url=../admin.php");
}

?>