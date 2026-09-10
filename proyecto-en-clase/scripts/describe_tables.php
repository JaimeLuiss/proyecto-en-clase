<?php
$host = '127.0.0.1';
$port = 3306;
$db = 'db_ecommerce';
$user = 'root';
$pass = '';
$tables = ['users','products','categories','cart_items'];
try{
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$db", $user, $pass, [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);
    foreach($tables as $table){
        echo "Table: $table\n";
        $stmt = $pdo->prepare("SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_KEY FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = ? AND TABLE_NAME = ?");
        $stmt->execute([$db,$table]);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if(!$rows){
            echo "  (not found)\n\n";
            continue;
        }
        foreach($rows as $r){
            echo sprintf("  %s: %s %s %s\n", $r['COLUMN_NAME'], $r['COLUMN_TYPE'], $r['IS_NULLABLE'], $r['COLUMN_KEY']);
        }
        echo "\n";
    }
} catch (Exception $e){
    echo "Error: " . $e->getMessage() . "\n";
}
