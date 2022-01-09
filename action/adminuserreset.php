<?php
session_start();
include 'dbconfig.php';
include 'algotest.php';
if($_SESSION['role']!='admin')
{
  header("refresh:0; url=../".$_SESSION['role'].".php");
}

$email = $_POST["email"];
$tsl = time();
$pswd = encrypter($_POST["pswd"], $tsl);



$sql = "SELECT * from users where email = '$email'";
$result = mysqli_query($con, $sql);
$num = mysqli_num_rows($result);
if($num == 0)
{
	echo "User doesn't exists";
	header("refresh:1; url=../admin.php");
}

else
{
$sql = "UPDATE users SET pswd = '$pswd', time = '$tsl' WHERE email = '$email'";


if(!mysqli_query($con, $sql))
{
    echo 'Password reset Unsuccessful';

}
else
{
    echo 'Password reset Sucessfull';
}
header("refresh:1; url=../admin.php");
}

?>