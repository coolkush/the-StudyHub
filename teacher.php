<?php
session_start();

include 'dbconfig.php';

if($_SESSION['role']=='student')
{
  header("refresh:0; url=student.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Teacher PANEL</title>
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

     <link rel="stylesheet" href="css/bootstrap.min.css">
     <link rel="stylesheet" href="css/font-awesome.min.css">
     <link rel="stylesheet" href="css/aos.css">
     <link rel="stylesheet" href="css/owl.carousel.min.css">
     <link rel="stylesheet" href="css/owl.theme.default.min.css">

     <!-- MAIN CSS -->
     <link rel="stylesheet" href="css/templatemo-digital-trend.css">
     <link rel="stylesheet" href="css/teacher.css">
</head>
<body>
	  <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a style="float: left;" class="navbar-brand" href="index.php">
              StudyHub
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    
                    <li class="nav-item">
                        <a href="logout.php" class="nav-link contact">Logout</a>
                    </li>
                    <li class="nav-item">
                        <a href="changepswd.php" class="nav-link contact">Change password</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

	<body>
	<h2 style="color: white; margin-left: 5%">Welcome, <?php echo $_SESSION['name']; ?></h2>
	<h2 style="color: white; margin-left: 5%">Role: <?php echo $_SESSION['role']; ?></h2>
<div id=>
    
<a style="margin-left: 5%" href="action/subjectlist.php" target="blank"><button class="left"><h5>View a list of subjects</h5></button></a>
	



<br>
<br>
<center>
    <h1 style="color: white">Add a subject</h1>
        <br>
<form action="action/adminaddsubject.php" method="POST">
	<h4>Enter subject name:<input type="text" name="sname">
                                <input type="submit" name="submit" value="Submit">

</form>
<br><br><br>


<br>
<h1 style="color: white">Add a topic</h1><br>
<form action="action/adminaddtopic.php" method="POST">
<h4>	Subject name:

	<?php
	$sql = "SELECT * from subjects";
	$result = $con->query($sql);
	if ($result->num_rows > 0) {
	echo '<select name="sname">';
	while($row = $result->fetch_assoc())
	{
		echo '<option value="'.$row[sname].'">'.$row[sname].'</option>';
	}
	echo '</select>';
		}
	?>
<br>
	Enter topic name:
	<input type="text" name="tname">
	<input type="submit" name="submit" value="Submit">
</form>

<br><br><br>


<br>
<h1 style="color: white">Add a content</h1><br>
<form action="action/topicfilter.php" method="POST">
	
<h4>	Subject name:

	<?php
	$sql = "SELECT * from subjects";
	$result = $con->query($sql);
	if ($result->num_rows > 0) {
	echo '<select name="sname">';
	while($row = $result->fetch_assoc())
	{
		echo '<option value="'.$row[sname].'">'.$row[sname].'</option>';
	}
	echo '</select>';
		}
	?>
	<br><input type="submit" name="submit" value="Continue">

</form>
<br><br><br>
</center>

</body>
</html>