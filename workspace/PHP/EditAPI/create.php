<?php
// include database and object files
include_once 'database.php';
include_once 'product.php';
// get database connection
$database = new Database();
$db = $database->getConnection();
// pass connection to objects
$product = new Product($db);
?>


<!DOCTYPE html>
<html lang="en">
<head>
 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../../images/logo.png">
    <title>Create Products</title>
     <!-- Loads Local style sheet -->
    <link rel="stylesheet" href="../../CSS/Style.css">
 
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>


    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <!-- latest Bootbox library . Must ensure that students add this library - libraries must be entered in the right order-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
    
    <!-- function to make form values to json format -->
    <script src="important.js"></script>
    
    <!-- app js script -->
    <script src="read.js"></script>
   
    <!-- app js script -->
    <script src="read1.js"></script>
    
    <!-- update-product js script -->
    <script src="update.js"></script>
    
    <!-- delete-product js script -->
    <script src="delete.js"></script>
    
</head>
<body>
 <div id="greeting">
  <img src="../../images/logo.png" alt="The companys logo" id="logo">Welcome to<span id="name"> Lidiflu</span>
 </div>
<!-- This will be the entire Main section of the site which will change on a page by page basis-->
 <div id="hyperlinks">
  <ul>
   <li><a href="../../index.html" class="hover" >Home</a></li>
   <li><a href="../../contact.html" class="hover">Contact</a></li>
   <li><a href="../../store.html" class="hover" >Store</a></li>
   <li>|</li>
   <li><a href="../../login.html" class="hover">Login</a></li> 
   <li><a href="../../register.html" class="hover" >Register</a></li>
  </ul>
 </div>
<!-- our app will be injected here -->
 <div id="app" class="container">
    <h1>Create Product</h1>
    
    <!--HTML form for creating a product -->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
        <table class='table table-hover table-responsive table-bordered'>
         
             <!--- name field -->
             <tr>
              <td> Name </td>
              <td><input type='text' name='name' class='form-control' required /> </td>
             </tr>
         
         
            <!--- description field -->
             <tr>
              <td> Description </td>
              <td><input type='text' name='descript'  class='form-control' required /></td>
             </tr>
         
             
             <!--- price  field -->
             <tr>
              <td> Price </td>
              <td><input type='number' name='price' min="1"  class='form-control' required /></td>
             </tr>
         
         
         
             <!--- Photo field -->
             <tr>
              <td> Photo </td>
              <td><input type='text' name='image_path' class='form-control' required /></td>
             </tr>
             
            <tr>
             <td> PDF </td>
             <td><input type='text' name='PDF' class='form-control' required /></td>
            </tr>
         
            
            <!--Submit Button-->
             <tr>
              <td></td>
              <td><button type="submit" class="btn btn-primary"><span class='glyphicon glyphicon-plus'></span> Create Product</button></td>
             </tr>
         
            
        </table>
        
        <?php

echo "<div class='right-button-margin'>";
    echo "<a href='https://graded-unit-spenceral.c9users.io/PHP/EditAPI/admin.html' class='btn btn-primary'> <span class='glyphicon glyphicon-list'> </span>View all Product</a>";
echo "</div>";

?>
<br>
<!-- The footer which will allow user to visit various hyperlinks through out the site, relevent Social Media and any legal information-->
<div id="footer">
   <div class="list"><!-- Creates a coloumn of links -->
    <ul>
      <li class="footerhead">Site</li><!-- An over head to show how the links relate -->
      <li><a href="index.html">Home</a></li>
      <li><a href="contact.html" >Contact</a></li>
      <li><a href="store.html" >Store</a></li>
      <li><a href="login.html" >Login</a></li>
      <li><a href="Register.php" >Register</a></li>
    </ul>
   </div>
   <div class="list"><!-- Creates a coloumn of links -->
    <ul>
     <li class="footerhead">Social Media</li><!-- An over head to show how the links relate -->
     <li><a href="www.facebook.com/Lidiflu">Facebook</a></li>
     <li><a href="www.twitter.com/Lidiflu" >Twitter</a></li>
   </ul>
  </div>
  <div class="list" ><!-- Creates a coloumn of links -->
   <ul>
    <li class="footerhead">Relevant Legal Information</li><!-- An over head to show how the links relate -->
<!-- EU directive links and UK Acts -->
    <li><a href="http://www.legislation.gov.uk/ukpga/1988/48/contents">Copyright, Designs and Patents Act(1988)</a></li>
    <li><a href="http://www.legislation.gov.uk/ukpga/1982/29">Supply of Goods and Services Act (1982)</a></li>
    <li><a href="http://www.legislation.gov.uk/ukpga/1990/18/contents">Computer Misuse Act (1990)</a></li>
    <li id="copyright">&copy;Lidiflu Store</li>
   </ul>
  </div>
 </div>
</body>
</html>



<?php
                                        // --  this give a unique name to the uploaded image  ---//
   if($_POST){
 
    // set product property values
    $product->name = $_POST['name'];
    $product->descript = $_POST['descript'];
    $product->price = $_POST['price'];
    $product->image_path = $_POST['image_path'];
    $product->PDF = $_POST['PDF'];
    $product->created = date('Y-m-d H:i:s');
 
          // create the product
          if($product->create()){
      
          echo "<div class='alert alert-success'>Product was created.</div>";
          // try to upload the submitted file
           // uploadPhoto() method will return an error message, if any.
          echo $product->uploadPhoto();
           }
 
         // if unable to create the product, tell the user
          else{
        echo "<div class='alert alert-danger'>Unable to create product.</div>";
          }
    }



?>