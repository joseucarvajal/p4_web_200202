<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        //1. Data base connection data
        $dbhost 	= "localhost";
	    $dbname		= "supermercado";
	    $dbuser		= "root";
	    $dbpass		= "";

        //2. Get REQUEST data
        $name = $_REQUEST["name"];
        $price = $_REQUEST["price"];
        $categoryId = $_REQUEST["categoryId"];

        //3. Connect to database
        $conn = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);

        //4. Prepare SQL INSERT statement
        $sql = "INSERT INTO productos (id, nombre, precio, idCategoria) 
                    VALUES (:id, :nombre, :precio, :idCategoria)";

        //5. Execute SQL statement
        $q = $conn->prepare($sql);
		$result = $q->execute(array(
            ':id'=>NULL,
			':nombre'=>$name,
			':precio'=>$price,
            ':idCategoria'=>$categoryId));
            
        sleep(8);

        //6. Check result (success or error), regarding the result, send client response
        if($result){
            ?>
                <div>Product <?php echo $name; ?> has been created succesfully</div>
            <?php
        }
        else {
            ?>
                <div style="color:red">An error has ocurred creating product: <?php echo $name; ?></div>
            <?php
        }

    ?>
</body>
</html>