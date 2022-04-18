<?php
   session_start();

        if (isset($_POST['delete_btn_set'])) {
            

        $Id = $_POST['delete_id'] ;



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

            $GetItemQuery = "SELECT * from items WHERE Id='$Id'";
            $result = $con->query($GetItemQuery);
            if($result->num_rows <= 0){
                echo "<script>
                        alert('The item is not found');
                        window.location.href='ItemsPage.php';
                        </script>";
            }
            else{
                $DeleteItemQuery = "DELETE from items WHERE Id= '$Id'";
                $con->query($DeleteItemQuery);
                
            }

            
                     
    }           
 
 $con->close();
?>