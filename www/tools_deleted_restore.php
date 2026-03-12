<?php

require 'database.php';

$id = $_GET['id'];
$stmt = $conn->prepare("UPDATE tools SET deleted_at = NULL WHERE tool_id = :id");
$stmt->execute(['id' => $id]);
header('Location: tools_deleted.php');
exit();
?>