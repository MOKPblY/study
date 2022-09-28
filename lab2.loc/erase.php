<?php

require('constants.php');

if (P) {
    $f = fopen(FNAME, 'r');
    $head = fgets($f);
    fclose($f);
    $f = fopen(FNAME, 'w+');
    fwrite($f, $head);
    fclose($f);

    $loc = "Location: /";

    header($loc);
}

 ?>