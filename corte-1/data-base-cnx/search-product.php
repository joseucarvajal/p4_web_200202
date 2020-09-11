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
        
        $where = "";
        $logicalOperator = 'OR';        
        $parameters = array();
        //2. Get REQUEST data
        if(isset($_POST["search"]) && ($_POST["search"] == "Search products (OR)" || $_POST["search"] == "Search products (AND)") ){            
            if($_POST["search"] == "Search products (AND)"){
                $logicalOperator = "AND";
            }
            $where = " WHERE ";

            foreach ($_POST as $key => $value) {
                if($_POST[$key] && $key !== "search"){
                    if($key == "idCategoria") {
                        $parameters[":$key"] = "$value";
                        $where = $where . "$key = :$key $logicalOperator ";
                    }
                    else {
                        $parameters[":$key"] = "%$value%";
                        $where = $where . "$key LIKE :$key $logicalOperator ";
                    }
                }
            }            

            if(!count($parameters)) {
                ?>
                    <span style="color:red;">ERROR: Especifique al menos un criterio de búsqueda</span>
                <?php
            }
        }


        $where = substr($where, 0, strlen($where) - (strlen($logicalOperator) + 1));

        //3. Connect to database
        $conn = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);

        //4. Prepare SQL INSERT statement
        $sql = "SELECT id, nombre FROM categoria";
        
        //5. Execute SQL statement
        $q = $conn->prepare($sql);
        $result = $q->execute();

        //6. Load database results in memory
        $categories = $q->fetchAll();
        
        //Retrieve products data
        $sqlProducts = "SELECT nombre, precio FROM productos $where"; 
        $qProducts = $conn->prepare($sqlProducts);
        $resultProducts = $qProducts->execute($parameters);        
        $products = $qProducts->fetchAll();        
    ?>

    <form method="POST">
        Name <input type="text" name="nombre" value="<?= (isset($_POST["nombre"])) ? $_POST["nombre"] : "" ?>"/> <br/>
        Category 
        <select name="idCategoria" >
            <option value="">Todos</option>
            <?php
                for($i=0; $i < count($categories); $i++){
            ?>

                <option 
                    <?= (isset($_POST["idCategoria"]) && $_POST["idCategoria"] == $categories[$i]["id"]) ? "selected" : "" ?>
                    value="<?php echo $categories[$i]["id"];  ?>">
                    <?php echo $categories[$i]["nombre"];  ?>
                </option>
            <?php
                }
            ?>
        </select> 
        <br/>

        Price <input type="text" name="precio" value="<?= (isset($_POST["precio"])) ? $_POST["precio"] : "" ?>" />
        <br/><br/>
        <input type="submit" name="search" value="Search products (OR)" />
        <input type="submit" name="search" value="Search products (AND)" />
        <input type="submit" name="search" value="Show all" />
    </form>

    <div>
        <?php
            for($i=0; $i < count($products); $i++){
        ?>
            <div>
                <span><?php echo $products[$i]["nombre"];  ?></span>
                <span><?php echo $products[$i]["precio"];  ?></span>
            </div>
        <?php
            }
        ?>      
    </div>
</body>
</html>