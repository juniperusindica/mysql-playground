<?php

function generateRandomString($length = 100)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ            ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

$pdo = new PDO("mysql:host=playground-db;dbname=playground-db", 'root');


$stmt = $pdo->prepare("INSERT INTO test (data) VALUES (?)");

for ($j = 0; $j < 100000; $j++) {
    $values = [];
    for ($i = 0; $i < 5000; $i++) {
        $values[] = [
            generateRandomString(),
        ];
    }
    $pdo->beginTransaction();
    foreach ($values as $row) {
        $stmt->execute($row);
    }
    $pdo->commit();
}
