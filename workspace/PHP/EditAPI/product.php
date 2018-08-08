<?php

class Product{
	//Database connection and table details
private $conn;
private $table_name ="product";

	
public $id;
public $name;
public $descript;
public $price;	
public $image_path;
public $PDF;
public $created;
public $modified_time;


//Constructer with $DB conn

public function __construct($db){
$this->conn = $db;	
}
public function read(){
	
	
	$query ="SELECT * FROM " .$this ->table_name ."";
	$result = $this->conn->query($query);
	return $result;
}
// function for the update page
function read_one(){
 
    // query to read single record
    $query = "SELECT * FROM " . $this->table_name . " WHERE id = ? LIMIT 0,1";
 
    // prepare query statement
    $stmt = $this->conn->prepare( $query );
 
    // bind id of product to be updated
    $stmt->bindParam(1, $this->id);
 
    // execute query
    $stmt->execute();
 
    // get retrieved row
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
    // set values to object properties
    $this->name = $row['name'];
    $this->descript = $row['descript'];
    $this->price = $row['price'];
    $this->image_path = $row['image_path'];
    $this->created = $row['created'];
}
      
    
    

  // update the product
 function update(){
       // update query
      $query = "UPDATE
                " . $this->table_name . "
            SET
                name = :name,
                descript = :descript,
                price = :price,
                image_path = :image_path
            WHERE id = :id ";
 
      // prepare query statement
      $stmt = $this->conn->prepare($query);
 
      // sanitize
      $this->name = htmlspecialchars(strip_tags($this->name));
      $this->descript = htmlspecialchars(strip_tags($this->descript));
      $this->price = htmlspecialchars(strip_tags($this->price));
      $this->image_path = htmlspecialchars(strip_tags($this->image_path));
      $this->id = htmlspecialchars(strip_tags($this->id));
 
      // bind new values
      $stmt->bindParam(':name', $this->name);
      $stmt->bindParam(':descript', $this->descript);
      $stmt->bindParam(':price', $this->price);
      $stmt->bindParam(':image_path', $this->image_path);
      $stmt->bindParam(':id', $this->id);
 
     // execute the query
     if($stmt->execute()){ 
        return true;
        } else {
             return false;
        }
   
          
    }
function create(){
 
    // query to insert record
    $query = "INSERT INTO
                " . $this->table_name . "
            SET
                name=:name, descript =:descript, price=:price, image_path=:image_path, PDF=:PDF, created=:created";
 
    // prepare query
    $stmt = $this->conn->prepare($query);
 
    // sanitize
    $this->name=htmlspecialchars(strip_tags($this->name));
    $this->descript=htmlspecialchars(strip_tags($this->descript));
    $this->price=htmlspecialchars(strip_tags($this->price));
    $this->image_path=htmlspecialchars(strip_tags($this->image_path));
    $this->PDF=htmlspecialchars(strip_tags($this->PDF));
    $this->created=htmlspecialchars(strip_tags($this->created));
 
    // bind values
    $stmt->bindParam(":name", $this->name);
    $stmt->bindParam(":descript", $this->descript);
    $stmt->bindParam(":price", $this->price);
    $stmt->bindParam(":image_path", $this->image_path);
    $stmt->bindParam(":PDF", $this->PDF);
    $stmt->bindParam(":created", $this->created);
 
    // execute query
    if($stmt->execute()){
        return true;
    }else{
        return false;
    }

}
     // delete the product
       function delete(){
 
    $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
     
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $this->id);
 
    if($result = $stmt->execute()){
        return true;
    }else{
        return false;
    }
    }

   
 
 
}
?>