<?php
require_once('constants.php');
require('connectdb.php');

if(P) {
    $values = array_values(array_slice($_POST, 1, 14));
    foreach ($values as $i => $value){
        if ($i >= 10 and $i <= 13) {
            if (!$value) {
                $values[$i] = 'false';
            } else {
                $values[$i] = 'true';
            }
        }

    }

    $strvalues = "'".implode("','", array_slice($values, 0, 10))."',".implode(',',array_slice($values, 10,4));

    $sqladd = "
    INSERT INTO entrants (surname, name, patro, grad_date, tel, email, prog, score, file, univer, red, gto, olymp, dorm) 
    VALUES ($strvalues);
    ";  
    
    mysqli_query($mydb, $sqladd);


    header("Location: /");

}

?>