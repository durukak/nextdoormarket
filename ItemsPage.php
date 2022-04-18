
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
				      <li class="nav-item"><a class="nav-link " href="index.php">Home </a></li>
				      <li class="nav-item"><a class="nav-link active" href="ItemsPage.php">MyAds </a></li>
				      
				      <li class="nav-item"><a class="nav-link " href="Logout.php">Logout</a></li>
				</ul>
			  </div>
	  </div>
	</nav>
   <!-- Modal -->
<div class="modal fade" id="ItemsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Item</h5>
        <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal" aria-label="Cancel"></button>
      </div>
      <div class="modal-body">
        <div class="row">
			<form class=" mt-3 col-lg-9 col-md-9 col-11"  id="" action="AddItem.php" method="POST" enctype="multipart/form-data" >
				<h1 style="color:black">SELL YOUR PRODUCT</h1>
				<hr>

				<div class= "files form-group ">
					<label>Upload Image: </label>
                <input type="file" name="image" id="image" class="form-control" multiple="" required>


				</div>

				<hr>

				<div class="form-group ">
					<label for="title">Title:</label>
				    <input type="text" name="title" id="title" class="form-control" placeholder="Type Item Title here" required>
				    </div>

				   
		        <div class="error" id="symptomsError"></div>
				

				
				<hr> 


				<div class="form-group   ">
					<label for="category">Category:</label>
					<select name="category" id="category"  class="form-control" required>
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
					<label for="condition">Condition:</label> <br>

					   <div class="form-check form-check-inline">
						  <input
						    class="form-check-input"
						    type="radio"
						    name="condition"
						    id="condition"
						    value="New"
						  />
						  <label class="form-check-label" for="newBtn">New</label>
						</div>

						<div class="form-check form-check-inline">
						  <input
						    class="form-check-input"
						    type="radio"
						    name="condition"
						    id="condition" checked
						    value="Used"
						  />
						  <label class="form-check-label" for="usedBtn">Used</label>
						</div>


				    <div class="error" id="nameError"></div>
				</div>

				<hr>

				<div class="form-group">
					<label for="price">Price:</label>
				    <input type="text" name="price" id="price" class="form-control" placeholder="Enter Price in RM" required>
				
		        </div>
		        <div class="error" id="symptomsError"></div>

		        <hr>

				<div class="form-group   ">
					<label for="description">Description:</label>
					<input type="text" name="description" id="description" class="form-control" placeholder="Enter Item Description" required>
					<div class="error" id="usernameError"></div>
				</div>
				
				
				<hr>
				 <div class="modal-footer">
			        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">CANCEL</button>
			        <button type="submit" name="save_item" class="btn btn-primary">ADD</button>
                 </div>
			</form>
	    </div>
      </div>
     
    </div>
  </div>
</div>


	<div class="container-fluid">



		<div class="card shadow mb-4">

			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-dark"> Ads
					<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ItemsModal">
						ADD
					</button>
				</h6>
			</div>

		</div>

		<div class="card-body">

			<div class="table-responsive">
				
				<?php
							$conn = new mysqli ('localhost', 'root', '',"FYP");
							$GetItemQuery = "SELECT * from items WHERE username ='{$_SESSION["findUser"]}' ";
							$result = $conn->query($GetItemQuery); 
							?>
				<table id="testTable" class="col-12 table table table-hover  table-borderless " >
			  <thead>
			    <tr class=""  >
			      <th scope="col">Title</th>
			      <th scope="col">Category</th>
			      <th scope="col">Condition</th>
			      <th scope="col">Price </th>
			      <th scope="col">Image </th>
			      <th scope="col">Edit</th>
			      <th scope="col">Delete</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php
							$Num = 0;
							if ($result) {
								
								while($row = $result->fetch_assoc()){
				            	$Num++;
				            		echo "<tr>";

							
							echo '<td>'.$row['Title'].'</td>';

							echo '<td>'.$row['Category'].'</td>';

							echo '<td>'.$row['ItemCondition'].'</td>';
							
							echo '<td>'.$row['Price'].'</td>';
							
							echo '<td> <img src="Upload/'.$row['Image'].'"width="100px;" height= "100px;" alt= "Image" ></td>';

							echo "<form action='UpdateItem.php' method='post'>";

							echo "<input type='hidden' value='".$row['Id']."' name='id' />";

							echo '<td> <button type="submit" class= "btn btn-success" name="edit_data"> Edit</button></td>';

							echo "</form>";

							//echo "<form action='DeleteItem.php' method='post'>";

							//echo "<input type='hidden' value='".$row['Id']."' name='id_delete' />";

							//echo '<td> <button type="submit" class= "btn btn-danger" name="delete_data"> Delete</button></td>';

							//echo "</form>";

							echo "<input type='hidden' value='".$row['Id']."' name='id_delete' class='delete_id_value' />";

							echo '<td> <a href="javascript:void(0)" class= "delete_btn_ajax btn btn-danger" name="delete_data"> Delete</button></td>';


							
							echo "</tr>";
						}
							}
				            
?>



			  </tbody>
			</table>
			</div>

		</div>


        <?php
        
        ?>

	</div>







    

		
		<footer class="footerSection bg-light   mt-5" id="footerdiv">
				

				<div class="mt-3 text-center">
					<p>Copyright &copy; 2021 All rights reserved. Created in HELP University </p>
					
				</div>
			</footer>

			<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
			<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

		<script type="text/javascript">
			$(document).ready(function(){

				$('.delete_btn_ajax').click(function(e){
					e.preventDefault();

					var deleteId = $(this).closest("tr").find('.delete_id_value').val();
					console.log(deleteId);

					swal({
						  title: "Are you sure?",
						  text: "Once deleted, you will not be able to recover this Data!",
						  icon: "warning",
						  buttons: true,
						  dangerMode: true,
						})
						.then((willDelete) => {
						  if (willDelete) {

						  	$.ajax({

						  		type: "POST",
						  		url: "DeleteItem.php",
						  		data: {
						  			"delete_btn_set" :1,
						  			"delete_id" : deleteId,
						  		},
						  		success: function (response){

						  			swal("Data Deleted Successfuly!",{ icon:"success",

						  			}).then((result) =>{
						  				location.reload();
						  			});
						  			}	
						  	});
						  } 
					});

				});

			});
		</script>

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