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

			  <a class="navbar-brand " style="color: red;" href="#">NEXTDOOR Market</a>
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbar" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
			  </button>

			  <div class="collapse navbar-collapse" id="myNavbar">
			    <ul class="navbar-nav mr-auto w-100 justify-content-end">
				      <li class="nav-item"><a class="nav-link " href="#">Home </a>
				      <li class="nav-item"><a class="nav-link active" href="Login.html">Login</a></li>
				      <li class="nav-item"><a class="nav-link" href="SignUp.html">SignUp</a></li>
				</ul>
			  </div>
	  </div>
	</nav>

	<div class="container-fluid">
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary">Edit Item</h6>
			</div>
		</div>
		<div class="card-body justify-content-center">

			<?php 
			if(isset($_POST['edit_data']))
			{

			$Id = $_POST['id'];

			$conn = new mysqli ('localhost', 'root', '',"FYP");
							$GetItemQuery = "SELECT * from items WHERE Id ='$Id'";
							$result = $conn->query($GetItemQuery);
			foreach ($result as $row)
			 {
				?>

				<form class=" mt-3 col-lg-9 col-md-9 col-11 "  id="" action="Update.php" method="POST" enctype="multipart/form-data" >
				<h1 style="color:black">Edit Item Information</h1>
				<hr>

				<input type="hidden" name="id" value="<?php echo $row['Id']?>">

				<div class= "files form-group ">
					<label>Upload Image: </label>
                <input type="file" name="image" id="image" class="form-control" multiple="" value="<?php echo $row['Image']?>" required>


				</div>

				<hr>

				<div class="form-group ">
					<label for="editTitle">Title:</label>
				    <input type="text" name="editTitle" id="editTitle" class="form-control" placeholder="Type Item Title here" value="<?php echo $row['Title']?>" required>
				    </div>

				   
		        <div class="error" id="symptomsError"></div>
				

				
				<hr> 


				<div class="form-group   ">
					<label for="editCategory">Category:</label>
					<select name="editCategory" id="editCategory"  class="form-control" value="<?php echo $row['Category']?>" required>
						<option value="" >Select a Category</option>
						<option value="Shoes" >Shoes</option>
						<option value="Cloths" >Cloths</option>
						<option value="Cars" > Cars</option>
						<option value="Cars Accessory" > Cars Accessory</option>
						<option value="Mobile Phones & Gadgets" > Mobile Phones & Gadgets</option>
						<option value="Accessory for Mobile Phones & Gadgets" > Accessory for Mobile Phones & Gadgets</option>
						<option value="TV/Audio/Video" > TV/Audio/Video</option>
						<option value="Computers and Accessory" > Computers and Accessory</option>
						<option value="Games & Consoles" > Games & Consoles</option>
						<option value="Bags & Wallets" > Bags & Wallets</option>
						<option value="Watches & Fashion Accessories" > Watches & Fashion Accessories</option>
						<option value="Health & Beauty" > Health & Beauty</option>
						<option value="Bed & Bath" > Bed & Bath</option>
						<option value="Home Appliances and Kitchen" > Home Appliances and Kitchen</option>
						<option value="Furniture & Decoration" > Furniture & Decoration</option>
						<option value="Garden Items" > Garden Items</option>
						<option value="Textbooks" > Textbooks</option>
						<option value="Sports & Outdoors" > Sports & Outdoors</option>
						<option value="Music & Movies" > Music & Movies</option>
						<option value="Music Instruments" > Music Instruments</option>
						<option value="Tickets & Vouchers" > Tickets & Vouchers</option>
						<option value="Pets" > Pets</option>
						<option value="Foods" > Foods</option>
						<option value="Others" > Others</option>
						
				</select>
					<div class="error" id="usernameError"></div>
				</div>

				<hr> 

				<div class="form-group">
					<label for="editCondition">Condition:</label> <br>

					   <div class="form-check form-check-inline">
						  <input
						    class="form-check-input"
						    type="radio"
						    name="editCondition"
						    id="editCondition"
						    value="New"
						  />
						  <label class="form-check-label" for="newBtn">New</label>
						</div>

						<div class="form-check form-check-inline">
						  <input
						    class="form-check-input"
						    type="radio"
						    name="editCondition"
						    id="editCondition" checked
						    value="Used"
						  />
						  <label class="form-check-label" for="usedBtn">Used</label>
						</div>


				    <div class="error" id="nameError"></div>
				</div>

				<hr>

				<div class="form-group">
					<label for="editPrice">Price:</label>
				    <input type="text" name="editPrice" id="editPrice" class="form-control" placeholder="Enter Price in RM" value="<?php echo $row['Price']?>" required>
				
		        </div>
		        <div class="error" id="symptomsError"></div>

		        <hr>

				<div class="form-group   ">
					<label for="editDescription">Description:</label>
					<input type="text" name="editDescription" id="editDescription" class="form-control" placeholder="Enter Item Description" value="<?php echo $row['Description']?>" required>

					<div class="error" id="usernameError"></div>
				</div>
				
				
				<hr>
				 <div >
			        <a href="ItemsPage.php" class="btn btn-danger" >CANCEL</a>
			        <button type="submit" name="update_item" class="btn btn-primary">Save Changes</button>
                 </div>
			</form>




				<?php
			}

		}

			?>



			
			
		</div>

	</div>





    

		
		<footer class="footerSection bg-light   mt-5" id="footerdiv">
				

				<div class="mt-3 text-center">
					<p>Copyright &copy; 2021 All rights reserved. Created in HELP University </p>
					
				</div>
			</footer>

			<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
			<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

		

		
	</body>
</html>