<?php 
	session_start();
	$UserName = $_POST['username'];
	$Password = $_POST['password'];

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
	

	$AddUserQuery = "INSERT INTO users values('Admin','0109452818', '123','James', 'Cooper', '123@123.com', 'Ampang', 'Admin'), 
	('David','0109452817', '123','David', 'Beckham', '456@456.com', 'Montkiara',  null)";
	$conn->query($AddUserQuery);
$GetItemQuery = "SELECT * from items";
            $result = $conn->query($GetItemQuery);
            if($result->num_rows <= 0){
                $CreateItemsTableQuery = "CREATE TABLE items(Id int not null AUTO_INCREMENT PRIMARY KEY  ,Image VARCHAR(255) NOT NULL ,Title VARCHAR(255) NOT NULL,Category VARCHAR(50) NOT NULL ,ItemCondition VARCHAR(20) NOT NULL,Price Varchar(20) NOT NULL,Description VARCHAR(255) NOT NULL, username VARCHAR(30), FOREIGN KEY (username) REFERENCES users(username))";
                $conn->query($CreateItemsTableQuery);
            }


	$_SESSION['findUser']=$UserName;

	$GetUserQuery = "SELECT * from users";
	$result = $conn->query($GetUserQuery);
	if($result->num_rows <= 0){
		
			 $_SESSION['status'] = "The User does not exist, Please enter again or go to sign up";
             $_SESSION['status_code'] = "error";
             header('location: Login.php');
	}
	else{
		$CheckSymbols = "/^[a-zA-Z0-9_-]+$/";
		$Checkwhitespace = "/\s/";
		if(preg_match($Checkwhitespace,$UserName) || preg_match($Checkwhitespace,$Password)){
			
			$_SESSION['status'] = "Username or Password cannot have empty spaces";
             $_SESSION['status_code'] = "error";
             header('location: Login.php');
		}
		elseif (!preg_match ($CheckSymbols, $UserName )) {
			$_SESSION['status'] = "Username Cannot have Symbols";
             $_SESSION['status_code'] = "error";
             header('location: Login.php');
		}
		
		else{
			$LoginQuery = "SELECT username , password ,UserType FROM users where username='$UserName' AND password='$Password'";
			$result = $conn->query($LoginQuery);
			if($result->num_rows > 0){
				$row = $result->fetch_assoc();
				if($row["UserType"] == "Admin"){
					header("Location: AdminPage.html");
				}
				else {
					header("Location: index.php");
				}

			}
			else{
				$_SESSION['status'] = "The User does not exist, Please enter again or go to sign up";
             $_SESSION['status_code'] = "error";
             header('location: Login.php');
			}
		}
	}

	if (isset($_SESSION['findUser'])) {
    echo "session is set";
  }

	$conn->close();
?>