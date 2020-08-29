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

        //3. Connect to database
        $conn = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);

        //4. Prepare SQL INSERT statement
        $sql = "SELECT id, nombre FROM categoria";

        //5. Execute SQL statement
        $q = $conn->prepare($sql);
        $result = $q->execute();
        
        //6. Load database results in memory
        $categories = $q->fetchAll();            
    ?>

    <form action="services.php" method="POST">
        Name <input type="text" name="name" /> <br/>
        Category 
        <select name="categoryId" >
            <?php
                for($i=0; $i < count($categories); $i++){
            ?>
                <option 
                    value="<?php echo $categories[$i]["id"];  ?>">
                    <?php echo $categories[$i]["nombre"];  ?>
                </option>
            <?php
                }
            ?>
        </select> 
        <br/>

        Price <input type="text" name="price" />
        <br/><br/>
        <input type="submit" value="Save product" />
    </form>
</body>
</html>