<?php
session_start();

include 'dbconfig.php';
include 'algotest.php';

$email = $_SESSION['email'];
$tsl = time();
$pswd = encrypter($_POST["new"], $tsl);

$sql = "SELECT * from users where email = '$email'";

$result = $con->query($sql);
$row = $result->fetch_assoc();

$sql = "UPDATE users SET pswd = '$pswd', time = '$tsl' WHERE email = '$email'";


if(!mysqli_query($con, $sql))
{
    echo 'Password reset Unsuccessful';

}
else
{
    echo 'Password reset Sucessfull';
}
header("refresh:1; url=../login.php");



?>