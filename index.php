
<!DOCTYPE html>
<html lang="en">

<?php
    session_start();
    $conn = new mysqli ('localhost', 'root', '',"FYP");
?>
	<head>
		<meta charset="UTF-8">
		<title>Login</title>
		
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<link rel="stylesheet" href="CSS/style3.css">
	<script type="text/javascript" src="JavaScript/script.js"></script>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"> </script>

		

		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

		
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>



<style type="text/css">
	
body > nav:nth-child(n) > ul > li.page-item.active > a {
        background-color: black;
    }

    body > nav:nth-child(n) > ul > li:nth-child(n):hover>a {
        background-color: red;
        color: white;
    }

    .pagination a {
        color: black;
    }
</style>
		 
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
				      <li class="nav-item"><a class="nav-link active" href="index.php">Home </a></li>
				      <li class="nav-item"><a class="nav-link " href="ItemsPage.php">MyAds </a></li>
				      
				      <li class="nav-item"><a class="nav-link " href="ItemsList.php">ItemsList </a></li>

				      <li class="nav-item"><a class="nav-link " href="Logout.php">Logout</a></li>

				    
				</ul>
			  </div>
	  </div>
	</nav>
   <!-- Modal -->


   

<div class="row">
 
		<div class="col-lg-3  bg-light ">
		<h5 class="mt-5 ">Filter Product</h5> 
		<hr>

		<h6 class="text-info">Condition</h6>
		<ul class="list-group">
			
			<?php 
            
               $sql= "SELECT DISTINCT ItemCondition FROM items Order By ItemCondition ";
               $result= $conn->query($sql);
               while ($row=$result->fetch_assoc()) {
               	# code...
               
			 ?>

			 <li class="list-group-item ml-2">
			 	<div class="form-check">
			 		<label class="form-check-label">
			 			<input type="checkbox" class="form-check-input product_check"  value="<?= $row['ItemCondition']; ?> " id="ItemCondition"><?= $row['ItemCondition']; ?>
			 			
			 		</label>
			 		
			 	</div>
			 </li>
			<?php } ?>
		</ul>


		<h6 class="text-info mt-2">Category</h6>
		<ul class="list-group">
			
			<?php 
            
               $sql= "SELECT DISTINCT Category FROM items Order By Category ";
               $result= $conn->query($sql);
               while ($row=$result->fetch_assoc()) {
               	# code...
               
			 ?>

			 <li class="list-group-item ml-2">
			 	<div class="form-check">
			 		<label class="form-check-label">
			 			<input type="checkbox" class="form-check-input product_check"  value="<?= $row['Category']; ?> " id="Category"><?= $row['Category']; ?>
			 			
			 		</label>
			 		
			 	</div>
			 </li>
			<?php } ?>
		</ul>

	</div>

	<div class="col-lg-9">
		<h5 class="text-center mt-5" id="textChange">All Products</h5>

		<hr>

		<div class="text-center">
			<img src="Upload/loader.gif" id="loader" width="200" style="display: none;">
		</div>

		<div class="row" id="result">
			<?php 
			  $sql = "SELECT * FROM items order by Id  desc";
			  $result = $conn->query($sql);
			  while ($row = $result->fetch_assoc()) {
			  	# code...
			  	?>
			  	<div class="col-sm-6 col-lg-3 ">
			  		<div  class="card-dec  ">
			  			<div id="Products" class="card border-0 products text-center">
			  				
			  				<?php 
			  				echo '<img class="card-img img-fluid float mb-3 rounded" src="Upload/'.$row['Image'].'" alt= "Image" >';
			  				 ?>
			  				
			  				<div class="card-body ">
			  					<h6  class="text-light bg-info text-center rounded p-1"> <?= $row['Title']; ?></h6>
			  					<h4 class="card-title text-danger">Price: <?= $row['Price']; ?></h4>
			  					<?php
			  					echo "<form action='ItemsInfo.php' method='post'>";

							echo "<input type='hidden' value='".$row['Id']."' name='Id' />";

							echo '<td> <button type="submit" class= "btnDetail" name="edit_data"> View details</button></td>';

							echo "</form>";
			  					  ?>
			  				</div>

			  			</div>
			  		</div>
			  	</div>
			  	<?php 
			  }

			?>
			
		</div>

	</div>




   <nav aria-label="...">
  <ul class="pagination mt-5 ml-5">
    <li class="page-item disabled">
      <a class="page-link">Previous</a>
    </li>
    <li class="page-item active"><a class="page-link" href="#product">1</a></li>
    <li class="page-item " aria-current="page">
      <a class="page-link" href="#product">2</a>
    </li>
    <li class="page-item"><a class="page-link" href="#product">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#product">Next</a>
    </li>
  </ul>
</nav>


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


<script type="text/javascript">
	$(document).ready(function(){

		$(".product_check").click(function(){
			$("#loader").show();

			var action = 'data';
			var Category = get_filter_text('Category');
			var ItemCondition = get_filter_text('ItemCondition');

			$.ajax({
				url:'action.php',
				method:'POST',
				data:{action:action, Category:Category, ItemCondition:ItemCondition},
				success: function(response){
					$("#result").html(response);
					$("#loader").hide();
					$("#textChange").text("Filtered Products");
				}

			});

		});
		
		function get_filter_text(text_id){
			var filterData = [];
			$('#' + text_id+ ':checked').each(function(){
				filterData.push($(this).val());
			});
			return filterData;
		}
	});
</script>


		
	</body>
</html>