{"filter":false,"title":"uploadimage.php","tooltip":"/uploadimage.php","undoManager":{"mark":12,"position":12,"stack":[[{"start":{"row":0,"column":0},"end":{"row":16,"column":1},"action":"insert","lines":["<?php","$target_dir = \"uploads/\";","$target_file = $target_dir . basename($_FILES[\"fileToUpload\"][\"name\"]);","$uploadOk = 1;","$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);","// Check if image file is a actual image or fake image","if(isset($_POST[\"submit\"])) {","    $check = getimagesize($_FILES[\"fileToUpload\"][\"tmp_name\"]);","    if($check !== false) {","        echo \"File is an image - \" . $check[\"mime\"] . \".\";","        $uploadOk = 1;","    } else {","        echo \"File is not an image.\";","        $uploadOk = 0;","    }","}","?"],"id":1}],[{"start":{"row":16,"column":1},"end":{"row":16,"column":2},"action":"insert","lines":[">"],"id":2}],[{"start":{"row":1,"column":15},"end":{"row":1,"column":23},"action":"remove","lines":["uploads/"],"id":3},{"start":{"row":1,"column":15},"end":{"row":1,"column":16},"action":"insert","lines":["i"]}],[{"start":{"row":1,"column":16},"end":{"row":1,"column":17},"action":"insert","lines":["m"],"id":4}],[{"start":{"row":1,"column":17},"end":{"row":1,"column":18},"action":"insert","lines":["a"],"id":5}],[{"start":{"row":1,"column":18},"end":{"row":1,"column":19},"action":"insert","lines":["g"],"id":6}],[{"start":{"row":1,"column":19},"end":{"row":1,"column":20},"action":"insert","lines":["e"],"id":7}],[{"start":{"row":1,"column":20},"end":{"row":1,"column":21},"action":"insert","lines":["s"],"id":8}],[{"start":{"row":1,"column":21},"end":{"row":1,"column":22},"action":"insert","lines":["/"],"id":9}],[{"start":{"row":15,"column":1},"end":{"row":16,"column":0},"action":"insert","lines":["",""],"id":10}],[{"start":{"row":16,"column":0},"end":{"row":20,"column":1},"action":"insert","lines":["// Check if file already exists","if (file_exists($target_file)) {","    echo \"Sorry, file already exists.\";","    $uploadOk = 0;","}"],"id":11}],[{"start":{"row":20,"column":1},"end":{"row":21,"column":0},"action":"insert","lines":["",""],"id":12}],[{"start":{"row":21,"column":0},"end":{"row":31,"column":1},"action":"insert","lines":["// Check if $uploadOk is set to 0 by an error","if ($uploadOk == 0) {","    echo \"Sorry, your file was not uploaded.\";","// if everything is ok, try to upload file","} else {","    if (move_uploaded_file($_FILES[\"fileToUpload\"][\"tmp_name\"], $target_file)) {","        echo \"The file \". basename( $_FILES[\"fileToUpload\"][\"name\"]). \" has been uploaded.\";","    } else {","        echo \"Sorry, there was an error uploading your file.\";","    }","}"],"id":13}]]},"ace":{"folds":[],"scrolltop":81,"scrollleft":0,"selection":{"start":{"row":31,"column":1},"end":{"row":31,"column":1},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":{"row":63,"mode":"ace/mode/php"}},"timestamp":1494796337955,"hash":"9a12835963890588220a8b6b462c09970efd61e9"}