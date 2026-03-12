<?php

session_start();


if (!isset($_SESSION['user_id'])) {
    echo "You are not logged in, please login. ";
    echo "<a href='login.php'>Login here</a>";
    exit;
}

if ($_SESSION['role'] != 'admin') {
    echo "You are not allowed to view this page, please login as admin";
    exit;
}

//check method
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    echo "You are not allowed to view this page";
    exit;
}
require 'database.php';

//.

if(empty($_POST['name'])){
    echo "Please fill in the name field.";
    exit;
}

if(empty($_POST['category'])){
    echo "Please fill in the category field.";
    exit;
}

if(empty($_POST['price'])){
    echo "Please fill in the price field.";
    exit;
}

if(empty($_POST['brand'])){
    echo "Please fill in the brand field.";
    exit;
}

if(empty($_POST['image'])){
    echo "Please fill in the image field.";
    exit;
}

//.

if(strlen($_POST['name']) > 100){
    echo "The name field must be less than 100 characters.";
    exit;
}

if(strlen($_POST['category']) > 100){
    echo "The category field must be less than 100 characters.";
    exit;
}

if(!is_numeric($_POST['price'])){
    echo "The price field must be a number.";
    exit;
}

if(strlen($_POST['brand']) > 100){
    echo "The brand field must be less than 100 characters.";
    exit;
}

if(strlen($_POST['image']) > 255){
    echo "The image field must be less than 255 characters.";
    exit;
}

//.

if(!isset($_POST['name']) ||
!isset($_POST['category']) ||
!isset($_POST['price']) ||
!isset($_POST['brand']) ||
!isset($_POST['image'])
){
    echo "Please fill in all fields.";
    exit;
}

$name = $_POST['name'];
$category = $_POST['category'];
$price = $_POST['price'];
$brand = $_POST['brand'];
$image = $_POST['image'];

$sql = "INSERT INTO tools (tool_name, tool_category, tool_price, tool_brand, tool_image) VALUES (:name, :category, :price, :brand, :image)";
$stmt = $conn->prepare($sql);
$result = $stmt->execute([
    'name' => $name,
    'category' => $category,
    'price' => $price,
    'brand' => $brand,
    'image' => $image
]);

if ($result) {
    header("Location: tools_index.php");
    exit;
}

echo "Something went wrong";
