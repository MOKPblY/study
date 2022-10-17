<?php

    require('constants.php');

    if(P and isset($_POST['number'])) {
        
        $num = $_POST['number'];
        $strs = file(FNAME);

        if ($num < count($strs) and $num > 0) {


            if(isset($_POST['drop'])) {

                $found = false;
                foreach($strs as $i => $str) {
                    $str = explode($delimeter, $str);
                    if (!$found) {
                        print_r($str);
                        if ($str[0]==$_POST['number']) {
                            unset($strs[$i]);
                            $found = true;
                            continue;
                        }
                    } else {
                        $str[0] -= 1;
                    }
                    $strs[$i] = implode($delimeter, $str);
                }
                

                $f=fopen(FNAME, "w+");
                foreach($strs as $str) { 
                    fwrite($f, $str); 
                }
                fclose($f);

            } else if(isset($_POST['update'])) {

                $strnum = "?id=$num";

            };

        };

        $loc = "Location: /";
        if (isset($strnum)) {
            $loc = $loc.$strnum;
        }
        header($loc);
    };

?>