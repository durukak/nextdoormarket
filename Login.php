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

	<body >
		<nav class="navbar navbar-light bg-light navbar-expand-sm sticky-top" style="background-color: #e3f2fd;">
		<div class="container">

			  <a class="navbar-brand " style="color: red;" href="index.php">NEXTDOOR Market</a>
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbar" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
			  </button>

			  <div class="collapse navbar-collapse" id="myNavbar">
			    <ul class="navbar-nav mr-auto w-100 justify-content-end">
				      <li class="nav-item"><a class="nav-link active" href="Login.php">Login </a>
				      <li class="nav-item"><a class="nav-link  " href="Geolocation.php">SignUp</a></li>

				</ul>
			  </div>
	  </div>
	</nav>


		<div class="container">
		<div class="row justify-content-md-center">
			<div class="col-12">
				<form class="LoginAndSignUp" action="LoginUser.php" method="POST">
					<h1>Login</h1>
						<div class="form-group justify-content-md-center ">
							
							<input class="form-control" type="text" name="username" id="username" placeholder="Username" required>
						</div>
						<div class="form-group ">
							
							<input class="form-control " type="password" name="password"id="LoginPassword" placeholder="Password" required>
						</div>
						<div class="button text-center ">
							<input type="submit" name="submit" value="Login">
							
						</div>
						
						<div class="text-center text-white">
							<a href="Geolocation.php">Not a member yet?</a>
						</div>
					
				</form>
			</div>
		</div>
		<footer class="footerSection bg-light   mt-5" id="footerdiv">
				

				<div class="mt-3 text-center">
					<p>Copyright &copy; 2021 All rights reserved. Created in HELP University </p>
					
				</div>
			</footer>
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


		<?php

		if (isset($_SESSION['status']) && $_SESSION['status'] != '') 
		{
			?>
			<script type="text/javascript">
				swal({
					title: " <?php echo $_SESSION['status']; ?>",
					icon: "<?php echo $_SESSION['status_code']; ?>",
					button: "OK",
				});
			</script>


			<?php

			unset($_SESSION['status']);


		}

		 ?>
	</body>
</html>