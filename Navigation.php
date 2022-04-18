<!DOCTYPE html>
<html lang="en">

<?php
    session_start();
?>
	<head>
		<meta charset="UTF-8">
		<title>Login</title>
		<link rel="stylesheet" href="CSS/style.css">
	<script type="text/javascript" src="JavaScript/script.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

		 
	</head>
	<?php
if ((! isset($_SESSION['findUser']))) {
    ?>
	<body >
		<nav class="navbar navbar-light bg-light navbar-expand-sm sticky-top" style="background-color: #e3f2fd;">
		<div class="container">

			  <a class="navbar-brand " style="color: red;" href="#">NEXTDOOR Market</a>
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbar" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
			  </button>

			  <div class="collapse navbar-collapse" id="myNavbar">
			    <ul class="navbar-nav mr-auto w-100 justify-content-end">
				      <li class="nav-item"><a class="nav-link " href="Login.php">Login </a>
				      <li class="nav-item"><a class="nav-link " href="SignUp.php">SignUp</a></li>

				</ul>
			  </div>
	  </div>
	</nav>


    <?php } else {?>
		<body >
		<nav class="navbar navbar-light bg-light navbar-expand-sm sticky-top" style="background-color: #e3f2fd;">
		<div class="container">

			  <a class="navbar-brand " style="color: red;" href="#">NEXTDOOR Market</a>
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbar" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
			  </button>

			  <div class="collapse navbar-collapse" id="myNavbar">
			    <ul class="navbar-nav mr-auto w-100 justify-content-end">
				<li class="nav-item"><a class="nav-link " href="ItemsPage.php">MyAds </a>
				      <li class="nav-item"><a class="nav-link " href="Logout.php">Logout</a></li>

				</ul>
			  </div>
	  </div>
	</nav>
      <?php } ?> 

</body>
</html>