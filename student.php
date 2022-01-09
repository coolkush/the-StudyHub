<?php
session_start();
include 'dbconfig.php';
include 'action/extract.php';
if($_SESSION['name']=='')
{
  header("refresh:0; url=index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>STUDENT PANEL</title>

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


<style>


body {
  font-family: 'Source Sans Pro', sans-serif;
  background-color: rgb(5,122,141);
  color: white;
}

h1 {
  padding-bottom: 0;
  margin-bottom: 0;
}

h3 {
  margin-top: 0;
  font-weight: 300;
}

.container {
  width: 40em;
  margin: 10px auto;
}



.ac-label {
  font-weight: 700;
  position: relative;
  padding: .5em 1em;
  margin-bottom: .5em;
  display: block;
  cursor: pointer;
  background-color: whiteSmoke;
  transition: background-color .15s ease-in-out;
}

.ac-input:checked + label, .ac-label:hover {
  background-color: #999;
}

.ac-label:after, .ac-input:checked + .ac-label:after {
  content: "+";
  position: absolute;
  display: block;
  right: 0;
  top: 0;
  width: 2em;
  height: 100%;
  line-height: 2.25em;
  text-align: center;
  background-color: #e5e5e5;
  transition: background-color .15s ease-in-out;
}

.ac-label:hover:after, .ac-input:checked + .ac-label:after {
  background-color: #b5b5b5;
}

.ac-input:checked + .ac-label:after {
  content: "-";
}

.ac-input {
  display: none;
}



.ac-text, .ac-sub-text {
  opacity: 0;
  height: 0;
  margin-bottom: .5em;
  transition: opacity .5s ease-in-out;
  overflow: hidden;
}

.ac-input:checked ~ .ac-text, .ac-sub .ac-input:checked ~ .ac-sub-text { 
  opacity: 1;
  height: auto;
}



.ac-sub .ac-label {
  background: none;
  font-weight: 600;
  padding: .5em 2em;
  margin-bottom: 0;
}

.ac-sub .ac-label:checked {
  background: none;
  border-bottom: 1px solid whitesmoke;
}

.ac-sub .ac-label:after, .ac-sub .ac-input:checked + .ac-label:after {
  left: 0;
  background: none;
}

.ac-sub .ac-input:checked + label, .ac-sub .ac-label:hover {
  background: none;
}

.ac-sub-text {
  padding: 0 1em 0 2em;
}



</style>

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

   <h1 style="color: white">Welcome, <?php echo $_SESSION['name']; ?></h1>






   <br>
   <br>

  <?php 

echo "<section class='container'>";
$count=1;
$sql = "SELECT * from subjects";
$result = $con->query($sql);  


if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {

$sname = $row["sname"];
$sql2 = "SELECT sid from subjects where sname = '$sname'";
$result2 = $con->query($sql2);
$row2 = $result2->fetch_assoc();
$sid2 = $row2['sid'];



echo "<div class='ac'>
<input class='ac-input' id='ac-".$count."' name='ac-".$count."' type='checkbox' />
<label style='color:black' class='ac-label' for='ac-".$count."'>".$row["sname"]."</label>";
$count=$count+1;

$sql3 = "SELECT * from topics where sid = '$sid2'";
$result3 = $con->query($sql3);
if ($result3->num_rows > 0) {
while($row3 = $result3->fetch_assoc())
{
  echo "<article class='ac-text'>
      <div class='ac-sub'>
        <input class='ac-input' id='ac-".$count."' name='ac-".$count."' type='checkbox' />
        <label class='ac-label' for='ac-".$count."'>".$row3["tname"]."</label>";
$count=$count+1;

  $tid4 = $row3["tid"];
  $sql4 = "SELECT * from content where tid = '$tid4' order by cid";
  $result4 = $con->query($sql4);
  if ($result4->num_rows > 0) {
    while($row4 = $result4->fetch_assoc())
    {
      
      if($row4["type"]=="video")
      {
      $newlink = extractor($row4["link"]);
      echo "<article class='ac-sub-text'>
        <h4>".$row4["cname"]."</h4>";
        echo "<iframe width='560' height='315' src='".$newlink."' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>";
      
        echo "</article>";
       }

       else
       {
        echo "<article class='ac-sub-text'>
        <h4>".$row4["cname"]."</h4>";
        echo "View or download: <a target='blank' href='uploads/".$row4["docname"]."'>".$row4["cname"]."</a>";
        echo "</article>";
        
       } 
      
    }
  }
  else
  {
  	echo "Nothing uploaded yet";
  }
echo " </div>
    </article>";
}

}

 echo "</div>";
}

}

echo "</section>";

?> 


<br>
<br>
<br>
<br>


<br>
<br>




</body>
</html>