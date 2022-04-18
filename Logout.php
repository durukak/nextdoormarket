<?php
session_start();
$session=session_destroy();
if($session){
    echo "<script>alert('Logout successfully ');location.href='Login.php';</script>";
    
}
?>