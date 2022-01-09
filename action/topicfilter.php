<?php
include 'dbconfig.php';
if($_SESSION['role']=='student')
{
  header("refresh:0; url=../".$_SESSION['role'].".php");
}
$sname = $_POST["sname"];
$sql = "SELECT sid from subjects where sname = '$sname'";
$result = $con->query($sql);
$row = $result->fetch_assoc();
$sid = $row['sid'];

?>
<!DOCTYPE html>
<html>
<head>
	<title>Adding content</title>
</head>
<body>

<h1>Adding contents to <?php echo $_POST["sname"];?></h1>
<form action="contentadder.php" method="POST" enctype="multipart/form-data">
	
	Topic name: 
	<?php

	$sql = "SELECT * from topics where sid = '$sid'";
	$result = $con->query($sql);
	if ($result->num_rows > 0) {
	echo '<select name="tname">';
	while($row = $result->fetch_assoc())
	{
		echo '<option value="'.$row[tname].'">'.$row[tname].'</option>';
	}
	echo '</select>';
		}
	?>

	<br>

	Content type:
	<?php

	$sql = "SELECT * from contenttype";
	$result = $con->query($sql);
	if ($result->num_rows > 0) {
	echo '<select name="ctype">';
	while($row = $result->fetch_assoc())
	{
		echo '<option value="'.$row[type].'">'.$row[type].'</option>';
	}
	echo '</select>';
		}
	?>
	<br>

	Content title:
	<input type="text" name="cname">
	<br>	

	Link if video otherwise leave blank
	<input type="text" name="video">
	<br>

	Upload a file if it is a document (only pdfs recommended)<br>
	<input type="file" name="document">

	<br>
	<br>
	<br>
	<br>

	<input type="submit" name="submit" value="Continue">

</form>



</body>
</html>

<?php

?>