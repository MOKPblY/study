<?php

    require_once('constants.php');
    require('connectdb.php');
    if(P) {
        $values = array_slice($_POST, 1, 14);
        $id = $_POST['id'];

        $i = 0;
        foreach ($values as $key => $value){
            if ($i >= 10 and $i <= 13) {
                if (!$value) {
                    $values[$key] = 'false';
                } else {
                    $values[$key] = 'true';
                }
            } else {
                $values[$key] = "'".$value."'";
            }
            $i++;
    
        }
        
        $valuestrings = [];
        foreach ($values as $key => $value){
            $valuestrings[] = $key." = ".$value;
        }
        print_r($valuestrings);
        
        $strvalues = implode(", ", $valuestrings);
        print_r($strvalues);
        
        $sql_update = "
        UPDATE entrants SET $strvalues where id = $id;
        ";
        //    
        
        mysqli_query($mydb, $sql_update);
    
    
        header("Location: /");
    };

?>