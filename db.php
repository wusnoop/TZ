<?php
$host = '127.0.0.1';
$db = 'tz';
$user = 'root';
$password = '';

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$db",$user,$password);
    } catch (PDOException $e){
        echo 'Ошибка соединения с БД ' .$e->getMessage();
    }
