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
foreach ($users as $user) {
    foreach ($user as $i => $v) {
        $array[] = $v;
    }
}
if (isset($_POST['submit']) && $_POST['fname'] !== "" && $_POST['lname'] !== "" && $_POST['idnum'] !== "" && !in_array($_POST['idnum'], $array)) {
    try {
        $conn->insert('users', array('name' => $_POST['fname'], 'surname' => $_POST['lname'], 'personCode' => $_POST['idnum']));
        header('Location: index.php');
    } catch (\Doctrine\DBAL\Exception $e) {
        echo $e->getMessage();
    }
} else {
    echo "Something went wrong";
}



