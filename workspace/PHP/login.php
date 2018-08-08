<?php
//Database Connection Details
include("db.php");
//Start the session
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST") {
	
	// Make a connection to the database
 $conn = new mysqli($server, $user, $tpassword, $database );
 
 // Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully ";
 
       // email and password from the form 
	   $myusername =$_POST['email'];
       $mypassword =$_POST['password']; 
      
      $result = $conn->query("SELECT * FROM users WHERE Email='". $myusername ."' AND Password ='". $mypassword ."'");
      


      $row = $result->fetch_assoc();
	  
	     
	//Checks if the users details are good, and if the user is a Admin or User

		 
			if($row['Type']=="Admin"){
			   header('location:EditAPI/admin.html');
			   exit();
			}
			if($row['Type']=="User"){
				header('Location:../user.html');
				exit();
			}
}
    

	   $conn->close();

?>