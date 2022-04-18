<?php 
	session_start();
	$username = $_POST['username'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $address = $_POST['address'];

	$conn = new mysqli ('localhost', 'root', '');

	//checking
	if($conn->connect_error){
		die("Some thing error <br>".$connect->connect_error);
	}

	if($conn->select_db("FYP") == false){
		$CreateDatabase = "CREATE DATABASE FYP";
		$conn->query($CreateDatabase);
		$conn->select_db("FYP");
	}
	else{
		$conn->select_db("FYP");
	}

	$GetUserQuery = "SELECT * from users";
    $result = $conn->query($GetUserQuery);
    if($result->num_rows <= 0){
	$CreateUserTableQuery = "CREATE TABLE users(username VARCHAR(30) PRIMARY KEY,phone VARCHAR(50) NOT NULL, password VARCHAR(30) NOT NULL,firstname VARCHAR(50) NOT NULL ,lastname VARCHAR(50) NOT NULL, email VARCHAR(50) NOT NULL, address VARCHAR(50), UserType VARCHAR(30))";
	$conn->query($CreateUserTableQuery);
}

	$AddUserQuery = "INSERT INTO users values('Manager','0109452818', '123','James', 'Cooper', '123@123.com', 'Ampang', 'Admin'), 
	('David','0109452817', '123','David', 'Beckham', '456@456.com', 'Montkiara',  null)";
	$conn->query($AddUserQuery);



//check validate that the form is appropriate
if(empty($username)) {array_push($errors, "Username is required");}
if(empty($phone)) {array_push($errors, "Phone Number is required");}
if(empty($password)) {array_push($errors, "Password is required");}
if(empty($firstname)) {array_push($errors, "First Name is required");}
if(empty($lastname)) {array_push($errors, "Last Name is required");}
if(empty($email)) {array_push($errors, "Email address is required");}
if(empty($address)) {array_push($errors, "Address is required");}


$sql2 = "select username from users WHERE username='$username'";
$res2 = mysqli_query($conn, $sql2);
$check = mysqli_num_rows($res2);
if($check>0){ 
	echo "<script>alert('username already exist!!!');location.href='SignUp.php';</script>"; 

} else {
	$sql= "insert into users (username,phone,password,firstname,lastname,email,address) values('$username', '$phone', '$password', '$firstname','$lastname', '$email', '$address')";
	$res = $conn->query($sql);
	$_SESSION['status'] = "User Registered Successfully!";
                    $_SESSION['status_code'] = "success";
                    header('location: Login.php');
}


?>