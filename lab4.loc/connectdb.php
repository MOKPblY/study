<?php

require_once('constants.php');

$host = "localhost";
$user = "root";
$mypass = "123";
$mysql = mysqli_connect($host, $user, $mypass);

$mydbname = "entrantsdb";

if (G) {
   
    if ($mysql) {
        mysqli_set_charset($mysql, 'utf8mb4');


        $sqlcreatecustomdb = "CREATE DATABASE IF NOT EXISTS ".$mydbname;
        
        if(!mysqli_query($mysql, $sqlcreatecustomdb)) {
            echo "Ошибка при запросе создания базы: " . mysqli_error($mysql);
        } else {
            mysqli_close($mysql);
        
            $mydb = mysqli_connect($host, $user, $mypass, $mydbname);
                        
            if ($mydb) {
            
                mysqli_set_charset($mydb, 'utf8mb4');

                $fields = "(
                    id          int     not null    primary key    auto_increment,
                    surname     nvarchar(12),
                    name        nvarchar(12),
                    patro       nvarchar(12),
                    grad_date   date, 
                    tel         char(15),
                    email       varchar(25), 
                    prog        enum(
                                'Бакалавриат',
                                'Магистратура',
                                'Специалитет',
                                'Аспирантура'
                                ) default 'Бакалавриат', 
                    score       smallint unsigned default 200, 
                    file        nvarchar(50), 
                    univer      enum(
                                'МЭИ', 
                                'МГТУ', 
                                'МФТИ', 
                                'МИРЭА', 
                                'МТУСИ', 
                                'МГУ'
                                ) default 'МЭИ',
                    red         bit default 0, 
                    gto         bit default 0, 
                    olymp       bit default 0, 
                    dorm        bit default 0 
                )";

                $sqlcreatetable = "CREATE TABLE IF NOT EXISTS entrants $fields";
                if(!mysqli_query($mydb, $sqlcreatetable)) echo "Ошибка запроса создания таблицы";

            }
            else {
                die("Не удалось подключиться к кастомной базе");
            }
 
        } 
    } else die("Не удалось подключиться к mysql"); ////

} else if (P) {
    $mydb = mysqli_connect($host, $user, $mypass, $mydbname);
}
    


?>