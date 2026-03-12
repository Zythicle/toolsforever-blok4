<?php

if($_SERVER["REQUEST_METHOD"] != "GET"){
    echo "Huh? Wat doe je?";
    exit;
}


if(    isset($_GET['id'])     ){

    require 'database.php';

    $id = $_GET["id"];

    $stmt = $conn->prepare("UPDATE tools SET deleted_at = NOW() WHERE tool_id = :id");
    $stmt->execute(['id' => $id]);

    header("location: tools_index.php");
}