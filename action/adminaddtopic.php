<?php

session_start();
include 'dbconfig.php';
if($_SESSION['role']=='student')
{
  header("refresh:0; url=../".$_SESSION['role'].".php");
}


$sname = $_POST["sname"];
$sql = "SELECT sid from subjects where sname = '$sname'";
$tname = $_POST["tname"];
$result = $con->query($sql);
$row = $result->fetch_assoc();


$sql = "INSERT INTO topics (tname, sid) values ('$tname', '$row[sid]')";


if(!mysqli_query($con, $sql))
{
    echo 'Topic adding Unsuccessful';

}
else
{
    echo 'Topic adding Sucessfull';
}
header("refresh:1; url=../admin.php");


?>