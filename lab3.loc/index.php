<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="2.css">
</head>
<body>

<form action="image.php" target = "blank" method = "POST">

    <?php

        $numparams = 5;
        for($i = 1; $i <= $numparams; $i++) {
            echo "<p><label>Параметр $i</label>
            <input type = \"text\" name = \"p$i\" value = \"0\"></p>";
        }

    ?>

    <input type = "submit" value = "Показать диаграмму!">

</form>
</body>
</html>