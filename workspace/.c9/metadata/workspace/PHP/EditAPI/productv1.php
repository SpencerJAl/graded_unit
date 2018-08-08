{"filter":false,"title":"productv1.php","tooltip":"/PHP/EditAPI/productv1.php","undoManager":{"mark":1,"position":1,"stack":[[{"start":{"row":0,"column":0},"end":{"row":41,"column":2},"action":"insert","lines":["<?php","// required headers","header(\"Access-Control-Allow-Origin: *\");","header(\"Content-Type: application/json; charset=UTF-8\");","header(\"Access-Control-Allow-Methods: POST\");","header(\"Access-Control-Max-Age: 3600\");","header(\"Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With\");"," //Include database objects","include_once 'database.php';","include_once 'product.php';","//get database connection","$database = new Database();","$db = $database->getConnection();","","//Prepare new object","$product = new Product($db);","","//get id of product ot be edited.","$data = json_decode(file_get_contents(\"php://input\"));","// set ID property of product to be edited","$product->id = $data->id;"," ","// set product property values","$product->name = $data->name;","$product->price = $data->price;","$product->descript = $data->descript;","$product->image_path = $data->image_path;"," ","// update the product","if($product->update()){","    echo '{';","        echo '\"message\": \"Product was updated.\"';","    echo '}';","}"," ","// if unable to update the product, tell the user","else{","    echo '{';","        echo '\"message\": \"Unable to update product.\"';","    echo '}';","}","?>"],"id":1}],[{"start":{"row":0,"column":0},"end":{"row":41,"column":2},"action":"remove","lines":["<?php","// required headers","header(\"Access-Control-Allow-Origin: *\");","header(\"Content-Type: application/json; charset=UTF-8\");","header(\"Access-Control-Allow-Methods: POST\");","header(\"Access-Control-Max-Age: 3600\");","header(\"Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With\");"," //Include database objects","include_once 'database.php';","include_once 'product.php';","//get database connection","$database = new Database();","$db = $database->getConnection();","","//Prepare new object","$product = new Product($db);","","//get id of product ot be edited.","$data = json_decode(file_get_contents(\"php://input\"));","// set ID property of product to be edited","$product->id = $data->id;"," ","// set product property values","$product->name = $data->name;","$product->price = $data->price;","$product->descript = $data->descript;","$product->image_path = $data->image_path;"," ","// update the product","if($product->update()){","    echo '{';","        echo '\"message\": \"Product was updated.\"';","    echo '}';","}"," ","// if unable to update the product, tell the user","else{","    echo '{';","        echo '\"message\": \"Unable to update product.\"';","    echo '}';","}","?>"],"id":2},{"start":{"row":0,"column":0},"end":{"row":121,"column":2},"action":"insert","lines":["<?php","","class Product{","\t//Database connection and table details","private $conn;","private $table_name =\"product\";","","\t","public $id;","public $name;","public $descript;","public $price;\t","public $image_path;","public $created;","public $modified_time;","","","//Constructer with $DB conn","","public function __construct($db){","$this->conn = $db;\t","}","public function read(){","\t","\t","\t$query =\"SELECT * FROM \" .$this ->table_name .\"\";","\t$result = $this->conn->query($query);","\treturn $result;","}","// function for the update page","function read1(){"," ","    // query to read single record","    $query = \"SELECT * FROM \" . $this->table_name . \" WHERE id = ? LIMIT 0,1\";"," ","    // prepare query statement","    $stmt = $this->conn->prepare( $query );"," ","    // bind id of product to be updated","    $stmt->bindParam(1, $this->id);"," ","    // execute query","    $stmt->execute();"," ","    // get retrieved row","    $row = $stmt->fetch(PDO::FETCH_ASSOC);"," ","    // set values to object properties","    $this->name = $row['name'];","    $this->descript = $row['descript'];","    $this->price = $row['price'];","    $this->image_path = $row['image_path'];","    $this->created = $row['created'];","}","","public function create(){"," ","    // query to insert record -  prepare query and bind","   $stmt = $this->conn->prepare(\"INSERT INTO \" . $this->table_name . \"(name, descript, price, image_path, created) VALUES (?, ?, ?, ?, ?)\");","    "," ","    // sanitize","    $this->name=htmlspecialchars(strip_tags($this->name));","    $this->price=htmlspecialchars(strip_tags($this->price));","    $this->descript=htmlspecialchars(strip_tags($this->descript));","    $this->image_path=htmlspecialchars(strip_tags($this->image_path));","    $this->created=htmlspecialchars(strip_tags($this->created));"," ","    // bind values","    ","    $stmt->bind_param(\"ssdss\", $name, $descript, $price, $image_path, $created);","    ","    // execute query","    if($stmt->execute()){","        return true;","    }else{","        return false;","    }","}","      ","    ","    ","}","  // update the product","function update(){"," ","    // update query","    $query = \"UPDATE","                \" . $this->table_name . \"","            SET","                name = :name,","                descript = :descript,","                price = :price,","                image_path = :image_path","            WHERE","                id = :id\";"," ","    // prepare query statement","    $stmt = $this->conn->prepare($query);"," ","    // sanitize","    $this->name=htmlspecialchars(strip_tags($this->name));","    $this->descript=htmlspecialchars(strip_tags($this->descript));","    $this->price=htmlspecialchars(strip_tags($this->price));","    $this->image_path=htmlspecialchars(strip_tags($this->image_path));","    $this->id=htmlspecialchars(strip_tags($this->id));"," ","    // bind new values","    $stmt->bindParam(':name', $this->name);","    $stmt->bindParam(':descript', $this->descript);","    $stmt->bindParam(':price', $this->price);","    $stmt->bindParam(':image_path', $this->image_path);","    $stmt->bindParam(':id', $this->id);"," ","    // execute the query","    if($stmt->execute()){","        return true;","    }else{","        return false;","    }","}","?>"]}]]},"ace":{"folds":[],"scrolltop":420,"scrollleft":0,"selection":{"start":{"row":30,"column":0},"end":{"row":53,"column":1},"isBackwards":true},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":{"row":20,"state":"php-start","mode":"ace/mode/php"}},"timestamp":1495021971862,"hash":"587170beef7fe9820360e6da06a82757af97d8a3"}