<?php
session_start();
include 'dbconfig.php';
if($_SESSION['role']=='student')
{
  header("refresh:0; url=../".$_SESSION['role'].".php");
}

$tname = $_POST['tname'];
$sql = "SELECT tid from topics where tname = '$tname'";
$result = $con->query($sql);
$row = $result->fetch_assoc();

$tid = $row['tid'];
$cname = $_POST['cname'];
$type = $_POST['ctype'];
$link = $_POST['video'];
$docname=basename($_FILES['document']['name']);

move_uploaded_file($_FILES["document"]["tmp_name"],"../uploads/".$docname);

$sql = "INSERT into content (tid, cname, type, link, docname) values ('$tid','$cname','$type','$link','$docname')";

if(!mysqli_query($con, $sql))
{
    echo 'Content add Unsuccessful';

}
else
{
    echo 'Content add Sucessfull';
}
header("refresh:1; url=../admin.php");


?>