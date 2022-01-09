<?php
session_start();
include 'dbconfig.php';
if($_SESSION['role']!='admin')
{
  header("refresh:0; url=../".$_SESSION['role'].".php");
}


$email = $_POST["email"];


$sql = "DELETE from users where email = '$email'";

if(!mysqli_query($con, $sql))
{
    echo 'User deletion Unsuccessful';

}
else
{
    echo 'User deletion Sucessfull';
}
header("refresh:1; url=../admin.php");


?>