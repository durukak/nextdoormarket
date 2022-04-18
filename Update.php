<?php
   session_start();

        if (isset($_POST['update_item'])) {
            

        $editId = $_POST['id'] ;
        $editImage = $_FILES['image']['name'];
        $editTitle = $_POST['editTitle'] ;
        $editDescription = $_POST['editDescription'];
        $editCategory = $_POST['editCategory'];
        $editItemCondition = $_POST['editCondition'];
        $editPrice = $_POST['editPrice'];

        $UserName = $_SESSION['findUser'];



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

            $GetItemsQuery = "SELECT * from items WHERE Id='$editId'";
            $result = $con->query($GetItemsQuery);
            if($result->num_rows <= 0){
                echo "<script>
                        alert('The item is not found');
                        window.location.href='ItemsPage.php';
                        </script>";
            }
            else{
                $UpdateItemQuery = "UPDATE items SET Image= '$editImage', Title= '$editTitle',Category ='$editCategory', ItemCondition= '$editItemCondition' , Price= '$editPrice' , Description= '$editDescription' WHERE Id= '$editId'";
                $UpdateItemQuery_run = $con->query($UpdateItemQuery);

                if ($UpdateItemQuery_run) {
                    
                    $_SESSION['status'] = "Item Updated!";
                    $_SESSION['status_code'] = "success";
                    header('location: ItemsPage.php');

                    move_uploaded_file($_FILES["image"]["tmp_name"], "Upload/".$_FILES["image"]["name"]);
                }
                else{
                     $_SESSION['status'] = "Item Not Updated!";
                    $_SESSION['status_code'] = "error";
                    header('location: ItemsPage.php');
                }
                
            }

            
                     
    }           
 
 $con->close();
?>