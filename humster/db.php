<?php 

$host = 'localhost';
$db = 'humster_db';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host; dbname=$db", $user, $pass);
} catch (PDOException $e) {
    echo 'Помилка з`єднання з базою даних '.$e->getMessage();
}