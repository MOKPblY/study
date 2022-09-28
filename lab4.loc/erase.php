<?php

require_once('constants.php');
require_once('connectdb.php');

if (P) {
    $sql_droptable = "DROP TABLE entrants";
    mysqli_query($mydb, $sql_droptable);
    $loc = "Location: /";

    header($loc);
}

 ?>