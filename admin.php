<?php
session_start();
include 'dbconfig.php';
if($_SESSION['role']!='admin')
{
  header("refresh:0; url=".$_SESSION['role'].".php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>ADMIN PANEL</title>
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
            <a class="navbar-brand" href="index.php">
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
	<h2 style="color: white; margin-left: 5%">Welcome Admin, <?php echo $_SESSION['name']; ?></h2>
	


<a style=" margin-left: 5%" href="action/userlist.php" target="blank"><button class="left"><h5>View Users</h5></button></a><br><br>
<a style=" margin-left: 5%" href="action/subjectlist.php" target="blank"><button class="left"><h5>View a list of subjects</h5></button></a>
<center>
<h1 style="color: white">Add a user</h1s><br>

<form action="action/adminuseradd.php" method="POST">
	
<h4>Full name:
<input type="text" name="name"><br>
email id:
<input type="text" name="email"><br>
password:
<input type="password" name="pswd"><br>

user type: 

<?php
$sql = "SELECT * from roles";
$result = $con->query($sql);
if ($result->num_rows > 0) {
echo '<select name="role">';
while($row = $result->fetch_assoc())
{
	echo '<option value="'.$row[rolename].'">'.$row[rolename].'</option>';
}
echo '</select>';
	}
?>
<br>
<input type="submit" name="submit" value="Submit">
</form>

<br><br><br>
<h1 style="color: white">Delete a user</h1>

<form action="action/adminuserdel.php" method="POST">
	<h4>Enter email:
	<input type="text" name="email">
	<input type="submit" name="submit" value="Submit">
</form>
<br><br><br>
<h1 style="color: white">Reset user's password</h1>

<form action="action/adminuserreset.php" method="POST">
	<h4>Enter email:
	<input type="text" name="email"><br>
	Enter password:
	<input type="password" name="pswd"><br>
	<input type="submit" name="submit" value="Submit">
</form>
<br><br><br>

<h1 style="color: white">Add a subject</h1>
<form action="action/adminaddsubject.php" method="POST">
<h4>	Enter subject name:
	<input type="text" name="sname">
	<input type="submit" name="submit" value="Submit">
</form>
<br><br><br>

<h1 style="color: white">Add a topic</h1>
<form action="action/adminaddtopic.php" method="POST">
	<h4>Subject name:

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

	<br>Enter topic name:
	<input type="text" name="tname">
	<input type="submit" name="submit" value="Submit">
</form>
<br><br><br>


<h1 style="color: white">Add a content</h1>
<form action="action/topicfilter.php" method="POST">
	
	<h4>Subject name:

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
	<input type="submit" name="submit" value="Continue">

</form>
<br><br><br>
</center>


</body>
</html>