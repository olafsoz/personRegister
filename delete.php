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
    echo $e->getMessage();
}
try {
    $users = $conn->fetchAllAssociative('SELECT * FROM users');
} catch (\Doctrine\DBAL\Exception $e) {
    echo $e->getMessage();
}
$array = [];
if (!empty($users)) {
    foreach ($users as $user) {
        foreach ($user as $i => $v) {
            $array[] = $v;
        }
    }
    if (isset($_POST['delete']) && $_POST['idn'] !== "" && in_array($_POST['idn'], $array)) {
        try {
            $conn->delete('users', array('personCode' => $_POST['idn']));
            header('Location: index.php');
        } catch (\Doctrine\DBAL\Exception $e) {
            echo $e->getMessage();
        }
    } else {
        echo "Something went wrong";
    }
} else {
    echo "Nothing to delete";
}


