<?php

session_start();

include 'dbconfig.php';
if($_SESSION['role'] == 'student')
{
  header("refresh:0; url=../".$_SESSION['role'].".php");
}

$sname = $_POST["sname"];

$sql = "INSERT INTO subjects (sname) values ('$sname')";


if(!mysqli_query($con, $sql))
{
    echo 'Subject adding Unsuccessful';

}
else
{
    echo 'Subject adding Sucessfull';
}
header("refresh:1; url=../admin.php");


?>