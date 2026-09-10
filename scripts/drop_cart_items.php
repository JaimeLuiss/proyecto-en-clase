<?php
$host = '127.0.0.1';
$port = 3306;
$db = 'db_ecommerce';
$user = 'root';
$pass = '';
try{
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$db", $user, $pass, [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);
    $pdo->exec('DROP TABLE IF EXISTS cart_items');
    echo "Dropped cart_items\n";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
