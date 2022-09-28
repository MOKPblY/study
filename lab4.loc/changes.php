<?php

    require_once('constants.php');
    require('connectdb.php');

    if(P and isset($_POST['number'])) {
        $num = (int)$_POST['number'];

        $get_id = "SELECT MAX(id) FROM entrants";
        $id_last = (int)((mysqli_fetch_array(mysqli_query($mydb, $get_id)))[0]);
        $get_id = "SELECT MIN(id) FROM entrants";  
        $id_first = (int)((mysqli_fetch_array(mysqli_query($mydb, $get_id)))[0]);

        if($num >= $id_first and $num <= $id_last) {
            if(isset($_POST['drop'])) {

                $sqldel = "DELETE FROM entrants WHERE entrants.id = $num";
                
                mysqli_query($mydb, $sqldel);
            
            } else if(isset($_POST['update'])) {

                $params = "?id=$num";
            }
        }

        $loc = "Location: /";
        if (isset($params)) {
            $loc = $loc.$params;
        }
        header($loc);
    };

?>