<?php

$con = mysqli_connect('localhost','root','');
$db = mysqli_select_db($con, 'lms');


if(!$con)
{
	echo 'DB NOT CONNECTED';
}
else
{
	echo "DB CONNECTED";
}
?>