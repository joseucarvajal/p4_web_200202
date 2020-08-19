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
        $op = $_REQUEST["op"];

        if($n1 < 0){
    ?>
            <span style="color:red;">NO SE PUEDE REALIZAR LA OPERACIÓN con un valor N1 negativo</span>
    <?php
        exit(0);        
        }        

        switch($op){
            case 's':
                $result = $n1 + $n2;
            break;
            case 'r':
                $result = $n1 - $n2;
            break;
            case 'm':
                $result = $n1 * $n2;
            break;

            default:
                $result = $n1 / $n2;
            break;
        }
        $signo = "";
        if($result > 0){
            $signo = "positivo";
        }
        else {
            $signo = "negativo";
        }
    ?>
    <div>
        <span><?php echo $n1; ?> <?php echo $op; ?> <?php echo $n2; ?> es: <b><?php echo $result; ?></b></span>
    </div>    
    <div>
        <span>El signo es: <b><?php echo $signo; ?></b></span>
    </div>    
</body>
</html>