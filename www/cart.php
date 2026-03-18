<?php
session_start();
require 'database.php';

$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM cart WHERE user_id = :user_id";
$stmt = $conn->prepare($sql);
$stmt->execute(['user_id' => $user_id]);
$cart = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sql = "SELECT c.quantity, t.tool_name FROM cart c JOIN tools t ON c.tool_id = t.tool_id WHERE c.user_id = :user_id";
$stmt = $conn->prepare($sql);
$stmt->execute(['user_id' => $user_id]);
$cart = $stmt->fetchAll(PDO::FETCH_ASSOC);

require 'header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Winkelmand</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- Hier zou je de inhoud van de winkelmand kunnen tonen -->
    <h1>Winkelmand</h1>
    <ul>
        <?php foreach ($cart as $item) : ?>
            <li>Tool: <?php echo htmlspecialchars ($item['tool_name'], ENT_QUOTES, 'UTF-8') ?></li> 
             <!-- Hier zou je ook de hoeveelheid en andere details kunnen tonen -->
              <li>Aantal: <?php echo htmlspecialchars($item['quantity'], ENT_QUOTES, 'UTF-8') ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>