<?php

include 'config/database.php';
require_once 'includes/function.php';

if(!isset($_SESSION['is_login'])) {
    header("Location: login.php");
}

echo $_SESSION['name'];

if(isset($_POST['submit'])) {
    unset($_POST);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crasir - Produk</title>
</head>
<body>
    <form action="products.php" method="post">
        <label for="barcode">barcode</label>
        <input type="number" name="barcode" id="barcode"><br>
        <label for="name">nama</label>
        <input type="text" name="name" id="name"><br>
        <label for="price">harga</label>
        <input type="number" name="price" id="price"><br>
        <label for="stock">stok</label>
        <input type="number" name="stock" id="stock"><br>
        <input type="submit" value="submit">
    </form>
</body>
</html>