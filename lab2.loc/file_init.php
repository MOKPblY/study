<?php

require('constants.php');

if (G and !file_exists(FNAME)){
    $headers = [
        'Номер записи',
        'Фамилия',
        'Имя',
        'Отчество',
        'Дата окончания школы', 
        'Телефон',
        'E-mail', 
        'Программа', 
        'Количество баллов', 
        'Файл', 
        'Университет',
        'Наличие красного диплома', 
        'Прошел ГТО', 
        'Призер олимпиады', 
        'Необходимо общежитие'
    ];

    fopen(FNAME, 'wt');
    $f = fopen(FNAME, 'at');
    foreach ($headers as $i => $name){
        fwrite($f, $name.$delimeter);
    };
    fwrite($f, "\n");
    fclose($f);

};


?>