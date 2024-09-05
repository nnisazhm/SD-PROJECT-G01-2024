<?php

// Database connection settings
$servername = "localhost"; // Typically "localhost" if your database is on the same server
$username = "web2"; // Your MySQL username
$login_password = "web2"; // Your MySQL login_password
$dbname = "meqa.my"; // The name of your database

// Create connection
$conn = new mysqli($servername, $username, $login_password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
//////////////////////////////////////////////////////////////////////////////////////////////////////////
if (isset($_POST['login_email'])  && isset($_POST['login_email'])) {
	function validate ($data){

		$data = trim ($data);
		$data = stripslashes ($data);
		$data = htmlspecialchars($data);
		return  $data;
	}
	
	$login_email = validate ($_POST['login_email']);
	 
	$login_password = validate ($_POST['login_password']);
	
	if (empty ($login_email)) { 
		header ("Location: index.html? error = User Name is required");
		exit();	
	} else if(empty ($login_password)) {
		header ("Location: index.html? error = login_password is required");
		exit();
		
	} else {
		echo "Valid input";
	}
	
	
}else{
	header("Location: index.html");
	exit();
}
	
?>