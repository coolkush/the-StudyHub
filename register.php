<!DOCTYPE html>
<html>
<head>
	<title>Registration page</title>
	<meta charset="UTF-8">
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
<link rel="stylesheet" href="css/register.css">
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
                        <a href="index.php" class="nav-link smoothScroll">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="aboutus.html" class="nav-link smoothScroll">aboutus</a>
                    </li>
                    <li class="nav-item">
                        <a href="login.php" class="nav-link">Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="register.php" class="nav-link contact">Sign Up</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<form class="box" action = "action/regaction.php" method="POST">
	<br><br><br><br><br><br>
	<h1>Sign Up</h1>
	<input type="text" name="name"placeholder="Name" style="color: white;"> <br>
	
	<input type="text" name="email"placeholder="Enter your Email" style="color: white;"> <br>
	
	<input type="password" name="pswd"placeholder="Create your Password" style="color: white;"> <br>
	<input type="submit" name="submit" value="Submit">


</form>

</body>
</html>