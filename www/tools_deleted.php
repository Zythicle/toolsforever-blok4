<?php

require 'database.php';

$stmt = $conn->prepare("SELECT * FROM tools WHERE deleted_at IS NOT NULL");
$stmt->execute();
$tools = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<div>
    <? foreach ($tools as $tool) : ?>
        <div>
            <a href="tools_deleted_restore.php?id=<?php echo $tool['tool_id']; ?>">
                <?php echo $tool['tool_name']; ?>
            </a>
        </div>
    <? endforeach; ?>
</div>

</body>
</html>