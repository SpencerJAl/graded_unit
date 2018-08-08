<?php
$firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
$lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$to="20068032@student.glasgowclyde.ac.uk";


// the message
$msg = "First line of text\nSecond line of text";

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);

// send email
mail("20068032@student.glasgowclyde.ac.uk",$vistorname, $vistormessege);
header("location: home.html");



?>

