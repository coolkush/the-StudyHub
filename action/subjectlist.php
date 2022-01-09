<?php
session_start();
include 'dbconfig.php';
if($_SESSION['role']=='student')
{
  header("refresh:0; url=../".$_SESSION['role'].".php");
}?>

<!DOCTYPE html>
<html>
<head>
	<title>List of Subjects</title>


<style type="text/css">
	
	
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 15px;
}
</style>


</head>
<body>



<section style="text-align: center;">
  
  <h1 style="color: black;"><strong>Subjects list </strong></h1>
<div style="color: black">

<?php

$sql = "SELECT * from subjects";
$result = $con->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    echo "<table style='width:100%'>
  <tr>
    <th>Subject ID</th>
    <th>Subject Name</th> 
    
    
  </tr>";
    while($row = $result->fetch_assoc()) {


        echo "  <tr>
    <td>".$row["sid"]."</td>
    <td>".$row["sname"]."</td>
    
    
  </tr>";
    }
    echo "</table>";

} else {
    echo "0 results";
}
?>
</div>


</section>


</body>
</html>