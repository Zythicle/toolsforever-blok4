<?php
session_start();
require 'database.php';

$sql = "SELECT * FROM brands";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $brands = $stmt->fetchAll(PDO::FETCH_ASSOC);

require 'header.php';
?>

<main>
    <div class="container">
        <h1>Brands</h1>
    </div>
    <div class="container">
        <?php foreach ($brands as $brand) : ?>
            <div class="brand-info">
                <img src="<?php echo isset($brand['brand_image']) ? htmlspecialchars('images/' . $brand['brand_image'], ENT_QUOTES, 'UTF-8') : 'https://placehold.co/200' ?>" alt="<?php echo htmlspecialchars($brand['brand_name'], ENT_QUOTES, 'UTF-8') ?>">
                <h3><?php echo htmlspecialchars($brand['brand_name'], ENT_QUOTES, 'UTF-8') ?></h3>

            </div>
        <?php endforeach; ?>
    </div>
</main>

<?php require 'footer.php' ?>