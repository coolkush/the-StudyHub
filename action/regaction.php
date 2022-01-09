<?php

include 'dbconfig.php';
include 'algotest.php';

$name = $_POST["name"];
$email = $_POST["email"];
$tsl = time();
$pswd = encrypter($_POST["pswd"], $tsl);


$sql = "SELECT * from users where email = '$email'";
$result = mysqli_query($con, $sql);
$num = mysqli_num_rows($result);
if($num == 1)
{
	echo "User already exists";
	header("refresh:1; url=../register.php");
}

else
{
$sql = "INSERT INTO users (time, name, email, pswd, role) values ('$tsl', '$name','$email','$pswd','student')";


if(!mysqli_query($con, $sql))
{
    echo 'Entry Unsuccessful';

}
else
{
    echo 'Entry Sucessfull';
}
header("refresh:1; url=../login.php");
}

?>