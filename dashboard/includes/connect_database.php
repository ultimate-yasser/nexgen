<?php
$database_source = 'mysql:host=localhost;dbname=nexgen';
$username = 'root';
$password = '';
try {
    $connect = new PDO($database_source, $username, $password);
}catch (PDOException $e) {
    echo 'Connection Failed'. $e->getMessage();
    exit();
}