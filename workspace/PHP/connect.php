<?php
include "db.php"; // Includes the database connection details.
$table ="users"; //Table information
//Form post data
$firstname =$_POST['firstname'];
$lastname =$_POST['lastname'];
$email =$_POST['email'];
$postcode =$_POST['postcode'];
$address =$_POST['address'];
$password =$_POST['password'];
$type="User";

// Make a connection to the database

$conn = new mysqli($server, $user, $tpassword, $database, $port );
//Checks the connection
if ($conn->connect_error) {
	die("Connection Failed: " . $conn->connection_error);
}
echo "Connected Succesfully";
//Inserts users details into databse
$sql = "INSERT INTO users (First, Last, Email, Postcode, Address, Password, Type) VALUES ('$firstname', '$lastname', '$email', '$postcode', '$address', '$password', '$type')";
//querys if the instert was successful 
if ($conn->query($sql) === TRUE) {
	echo"New User added";

}else{
	echo"Error: " .$sql. "<br>" .$conn->error;
}
//takes user to home page
header("location:../index.html");

$conn->close();
?>