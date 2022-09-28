<?php

require_once('constants.php');

const HOST = "localhost";
const USER = "root";
const PASS = "123";
const DB_NAME = "entrantsdb";

function connectDB($host, $user, $mypass)
{
    return mysqli_connect($host, $user, $mypass);
}

function  createDatabase($mysql, $tableName)
{
    return mysqli_query($mysql, "CREATE DATABASE IF NOT EXISTS " . $tableName);
}

function  createTable($mysql)
{
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

    return mysqli_query($mysql, "CREATE TABLE IF NOT EXISTS entrants $fields");
}


$mysql = connectDB(HOST, USER, PASS);
if (!$mysql) {
    die("Не удалось подключиться к mysql");
}

if (!createDatabase($mysql, DB_NAME)) {
    mysqli_close($mysql);
    die("Ошибка при запросе создания базы: " . mysqli_error($mysql));
}

if (!createTable($mysql)) {
    mysqli_close($mysql);
    die("Ошибка запроса создания таблицы: " . mysqli_error($mysql));
}
