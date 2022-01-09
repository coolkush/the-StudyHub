<!DOCTYPE html>
<html>
<head>
	<title>Change password</title>
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
     <link rel="stylesheet" href="css/changepass.css"
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
                    
                </ul>
            </div>
        </div>
    </nav>
<form class="box" action = "action/pswdchange.php" method="POST">
	<h1>Enter new password</h1>
	<input style="color: white" type="password" name="new" placeholder="enter password"> <br>
	<input type="submit" name="submit" value="Submit">
</form>

</body>
</html>