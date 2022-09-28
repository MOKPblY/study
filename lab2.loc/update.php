<?php

    require('constants.php');

    if(P) {


            $strs = file(FNAME);
            $values = array_values(array_slice($_POST,0,15));
            foreach($values as $i => $value) {
                if(!$value) {
                    $values[$i] = "Нет";
                }
            }
            
            $new_str = implode($delimeter, $values);

            $strs[$_POST['id']] = $new_str;
            $f=fopen(FNAME, "w+");
            foreach($strs as $str) { 
                fwrite($f, $str); 
            }
            fwrite($f, "\n");
            fclose($f);

 
        $loc = "Location: /";
        if (isset($strnum)) {
            $loc = $loc.$strnum;
        }
        header($loc);
    };

?>