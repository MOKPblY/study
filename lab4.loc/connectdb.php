<?php

require_once('constants.php');

const HOST = "localhost";
const USER = "root";
const PASS = "123";
const DB_NAME = "iddo";

function connectDB($host, $user, $pass, $db = null)
{
    if ($db)    return mysqli_connect($host, $user, $pass, $db);
    else        return mysqli_connect($host, $user, $pass);
}

function createDatabase($mysql, $dbname) {
    $sql_createcustomdb = "CREATE DATABASE IF NOT EXISTS ".$dbname;
    return mysqli_query($mysql, $sql_createcustomdb);
}

function createTable($db) {

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

    $sqlcreatetable = "CREATE TABLE IF NOT EXISTS entrants $fields ENGINE = MyISAM;" ;
    return mysqli_query($db, $sqlcreatetable);
}


if (G) {
    try {
        $mysql = connectDB(HOST, USER, PASS);
        mysqli_set_charset($mysql, 'utf8mb4');
        
    }
    catch (Exception $e)
    {
        die("Ошибка подключения к mysql");
    }

    try {

        createDatabase($mysql, DB_NAME);   
        mysqli_close($mysql);
        $mydb = connectDB(HOST, USER, PASS, DB_NAME);
    }
    catch (Exception $e)
    {
        die("Ошибка создания БД или подключения к iddo");
    }

    try {
        createTable($mydb);
    }
    catch (Exception $e)
    {
        die("Ошибка создания таблицы в iddo");
    }


} else if (P) {
     $mydb = connectDB(HOST, USER, PASS, DB_NAME);
}

?>