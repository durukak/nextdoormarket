<!DOCTYPE html>
<html lang="en">

<?php
session_start();
?>

<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>

    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="./CSS/style.css" />
    <script src="./Javascript/script.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    
    <script>
        $(function() {
            if (navigator.geolocation) {
                var id = navigator.geolocation.watchPosition(
                    function(pos) {
                        var latitude = $('#latitude').html(pos.coords.latitude);
                        var longitude = $('#longitude').html(pos.coords.longitude);
                        var latlon = latitude + "," + longitude
                    });
                $('#btnStop').click(function() {
                    navigator.geolocation.clearWatch(id);
                });
            } else {
                alert("This browser does not support Geolocation.")
            }

        });
    </script>
</head>
<body>
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
                <h3 style="text-align:center;"><br>&nbsp;&nbsp;&nbsp;Search Region</h3>
                <ul style="list-style:none; text-align:center;">
                    <li>--------Current Location (Latitude,Longitude)--------</li>
                    <li><span id="latitude"></span>,<span id="longitude"></span></li>
                    <!-- <input type="button" onlick="getInputValue();" value="get value"> -->
                    <input id="latlng" type="text"/>
                    <input id="submit" type="button" value="Search" />
                    <li>-----------------------------------------------------------</li>
                </ul>

                <div id="map"></div>
                <br>
                <form id="ship-address" action="Signup.php" method="GET" autocomplete="off">
                    <label class="full-field">
                        <span class="form-label">Type your Address</span>
                        <input id="ship-address" name="ship-address" required autocomplete="off" />
                    </label>
                    <button type="submit" class="my-button">Save address</button>
                    <input type="reset" value="Clear form" />
                </form>
            </div>
        </div>
    </div>
    <script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDtll37e57eLQyEHjt7-0epEB7mb_3RbbE&libraries=places&callback=initMap&v=weekly&language=en&region=US"
      async
    ></script>

    <footer class="footerSection bg-light   mt-5" id="footerdiv">


        <div class="mt-3 text-center">
            <p>Copyright &copy; 2021 All rights reserved. Created in HELP University </p>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <?php

    if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
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