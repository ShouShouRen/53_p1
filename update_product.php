<?php
require_once("pdo.php");

$product_name = $_POST["product_name"];  
$product_des = $_POST["product_des"];
$time = $_POST["time"];
$price = $_POST["price"];
$links = $_POST["links"];
$id = $_POST["id"];
$images = $_FILES["images"];

// 檢查是否選擇了圖片文件
if ($images["name"] !== "") {
    // 處理圖片文件
    $image_path = "images/" . basename($images["name"]);
    move_uploaded_file($images["tmp_name"], $image_path);

    // 更新數據庫中的圖片路徑
    $sql = "UPDATE products SET product_name = ?, product_des = ?, time = ?, price = ?, links = ?, images = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$product_name, $product_des, $time, $price, $links, $image_path, $id]);
} else {
    // 沒有選擇圖片文件，只更新其他表單數據
    $sql = "UPDATE products SET product_name = ?, product_des = ?, time = ?, price = ?, links = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$product_name, $product_des, $time, $price, $links, $id]);
}
header("location:index.php");
?>
