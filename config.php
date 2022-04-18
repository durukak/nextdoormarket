<?php 

$SERVERNAME = "localhost";
        $dbUsername = "root";
        $dbPassword = "";

        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        $conn = new mysqli ($SERVERNAME ,$dbUsername ,$dbPassword,"FYP");

        //check connection
        if ($conn ->connect_error){
            die("connection faild".$conn ->connect_error);
        }

 ?>