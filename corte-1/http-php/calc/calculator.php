<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Calculator</title>
</head>
<body>
    <span>Hello from <b><em>PHP/HTML</em></b></span>
    <?php    
        $n1 = $_REQUEST["n1"];
        $n2 = $_REQUEST["n2"];
        $sum = $n1 + $n2;          
        $signo = "";
        if($sum > 0){
            $signo = "positivo";
        }
        else {
            $signo = "negativo";
        }
    ?>
    <div>
        <span>La suma es: <b><?php echo $sum; ?></b></span>
    </div>    
    <div>
        <span>El signo es: <b><?php echo $signo; ?></b></span>
    </div>    
</body>
</html>