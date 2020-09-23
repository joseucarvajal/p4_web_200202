<?php 
        //TODO ESTO ES UN API

        //Servicio 1: createProduct
        //1. Data base connection data
        $dbhost 	= "localhost";
	$dbname		= "supermercado";
	$dbuser		= "root";
	$dbpass		= "";

        //2. Get REQUEST data

        //3. Connect to database
        $conn = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);

        //4. Prepare SQL INSERT statement
        $sql = "SELECT id, nombre, precio, idCategoria FROM productos";

        //5. Execute SQL statement
        $q = $conn->prepare($sql);
        $q->execute();

        $productsList = $q->fetchAll(PDO::FETCH_ASSOC);

        //6. Check result (success or error), regarding the result, send client response

        echo json_encode($productsList);

?>
