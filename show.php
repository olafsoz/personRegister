<?php

use Doctrine\DBAL\DriverManager;
require_once 'vendor/autoload.php';


$connectionParams = array(
    'dbname' => 'list',
    'user' => 'root',
    'password' => '',
    'host' => 'localhost',
    'driver' => 'pdo_mysql',
);
try {
    $conn = DriverManager::getConnection($connectionParams);
} catch (\Doctrine\DBAL\Exception $e) {
}
try {
    $users = $conn->fetchAllAssociative('SELECT * FROM users');
} catch (\Doctrine\DBAL\Exception $e) {
    echo $e->getMessage();
}