<?php

/**
 * Warning: Ugly code here
 */

/**
 * @param int $length
 * @return string
 */
function generateRandomString($length = 100): string
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ            ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

define('INSERT_BATCH_SIZE', 5000);
define('INSERT_COUNT', 1000000);

$pdo = new PDO('mysql:host=playground-db;dbname=playground-db', 'root');
$stmt = $pdo->prepare('INSERT INTO test_table (data1, data2) VALUES (?, ?)');

$steps = INSERT_COUNT / INSERT_BATCH_SIZE;

for ($j = 1; $j <= $steps; $j++) {
    echo "Step: $j of $steps" . PHP_EOL;
    $values = [];
    for ($i = 0; $i < INSERT_BATCH_SIZE; $i++) {
        $values[] = [
            rand(1, 10),
            generateRandomString(500),
        ];
    }
    $pdo->beginTransaction();
    foreach ($values as $row) {
        $stmt->execute($row);
    }
    $pdo->commit();
}
