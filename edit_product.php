<?php

    include 'config/database.php';
    require_once 'includes/function.php';

    if(!isset($_SESSION['is_login'])) {
        header("Location: login.php");
    }

    
    $edit_id = $_GET['edit_id'];

    if(!isset($_GET['edit_id'])){
        header('Location: products.php');
    }

    echo $_SESSION['name'];

    $barcode = 2309823;
    $name = 2309823;
    $price = 2309823;
    $stock = 2309823;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crasir - Edit Produk</title>
</head>
<body>
    <br>
    <a href="products.php">back</a>

    <form action="edit_product.php">
        <form action="products.php" method="post">
            <p><?php echo $edit_id; ?></p>
            <label for="barcode">barcode</label>
            <input type="number" name="barcode" id="barcode" value="<?php echo $barcode; ?>"><br>
            <label for="name">nama</label>
            <input type="text" name="name" id="name" value="<?php echo $name; ?>"><br>
            <label for="price">harga</label>
            <input type="number" name="price" id="price" value="<?php echo $price; ?>"><br>
            <label for="stock">stok</label>
            <input type="number" name="stock" id="stock" value="<?php echo $stock; ?>"><br>
            <input type="submit" value="submit" name="submit">
        </form>
    </form>
</body>
</html>