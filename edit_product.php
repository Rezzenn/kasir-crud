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
        <?php

            $sql2 = "SELECT * FROM products WHERE id = '$edit_id'";
            $res = $db->query($sql2);

            if($product = mysqli_num_rows($res) > 0){
                while($product = $res->fetch_assoc()) {
                    $barcode = $product['barcode'];
                    $name = $product['name'];
                    $price = $product['price'];
                    $stock = $product['stock'];

                    echo "<p>" . $edit_id . "</p>";
                    echo "<label for='barcode'>barcode</label>";
                    echo "<input type='number' name='barcode' id='barcode' value=" . $barcode . "><br>";
                    echo "<label for='name'>nama</label>";
                    echo "<input type='text' name='name' id='name' value=" . $name . "><br>";
                    echo "<label for='price'>harga</label>";
                    echo "<input type='number' name='price' id='price' value=" . $price . "><br>";
                    echo "<label for='stock'>stok</label>";
                    echo "<input type='number' name='stock' id='stock' value=" . $stock . "><br>";
                    echo "<input type='hidden' name='edit_id' value=" . $edit_id . ">";
                    echo "<input type='submit' value='submit' name='submit'>";
                }
            }
        
            
            
        ?>
    </form>
</body>
</html>