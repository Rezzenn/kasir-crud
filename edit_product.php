<?php

    include 'config/database.php';
    require_once 'includes/function.php';

    if(!isset($_SESSION['is_login'])) {
        header("Location: login.php");
    }

    if(isset($_GET['edit_id'])){
        $edit_id = $_GET['edit_id'];
    }

    if(isset($_POST['submit'])){
        $edit_barcode = $_POST['barcode'];
        $edit_name = $_POST['name'];
        $edit_price = $_POST['price'];
        $edit_stock = $_POST['stock'];
        $edit_id = $_POST['edit_id'];
        $sql = "UPDATE products SET barcode = '$edit_barcode', name = '$edit_name', price = '$edit_price', stock = '$edit_stock' WHERE id = '$edit_id'";

        try {
            if($db->query($sql)) {
                echo "sukses";
                header('Location: products.php');
            } else {
                echo "gagal";
            }
        } catch(mysqli_sql_exception){
            echo "barcode tidak bisa sama";
        }
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
    <form action="edit_product.php" method="post">
        <p><?php echo $edit_id; ?></p>
        <label for="barcode">barcode</label>
        <input type="number" name="barcode" id="barcode" value="<?php echo $barcode; ?>"><br>
        <label for="name">nama</label>
        <input type="text" name="name" id="name" value="<?php echo $name; ?>"><br>
        <label for="price">harga</label>
        <input type="number" name="price" id="price" value="<?php echo $price; ?>"><br>
        <label for="stock">stok</label>
        <input type="number" name="stock" id="stock" value="<?php echo $stock; ?>"><br>
        <input type="hidden" name="edit_id" value="<?php echo $edit_id; ?>">
        <input type="submit" value="submit" name="submit">
    </form>
</body>
</html>