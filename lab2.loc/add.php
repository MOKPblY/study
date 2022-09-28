<?php
require('constants.php');

if(P) {

    $f = fopen(FNAME, 'at');
    foreach ($_POST as $value){
        if(!$value) {
            $value = "Нет";
        }
        if ($value != "Добавить") {
            fwrite($f, $value.$delimeter);
        }
    };
    fwrite($f, "\n");
    fclose($f);

    header("Location: /");

}

?>