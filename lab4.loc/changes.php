<?php

    require_once('constants.php');
    require('connectdb.php');

    if(P and isset($_POST['number'])) {
        $id = (int)$_POST['number'];
        
        $id_exists = false;
        $sql_get_id = "SELECT id FROM entrants where id = $id";  
        if(mysqli_fetch_array(mysqli_query($mydb, $sql_get_id))) $id_exists = true;


        if($id_exists) {
            if(isset($_POST['drop'])) {

                $sqldel = "DELETE FROM entrants WHERE entrants.id = $id";
                
                mysqli_query($mydb, $sqldel);
            
            } else if(isset($_POST['update'])) {

                $params = "?id=$id";
            }
        }

        $loc = "Location: /";
        if (isset($params)) {
            $loc = $loc.$params;
        }
        header($loc);
    };

?>