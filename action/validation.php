<?php
session_start();
include 'dbconfig.php';
include 'algotest.php';
if($_SESSION['role']=='student')
{
  header("refresh:0; url=../".$_SESSION['role'].".php");
}

$email = $_POST["email"];


$sql = "SELECT * from users where email = '$email'";
$result = mysqli_query($con, $sql);
$num = mysqli_num_rows($result);
if($num == 0)
{
	echo "User do not exist";
	header("refresh:1; url=../register.php");
}

else
{

$sql = "SELECT * from users where email = '$email'";
$result = mysqli_query($con, $sql);
$row = $result->fetch_assoc();
$tsl = $row["time"];
$psl = $row["pswd"];
$name = $row["name"];
$role = $row["role"];
$_SESSION['role'] = $role;
$_SESSION['tmps']= $_POST["pswd"];
$_SESSION['email']= $_POST["email"];
if ($psl == encrypter($_SESSION['tmps'], $tsl))
{
	$_SESSION['name'] = $name;
	$_SESSION['logintime']=time();
	$logintime = $_SESSION['logintime'];
	$sql = "UPDATE users set time = '$logintime' where email = '$email'";
	if(!mysqli_query($con, $sql))
{
  echo 'Entry Unsuccessful';

}
else
{
  echo 'Key change Sucessfull';
  if($role == 'admin')
  {
  	header('location:../admin.php');
  }
  if($role == 'teacher')
  {
  	header('location:../teacher.php');	
  }
  if($role == 'student')
  header('location:../student.php');
}

	
}
else
{
	echo "Wrong password";
  header("refresh:1; url=../login.php");

}
}
?>