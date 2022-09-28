<?php

    require('constants.php');

    if(P and isset($_POST['number'])) {

        if(isset($_POST['drop'])) {

            $strs = file(FNAME);
            unset($strs[$_POST['number']]);
            $f=fopen(FNAME, "w+");
            foreach($strs as $str) { 
                fwrite($f, $str); 
            }
            fclose($f);

        } else if(isset($_POST['update'])) {

            $f = file(FNAME);
            $num = $_POST['number'];
            if ($num < count($f) and $num > 0) {
                $strnum = "?id=$num";
            }
        };

        $loc = "Location: /";
        if (isset($strnum)) {
            $loc = $loc.$strnum;
        }
        header($loc);
    };

?>