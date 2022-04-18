<?php
   session_start();

        if (isset($_POST['save_item'])) {
            

        $Image = $_FILES['image']['name'];
        $Title = $_POST['title'] ;
        $Description = $_POST['description'];
        $Category = $_POST['category'];
        $ItemCondition = $_POST['condition'];
        $Price = $_POST['price'];

        $UserName = $_SESSION['findUser'];

        $ValidImages = $_FILES['image']['type']== "image/jpg" ||
            $_FILES['image']['type']== "image/jpeg" ||
            $_FILES['image']['type']== "image/png"  ;


        $SERVERNAME = "localhost";
        $dbUsername = "root";
        $dbPassword = "";

        $con = new mysqli ($SERVERNAME ,$dbUsername ,$dbPassword,"FYP");

        //check connection
        if ($con ->connect_error){
            die("connection faild".$con ->connect_error);
        }

        if($con->select_db("FYP") == false){
                $CreateDatabase = "CREATE DATABASE FYP";
                $con->query($CreateDatabase);
                $con->select_db("FYP");
            }
            else{
                $con->select_db("FYP");
            }

             $GetItemQuery = "SELECT * from items";
            $result = $con->query($GetItemQuery);
            if($result->num_rows <= 0){
                $CreateItemsTableQuery = "CREATE TABLE items(Id int not null AUTO_INCREMENT PRIMARY KEY  ,Image VARCHAR(255) NOT NULL ,Title VARCHAR(255) NOT NULL,Category VARCHAR(50) NOT NULL ,ItemCondition VARCHAR(20) NOT NULL,Price Varchar(20) NOT NULL,Description VARCHAR(255) NOT NULL, username VARCHAR(30), FOREIGN KEY (username) REFERENCES users(username))";
                $con->query($CreateItemsTableQuery);
            }

            if ($ValidImages) {
      
                $AddItemQuery = "INSERT INTO items values(null,'$Image', '$Title','$Category','$ItemCondition','$Price','$Description', '$UserName')";
               $AddItemQuery_run = $con->query($AddItemQuery);
                
                if ($AddItemQuery_run) {
                    
                    $_SESSION['status'] = "New Item Created!";
                    $_SESSION['status_code'] = "success";
                    header('location: ItemsPage.php');


                    move_uploaded_file($_FILES["image"]["tmp_name"], "Upload/".$_FILES["image"]["name"]);
                }
                else{
                    $_SESSION['status'] = "Item Not Created!";
                    $_SESSION['status_code'] = "error";
                    header('location: ItemsPage.php');
                }
                        
                }
            else{
            
                    $_SESSION['status'] = "Invalid Image Type! Try again.";
                    $_SESSION['status_code'] = "error";
                    header('location: ItemsPage.php');

        }          
    }           
 
 $con->close();
?>