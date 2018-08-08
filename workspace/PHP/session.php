<?php
   include('db.php');
   // Start the session
   session_start();
   
   // Set the session varaibles
   $user_check = $_SESSION['login_user'];
   
   // Make a connection to the database
   $conn =  mysqli_connect($servername, $username, $dbpassword, $db );
   // Runs querry to retrive user name
   $result = mysqli_query($conn,"select firstname from users where firstname = '$user_check'");
     if (!$result) {
	   echo 'Could not run query: ' . mysql_error();
        exit;
         }
   
      $row = mysqli_fetch_array($result);
        
        $login_session = $row['username'];
		// Sends username to user page
       
   if(!isset($_SESSION['login_user'])){
      header("location:../user.html");
   }
?>