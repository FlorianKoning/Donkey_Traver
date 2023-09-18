<?php

$host = 'localhost';
$dbName = 'donkey_travel';
$Username = 'root';
$dbPassword = '';

try {
    $pdo = new PDO("mysql:host=$host;dbName=$dbName", $username, $dbPassword);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo 'Database verbinding is werkent.';
} catch(PDOException $e) {
    die('Verbinding met Database is niet gelukt: ' . $e->getMessage());
}
