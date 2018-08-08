<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
 
// include database and object files
include_once 'database.php';
include_once 'product.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare product object
$product = new Product($db);
 
// set ID property of product to be edited
$product->id = isset($_GET['id']) ? $_GET['id'] : die();
 
// read the details of product to be edited
$product->read_one();
 
// create array
$product_arr = array(
    "id" =>  $product->id,
    "name" => $product->name,
    "descript" => $product->descript,
    "price" => $product->price,
   "image_path" => $product->image_path,
    "created" => $product->created
    
 
);
 
// make it json format
print_r(json_encode($product_arr));
?>