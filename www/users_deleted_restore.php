<?php

require 'database.php';

$id = $_GET['id'];
$stmt = $conn->prepare("UPDATE users SET deleted_at = NULL WHERE id = :id");
$stmt->execute(['id' => $id]);
header('Location: users_deleted.php');
exit();
?>