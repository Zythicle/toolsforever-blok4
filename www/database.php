<?php
$dbhost = 'mariadb';
$dbname = 'tools4ever';
$dbuser = 'root';
$dbpass = 'password';

try {
    $conn = new PDO("mysql:host=$dbhost;dbname=$dbname;charset=utf8mb4", $dbuser, $dbpass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Connection failed: ' . $e->getMessage());
}

?>
