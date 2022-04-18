<?php
   require 'config.php';

   if (isset($_POST['action'])) {

   	$sql = "SELECT * FROM items WHERE Category  !=''";

   	    if (isset($_POST['Category'])) {
    	# code...
    	$Category = implode("','", $_POST['Category']);
    	$sql .= "AND Category IN('".$Category."')";
    }


    if (isset($_POST['ItemCondition'])) {
    	# code...
    	$ItemCondition = implode("','", $_POST['ItemCondition']);
    	$sql .= "AND ItemCondition IN('".$ItemCondition."')";
    }

    $sql .= "order by Id  desc";


    $result = $conn->query($sql);
    $output = '';


    if ($result->num_rows>0){
    	# code...
    	while ($row=$result->fetch_assoc()) {
    		# code...
    		$output .='<div class="col-sm-6 col-lg-3">
                    <div  class="card-dec  ">
                        <div id="Products" class="card border-0 products text-center">
                            
                            <img class="card-img img-fluid float mb-3 rounded" src="Upload/'.$row['Image'].'" alt= "Image" >
                             
                            
                            <div class="card-body">
                                <h6  class="text-light bg-info text-center rounded p-1"> '.$row['Title'].' </h6>
                                <h4 class="card-title text-danger">Price: '.$row['Price'].'</h4>
                                
                                <form action="ItemsInfo.php" method="post">

                            <input type="hidden" value='.$row['Id'].' name="Id" />

                            <td> <button type="submit" class= "btnDetail" name="edit_data"> View details</button></td>

                            </form>
                                  
                            </div>

                        </div>
                    </div>
                </div>';
    	}
    }

    else{
    	$output = "<h3>No Products Found!</h3>";
    	//echo "Error in ".$query."<br>".$conn->error;
    }

    echo $output;

   }

  ?>

  