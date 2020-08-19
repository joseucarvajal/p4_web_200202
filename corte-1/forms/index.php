<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator form</title>
</head>
<body>
    <form action="calculator.php" method="POST">
        <label for="">n1:</label>
        <input type="number" name="n1" min="0" /> <br/>

        <label for="">n2:</label>
        <input type="number" name="n2" /> <br/>

        <label for="">Operation</label>
        <select name="op">
            <option value="s">+</option>
            <option value="r">-</option>
            <option value="m">*</option>
            <option value="d">/</option>
        </select> <br />

        <input type="submit" value="Perform operation" />
    </form>
</body>
</html>