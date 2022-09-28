<?php
    

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        header("Content-Type: image/jpeg");

        $sum = 0;
        $values = array_values(array_slice($_POST, 0, 5));
        $maxv = 0;
        foreach($values as $value){
            if($value > $maxv){
                $maxv = $value;
            }
            $sum += $value;
        }
        $parts = [];
        $coefs = [];
        foreach($values as $i => $value) {
            $parts[$i] = round(100*$value/$sum);
            $coefs[$i] = round($value/$maxv, 2);
        }


        $h = 600;
        $w = 600;
        $hmax = 400;
        $colw = 90;
        

        $text = "Диаграмма";
        $fsize = 35;
        $rot = 90;
        $font = 'times.ttf';

        $startx = 70;
        $starty = 500;
        $tposx = $startx - 20;
        $tposy = $starty - 150;
        $offset = 20;

        $img = imagecreatetruecolor($w, $h);
        $bgcolor = imagecolorallocate($img, 255, 255, 255);
        $black = imagecolorallocate($img, 0,0,0);

        imagefilledrectangle($img, 0,0,$w,$h, $bgcolor);

        imagettftext($img, $fsize, $rot, $tposx, $tposy, $black, $font, $text);

        $colors = [
            imagecolorallocate($img, 255, 0, 0),
            imagecolorallocate($img, 0, 255, 0),
            imagecolorallocate($img, 0, 0, 255),
            imagecolorallocate($img, 255, 255, 0),
            imagecolorallocate($img, 0, 0, 0),
        ];

        foreach($parts as $i => $part) {
            if (100*$coefs[$i] > 0) {
                $x1 = $startx+$i*$colw;
                $y1 = $starty;
                $x2 = $startx+($i+1)*$colw;
                $y2 = $starty-$coefs[$i]*$hmax;
                imagerectangle($img, $x1, $y1, $x2, $y2, $black);
                imagefilltoborder($img, $x1+1, $y1-1, $black, $colors[$i]);
            }
            $p = sprintf("П%d - %d%%",$i+1,$parts[$i]);
            imagettftext($img, 15, 0, $startx+$i*$colw+0.5*$offset, $starty+$offset, $black, $font, $p);
        }

        imageline($img, $startx, $starty, $startx, $starty-$hmax-$offset, $black);
        imageline($img, $startx, $starty, $startx+5*$colw+$offset, $starty, $black);

        imagejpeg($img);


    } else {
        header("Location: /");
    }
    
?>